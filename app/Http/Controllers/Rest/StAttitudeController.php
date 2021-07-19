<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\{
    Controller,
    Utility
};

use App\Models\{
    AdmToken,
    AdmStudent,
    BehTrophy,
    BehViolation,
    BehCounseling
};

use Illuminate\Http\Request;

class StAttitudeController extends Controller
{
    // Trophy Student Ed
        public function trophyStudentEd (Request $request)
        {
            $admToken = AdmToken::where("token", $request->header ('Authorization'))->first();
            $admStudent = AdmStudent::find($admToken->student_id);
            $behTrophyList = BehTrophy::where("student_id", $admStudent->id)
                                            ->orderBy("get_at", "DESC")->get();
            return Utility::createResponse(200, $behTrophyList);
        }

    // Violation Student Ed
        public function violationStudentEd (Request $request)
        {
            $admToken = AdmToken::where("token", $request->header ('Authorization'))->first();
            $admStudent = AdmStudent::find($admToken->student_id);
            $behViolationList = BehViolation::where("student_id", $admStudent->id)
                                            ->where("class_id", $admStudent->class_id)
                                            ->orderBy("get_at", "DESC")->get();
            return Utility::createResponse(200, $behViolationList);
        }

    // Counseling Student Ed
        public function counselingStudentEd (Request $request)
        {
            $admToken = AdmToken::where("token", $request->header ('Authorization'))->first();
            $admStudent = AdmStudent::find($admToken->student_id);
            $behCounselingList = BehCounseling::where("student_id", $admStudent->id)->orderBy("held_date", "DESC")->get();
            return Utility::createResponse(200, $behCounselingList);
        }
}
