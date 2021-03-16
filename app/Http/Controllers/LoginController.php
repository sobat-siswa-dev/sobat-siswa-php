<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash, Redirect;
use App\Models\{
    AdmSchool,
    AdmTeacher
};

class LoginController extends Controller
{
    // Property
        public $model = [];

    // Student Page   
        public function studentPage (Request $request)
        {
            return view("login.student");
        }

    // Teacher Page   
        public function teacherPage (Request $request)
        {
            if ($request->get("submit")) {
                $admSchool = AdmSchool::first();
                if ($admSchool) {
                    $admTeacher = AdmTeacher::where("email", $request->get("teacher_email"))
                                            ->where("school_id", $admSchool->id)
                                            ->first();
                    if ($admTeacher) {
                        if (Hash::check($request->get("teacher_password"), $admTeacher->password)) {
                            session([
                                "displayName" => $admTeacher->name,
                                "loginToken" => bcrypt(date("Y-m-d H:i:s")),
                                "admTeacher" => $admTeacher,
                                "admSchool" => $admSchool
                            ]);
                            return Redirect::to(url("/dashboard"))->with("actionSuccess", "Selamat datang di Sobat Siswa");
                        }
                    }
                    $this->model["actionError"] = "Informasi akun yang diberikan salah !";
                } else {
                    $this->model["actionError"] = "Sekolah tidak terdaftar !";
                }
            }
            return view("login.teacher", $this->model);
        }

    // Logout Page
        public function logoutPage (Request $request)
        {
            session()->flush();
            return redirect(url("/login"));
        }
}
