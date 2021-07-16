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
    AdmStudent
};

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
                                                        ->orderBy("get_at", "DESC")->limit(3)->get();
            $this->model["admSchool"]   =   AdmSchool::find(session()->get('admSchool')->id); 
            return view("applicationst.dashboard", $this->model);
        }

    // Change Password Page
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
}
