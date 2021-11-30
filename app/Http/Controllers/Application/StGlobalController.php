<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Redirect, Hash;

use App\Models\{
    BehTrophy,
    BehViolation,
    BehCounseling,
    AdmSchool,
    AdmStudent,
    KbmAnnouncement
};

use App\Http\Controllers\Utility;

class StGlobalController extends Controller
{
    // Model
        private $model = [];

    // St Dashboard Page   
        public function stdashboardPage (Request $request)
        {
            $this->model["behTrophyRecent"]   =   BehTrophy::where("student_id", session()->get("admStudent")->id)
                                                        ->orderBy("get_at", "DESC")->limit(3)->get();
            $this->model["behViolationRecent"]   =   BehViolation::where("student_id", session()->get("admStudent")->id)
                                                        ->where("class_id", session()->get("admStudent")->class_id)
                                                        ->where("periode", Utility::currentSemesterPeriode())
                                                        ->orderBy("get_at", "DESC")->limit(3)->get();
            $this->model['kbmAnnouncementRecent'] =   KbmAnnouncement::where("school_id", session()->get("admSchool")->id)
                                                            ->orderBy("id", "DESC")->limit(3)->get();
            $this->model["admSchool"]   =   AdmSchool::find(session()->get('admSchool')->id); 
            return view("applicationst.dashboard", $this->model);
        }

    // St Change Password Page
        public function stChangePasswordPage (Request $request)
        {
            try {
                if ($request->has("submit-save")) {
                    $admStudent = AdmStudent::find(session()->get("admStudent")->id);
                    if (Hash::check($request->get("old_password"), $admStudent->password)) {
                        $admStudent->password   =   bcrypt($request->get("new_password"));
                        $admStudent->save();
                        return Redirect::to(url("/stdashboard"))
                                    ->with("actionSuccess", "Sukses mengubah kata sandi !");
                    } else {
                        return Redirect::to(url("/stchangePassword"))
                                ->with("actionError", "Kata sandi lama tidak sama !");
                    }
                }
            } catch (Throwable $exception) {
                return Redirect::to(url("/stchangePassword"))
                                ->with("actionError", "Terjadi kesalahan !");
            }
            return view("applicationst.changePassword", $this->model);
        }

    // St Biodata Page 
        public function stBiodataPage (Request $request)
        {
            try {
                if ($request->has("submit-save")) {
                    $admStudent = AdmStudent::find(session()->get("admStudent")->id);
                    $admStudent->place_birth = $request->get("place_birth");
                    $admStudent->date_birth = $request->get("date_birth");
                    $admStudent->gender = $request->get("gender");
                    $admStudent->address = $request->get("address");
                    $admStudent->phone = $request->get("phone");
                    $admStudent->email = $request->get("email");
                    $admStudent->father_name = $request->get("father_name");
                    $admStudent->father_work = $request->get("father_work");
                    $admStudent->mother_name = $request->get("mother_name");
                    $admStudent->mother_work = $request->get("mother_work");
                    $admStudent->vice_name = $request->get("vice_name");
                    $admStudent->vice_work = $request->get("vice_work");
                    $admStudent->save();
                    return Redirect::to(url("/stbiodata"))
                                    ->with("actionSuccess", "Sukses menyimpan data !");
                    return false;
                }
            } catch (Throwable $exception) {
                return Redirect::to(url("/stbiodata"))
                                ->with("actionError", "Terjadi kesalahan !");
            }
            $this->model["admStudent"]   =   AdmStudent::find(session()->get('admStudent')->id); 
            return view("applicationst.biodata", $this->model);
        }
}
