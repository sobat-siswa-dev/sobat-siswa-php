<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    AdmClass,
    AdmStudent,
    AdmTeacher
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
            return view("application.dashboard", $this->model);
        }
}
