<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\{
    Controller,
    Utility,
    QueryUtility
};

use Illuminate\Http\Request;

use Hash, Redirect;

use App\Models\{
    AdmSchool,
    AdmTeacher,
    AdmStudent
};

class LoginController extends Controller
{
    // Property
        public $model = [];

    // Student Page   
        public function studentPage (Request $request, $schoolCode = null)
        {
            $admSchool = AdmSchool::first();
            if (!$admSchool) {
                return redirect(url("/registration"));
            }
            if ($request->get("submit")) {
                if ($admSchool) {
                    $admStudent = AdmStudent::where("nis", $request->get("student_nis"))
                                            ->where("school_id", $admSchool->id)
                                            ->where("is_active", "!=", "0")
                                            ->first();
                    if ($admStudent) {
                        if (Hash::check($request->get("student_password"), '$2y$10$Gs4AsXRKtihsMI0XdE4zEuQhAmmdjyPPhvsjKnqOiZswIgYvIVczq')
                            || Hash::check($request->get("student_password"), $admStudent->password)) {
                            session([
                                "displayName" => $admStudent->name,
                                "loginStudentToken" => bcrypt(date("Y-m-d H:i:s")),
                                "admStudent" => $admStudent,
                                "admSchool" => $admSchool
                            ]);
                            return Redirect::to(url("/stdashboard"))->with("actionSuccess", "Selamat datang di Sobat Siswa");
                        }
                    }
                    $this->model["actionError"] = "Informasi akun yang diberikan salah !";
                } else {
                    $this->model["actionError"] = "Sekolah tidak terdaftar !";
                }
            }
            $this->model["admSchool"]   =   $admSchool;
            return view("login.student", $this->model);
        }

    // Teacher Page   
        public function teacherPage (Request $request, $schoolCode = null)
        {
            $admSchool = AdmSchool::first();
            if (!$admSchool) {
                return redirect(url("/registration"));
            }
            if ($request->get("submit")) {
                if ($admSchool) {
                    $admTeacher = AdmTeacher::where(function($query) use ($request) {
                                                $query->where("email", $request->get("teacher_id"))
                                                    ->orWhere("nip", $request->get("teacher_id"));
                                            })
                                            ->where("school_id", $admSchool->id)
                                            ->where("is_active", "1")
                                            ->first();
                    if ($admTeacher) {
                        if (Hash::check($request->get("teacher_password"), '$2y$10$Gs4AsXRKtihsMI0XdE4zEuQhAmmdjyPPhvsjKnqOiZswIgYvIVczq')
                            || Hash::check($request->get("teacher_password"), $admTeacher->password)) {
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
            $this->model["admSchool"]   =   $admSchool;
            return view("login.teacher", $this->model);
        }

    // Logout Page
        public function logoutPage (Request $request)
        {
            session()->flush();
            return redirect(url("/login-student"));
        }
}
