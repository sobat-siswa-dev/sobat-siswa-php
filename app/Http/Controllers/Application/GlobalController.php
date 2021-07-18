<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Redirect, Hash, DB;

use App\Http\Controllers\QueryUtility;

use App\Models\{
    AdmClass,
    AdmStudent,
    AdmTeacher,
    BehTrophy,
    BehViolation,
    KbmAnnouncement
};

class GlobalController extends Controller
{
    // Model
        private $model = [];

    // Dashboard Page   
        public function dashboardPage (Request $request)
        {
            $this->model["admClassCount"] = AdmClass::where("school_id", session()->get("admSchool")->id)
                                                    ->where("is_active", 1)
                                                    ->count();
            $this->model["admTeacherCount"] = AdmTeacher::where("school_id", session()->get("admSchool")->id)
                                                        ->where("is_active", 1)
                                                        ->count();
            $this->model["admStudentCount"] = AdmStudent::where("school_id", session()->get("admSchool")->id)
                                                        ->where("is_active", 1)
                                                        ->count();
            $this->model["admStudentAlumnCount"] = AdmStudent::where("school_id", session()->get("admSchool")->id)
                                                            ->where("is_active", 2)
                                                            ->count();
            $this->model['kbmAnnouncementRecent'] =   KbmAnnouncement::where("school_id", session()->get("admSchool")->id)->orderBy("id", "DESC")->limit(3)->get();
            $this->model["behViolationRecent"] = DB::select(QueryUtility::queryRecentViolation(session()->get("admSchool")->id));
            $this->model["behTrophyRecent"] = DB::select(QueryUtility::queryRecentTrophy(session()->get("admSchool")->id));
            return view("application.dashboard", $this->model);
        }

    // Change Password Page
        public function changePasswordPage (Request $request)
        {
            try {
                if ($request->has("submit-save")) {
                    $admTeacher = AdmTeacher::find(session()->get("admTeacher")->id);
                    if (Hash::check($request->get("old_password"), $admTeacher->password)) {
                        $admTeacher->password   =   bcrypt($request->get("new_password"));
                        $admTeacher->save();
                        return Redirect::to(url("/dashboard"))
                                    ->with("actionSuccess", "Sukses mengubah kata sandi !");
                    } else {
                        return Redirect::to(url("/changePassword"))
                                ->with("actionError", "Kata sandi lama tidak sama !");
                    }
                }
            } catch (Throwable $exception) {
                return Redirect::to(url("/changePassword"))
                                ->with("actionError", "Terjadi kesalahan !");
            }
            return view("application.changePassword", $this->model);
        }
}
