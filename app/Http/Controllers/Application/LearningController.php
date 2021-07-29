<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\{
    Controller,
    Utility
};
use Illuminate\Http\Request;

use Redirect, Hash, DB;

use App\Models\{
    AdmStudent,
    AdmTeacher,
    AdmSubject,
    AdmSubjectEx,
    AdmClass,
    KbmReport,
    KbmReportDet,
    KbmReportDetEx,
    KbmAnnouncement
};

class LearningController extends Controller
{
    // Model
        private $model = [];

    // Report Page
        public function reportPage (Request $request)
        {
            $this->model["admClassList"] = AdmClass::where("school_id", session()->get("admSchool")->id)
                                                    ->where("is_active", 1)
                                                    ->orderBy("name", "ASC")
                                                    ->get();
            return view("application.report.list", $this->model);
        }

    // Report Detail Page
        public function reportDetailPage (Request $request, $id)
        {
            if (!AdmStudent::validateSchool($id, session()->get("admSchool")->id)) {
                return Redirect::to(url("/learning/report"));
            } 
            try {
                if ($request->has("submit-form")) {
                    $this->model["admStudent"]  =   AdmStudent::find($id);
                    $this->model["admSubjectList"]  =   AdmSubject::whereNull("group_id");
                    $this->model["admSubjectExList"]  =   AdmSubjectEx::whereNull("group_id");
                    if ($this->model["admStudent"]->class_id) {
                        $admClass = $this->model["admStudent"]->admClass();
                        if ($admClass->group_id) {
                            $this->model["admSubjectList"] = $this->model["admSubjectList"]->orWhere("group_id", $admClass->group_id);
                            $this->model["admSubjectExList"] = $this->model["admSubjectExList"]->orWhere("group_id", $admClass->group_id);
                        }
                    }
                    $this->model["admSubjectList"] = $this->model["admSubjectList"]->get();
                    $this->model["admSubjectExList"] = $this->model["admSubjectExList"]->get();
                    return view("application.report.form", $this->model);
                } else if ($request->has("submit-save")) {
                    $admStudent  =   AdmStudent::find($id);
                    $kbmReport  =   new KbmReport();
                    $kbmReport->year_learn  = $request->get("period_from") . "/" . $request->get("period_to");
                    $kbmReport->get_at  = $request->get("get_at");
                    $kbmReport->semester  = $request->get("semester");
                    $kbmReport->total_subject  = $request->get("total_subject");
                    $kbmReport->mark_total  = str_replace(",", ".", $request->get("mark_total"));
                    $kbmReport->mark_rate  = str_replace(",", ".", $request->get("mark_rate"));
                    $kbmReport->student_id = $admStudent->id;
                    $kbmReport->class_id = $admStudent->class_id;
                    $kbmReport->class_name = $admStudent->admClass()->name;
                    $kbmReport->school_id = $admStudent->school_id;
                    $kbmReport->is_active = 1;
                    $kbmReport->student_name = $admStudent->name;
                    if ($request->file("attch")) {
                        $kbmReport->attch = Utility::uploadFile($request, "attch", "attch-report/");
                    }
                    $kbmReport->save();
                    foreach ($request->get("kbmReportDet") as $arr) {
                        $kbmReportDet = new KbmReportDet();
                        $kbmReportDet->subject_id = $arr["subject_id"];
                        $kbmReportDet->mark_limit = str_replace(",", ".", $arr["mark_limit"]);
                        $kbmReportDet->mark_practice = isset($arr["mark_practice"]) ? str_replace(",", ".", $arr["mark_practice"]) : null;
                        $kbmReportDet->mark_knowledge = isset($arr["mark_knowledge"]) ? str_replace(",", ".", $arr["mark_knowledge"]) : null;
                        $kbmReportDet->mark_total = str_replace(",", ".", $arr["mark_total"]);
                        $kbmReportDet->report_id = $kbmReport->id;
                        $kbmReportDet->save();
                    }
                    foreach ($request->get("kbmReportDetEx") as $arr) {
                        $kbmReportDetEx = new KbmReportDetEx();
                        $kbmReportDetEx->subject_ex_id = $arr["subject_ex_id"];
                        $kbmReportDetEx->mark = $arr["mark"];
                        $kbmReportDetEx->report_id = $kbmReport->id;
                        $kbmReportDetEx->save();
                    }
                    return Redirect::to(url('learning/report/' . $id))
                                    ->with("actionSuccess", "Sukses menyimpan data !");
                } else if ($request->has("submit-delete")) {
                    $kbmReport = KbmReport::find($request->get("id"));
                    $kbmReport->is_active = 0;
                    $kbmReport->save();
                    return Redirect::to(url('learning/report/' . $id))
                                    ->with("actionSuccess", "Sukses menghapus data !");
                } else if ($request->has("submit-view")) {
                    $this->model["admStudent"]  =   AdmStudent::find($id);
                    $this->model["kbmReport"] =     KbmReport::find($request->get("id"));
                    $this->model["kbmReportDetList"] =  KbmReportDet::where("report_id", $request->get("id"))->get();
                    $this->model["kbmReportDetExList"] =  KbmReportDetEx::where("report_id", $request->get("id"))->get();
                    return view("application.report.view-detail", $this->model);
                }
            } catch (Throwable $exception) {
                return Redirect::to(url('learning/report/' . $id))
                                ->with("actionError", "Terjadi kesalahan !");
            }
            $this->model["admStudent"]  =   AdmStudent::find($id);
            $this->model["kbmReportList"]  = KbmReport::where("student_id", $id)->where("is_active", 1)->orderBy("get_at", "ASC")->get();
            return view("application.report.view", $this->model);
        }

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
