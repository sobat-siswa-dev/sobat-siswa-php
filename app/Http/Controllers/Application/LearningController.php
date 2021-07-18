<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\{
    Controller,
    Utility
};
use Illuminate\Http\Request;

use Redirect, Hash, DB;

use App\Models\{
    AdmTeacher,
    KbmAnnouncement
};

class LearningController extends Controller
{
    // Model
        private $model = [];

    // Announcement Page
        public function announcementPage (Request $request)
        {
            try {
                if ($request->has("submit-form")) {
                    $this->model["kbmAnnouncement"] = $request->has("id") ? KbmAnnouncement::find($request->get("id")) : new KbmAnnouncement();
                    return view("application.announcement.form", $this->model);
                } else if ($request->has("submit-save")) {
                    $kbmAnnouncement = $request->has("id") ? KbmAnnouncement::find($request->get("id")) : new KbmAnnouncement();
                    $kbmAnnouncement->title = $request->get("title");
                    $kbmAnnouncement->description = $request->get("description");
                    $kbmAnnouncement->school_id = session()->get("admSchool")->id;
                    if ($request->file("attch")) {
                        $kbmAnnouncement->attch = Utility::uploadFile($request, "attch", "attch-announcement/");
                    }
                    if (!$kbmAnnouncement->created_by) {
                        $kbmAnnouncement->created_by = session()->get("admTeacher")->name;
                        $kbmAnnouncement->creator_id = session()->get("admTeacher")->id;
                    }
                    $kbmAnnouncement->save();
                    return Redirect::to(url('/learning/announcement/'))
                                    ->with("actionSuccess", "Sukses menyimpan data !");
                    return false;
                }
            } catch (Throwable $exception) {
                return Redirect::to(url("/learning/announcement"))
                                ->with("actionError", "Terjadi kesalahan !");
            }
            $this->model['kbmAnnouncementList'] =   KbmAnnouncement::where("school_id", session()->get("admSchool")->id)->orderBy("id", "DESC")->paginate(10);
            return view("application.announcement.list", $this->model);
        }
    
    // Announcement Detail Page
        public function announcementDetailPage (Request $request, $id)
        {
            if (!KbmAnnouncement::validateSchool($id, session()->get("admSchool")->id)) {
                return Redirect::to(url("/learning/announcement"));
            } 
            try {
                $this->model['kbmAnnouncement'] =   KbmAnnouncement::find($id);
                return view("application.announcement.view", $this->model);
            } catch (Throwable $exception) {
                return Redirect::to(url("/learning/announcement"))
                                ->with("actionError", "Terjadi kesalahan !");
            }
        }
}
