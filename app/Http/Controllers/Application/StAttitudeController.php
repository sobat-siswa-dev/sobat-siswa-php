<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    BehTrophy,
    BehViolation,
    BehCounseling
};

use App\Http\Controllers\Utility;

class StAttitudeController extends Controller
{
    // Model
        private $model = [];

    // St Trophy Page 
        public function stTrophyPage (Request $request)
        {
            $this->model["behTrophyList"]   =   BehTrophy::where("student_id", session()->get("admStudent")->id)
                                                        ->orderBy("get_at", "DESC")->get();
            return view("applicationst.trophy.list", $this->model);
        }
        
    // St Violation Page 
        public function stViolationPage (Request $request)
        {
            $this->model["behViolationList"]   =   BehViolation::where("student_id", session()->get("admStudent")->id)
                                                        ->where("class_id", session()->get("admStudent")->class_id)
                                                        ->where("periode", Utility::currentSemesterPeriode())
                                                        ->orderBy("get_at", "DESC")->get();
            return view("applicationst.Violation.list", $this->model);
        }
    
    // St Counseling Page 
        public function stCounselingPage (Request $request)
        {
            $this->model["behCounselingList"]   =   BehCounseling::where("student_id", session()->get("admStudent")->id)->orderBy("held_date", "DESC")->get();
            return view("applicationst.counseling.list", $this->model);
        }
}
