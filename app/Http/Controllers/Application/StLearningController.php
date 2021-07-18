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


class StLearningController extends Controller
{
    // Model
        private $model = [];

    // St Announcement Page
        public function stAnnouncementPage (Request $request)
        {
            $this->model['kbmAnnouncementList'] =   KbmAnnouncement::where("school_id", session()->get("admSchool")->id)->orderBy("id", "DESC")->paginate(10);
            return view("applicationst.announcement.list", $this->model);
        }
    
    // St Announcement Detail Page
        public function stAnnouncementDetailPage (Request $request, $id)
        {
            if (!KbmAnnouncement::validateSchool($id, session()->get("admSchool")->id)) {
                return Redirect::to(url("/stlearning/announcement"));
            } 
            try {
                $this->model['kbmAnnouncement'] =   KbmAnnouncement::find($id);
                return view("applicationst.announcement.view", $this->model);
            } catch (Throwable $exception) {
                return Redirect::to(url("/stlearning/announcement"))
                                ->with("actionError", "Terjadi kesalahan !");
            }
        }
}
