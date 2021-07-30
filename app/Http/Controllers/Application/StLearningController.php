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
    AdmStudent,
    KbmReport,
    KbmReportDet,
    KbmReportDetEx,
    KbmAnnouncement
};


class StLearningController extends Controller
{
    // Model
        private $model = [];

    // St Report Page
        public function stReportPage (Request $request)
        {
            $id = session()->get("admStudent")->id;
            try {
                if ($request->has("submit-view")) {
                    $this->model["admStudent"]  =   AdmStudent::find($id);
                    $this->model["kbmReport"] =     KbmReport::find($request->get("id"));
                    $this->model["kbmReportDetList"] =  KbmReportDet::where("report_id", $request->get("id"))->get();
                    $this->model["kbmReportDetExList"] =  KbmReportDetEx::where("report_id", $request->get("id"))->get();
                    $this->model["kbmReportBe"] = KbmReport::where("semester", ($this->model["kbmReport"]->semester - 1))
                                                            ->where("year_learn", $this->model["kbmReport"]->year_learn)
                                                            ->where("is_active", 1)
                                                            ->where("student_id", $id)
                                                            ->first();
                    if ($this->model["kbmReportBe"]) {
                        $result = [];
                        foreach ($this->model["kbmReportDetList"] as $kbmReportDet) {
                            $kbmReportDetBe = KbmReportDet::where("report_id", $this->model["kbmReportBe"]->id)
                                                        ->where("subject_id", $kbmReportDet->subject_id)
                                                        ->first();
                            if ($kbmReportDetBe) {
                                $kbmReportDet->mark_knowledge_be = $kbmReportDetBe->mark_knowledge;
                                $kbmReportDet->mark_practice_be = $kbmReportDetBe->mark_practice;
                                $kbmReportDet->mark_total_be = $kbmReportDetBe->mark_total;
                            }
                            $result[]   =   $kbmReportDet;
                        }
                        $this->model["kbmReportDetList"] = $result;
                    }
                    return view("applicationst.report.view-detail", $this->model);
                }
            } catch (Throwable $exception) {
                return Redirect::to(url('stlearning/report/' . $id))
                                ->with("actionError", "Terjadi kesalahan !");
            }
            $this->model["kbmReportList"]  = KbmReport::where("student_id", $id)->where("is_active", 1)->orderBy("get_at", "ASC")->get();
            return view("applicationst.report.list", $this->model);
        }

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
