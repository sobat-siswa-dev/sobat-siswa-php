<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\{
    Controller,
    Utility
};

use App\Models\{
    AdmToken,
    AdmSchool,
    AdmTeacher,
    AdmStudent
};

use Hash;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Login Student Ep
        public function loginStudentEp (Request $request)
        {
            $admSchool = AdmSchool::where("code", $request->get("code"))->first();
            if ($admSchool) {
                $admStudent = AdmStudent::where("nis", $request->get("nis"))
                                            ->where("school_id", $admSchool->id)
                                            ->where("is_active", "1")
                                            ->first();
                if ($admStudent) {
                    if (Hash::check($request->get("password"), $admStudent->password)) {
                        $admToken = AdmToken::where("student_id", $admStudent->id)->first();
                        $admToken = $admToken ? $admToken : new AdmToken();
                        $admToken->student_id = $admStudent->id;
                        $admToken->school_id = $admStudent->school_id;
                        $admToken->token = bcrypt($admStudent->id . date("d F Y, H:i:s"));
                        $admToken->expired_at = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s"))) . " +1 day"));
                        $admToken->save();
                        return Utility::createResponse(200, [
                            "token" => $admToken->token,
                            "expired_at" => $admToken->expired_at
                        ]);
                    }
                }
            }
            return Utility::createResponse(401, null);
        }

    // Login Teacher Ep
        public function loginTeacherEp (Request $request)
        {
            $admSchool = AdmSchool::where("code", $request->get("code"))->first();
            if ($admSchool) {
                $admTeacher = AdmTeacher::where("email", $request->get("email"))
                                            ->where("school_id", $admSchool->id)
                                            ->where("is_active", "1")
                                            ->first();
                if ($admTeacher) {
                    if (Hash::check($request->get("password"), $admTeacher->password)) {
                        $admToken = AdmToken::where("teacher_id", $admTeacher->id)->first();
                        $admToken = $admToken ? $admToken : new AdmToken();
                        $admToken->teacher_id = $admTeacher->id;
                        $admToken->school_id = $admTeacher->school_id;
                        $admToken->token = bcrypt($admTeacher->id . date("d F Y, H:i:s"));
                        $admToken->expired_at = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s"))) . " +1 day"));
                        $admToken->save();
                        return Utility::createResponse(200, [
                            "token" => $admToken->token,
                            "expired_at" => $admToken->expired_at
                        ]);
                    }
                }
            }
            return Utility::createResponse(401, null);
        }
    
    // Refresh Token Ep
        public function refreshTokenEp (Request $request)
        {
            $admToken = AdmToken::where("token", $request->header ('Authorization'))->first();
            $admToken->expired_at = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s"))) . " +1 day"));
            $admToken->save();
            return Utility::createResponse(200, "Token has been refresh");
        }

    // Profile Student Ep
        public function profileStudentEp (Request $request)
        {
            $admToken = AdmToken::where("token", $request->header ('Authorization'))->first();
            $admStudent = AdmStudent::find($admToken->student_id);
            $admClass = $admStudent->admClass();
            $admSchool = $admStudent->admSchool();
            $admStudent->class_name = $admClass ? $admClass->name : null;
            $admStudent->school_name = $admSchool ? $admSchool->name : null;
            return Utility::createResponse(200, $admStudent);
        }

    // Profile Teacher Ep
        public function profileTeacherEp (Request $request)
        {
            $admToken = AdmToken::where("token", $request->header ('Authorization'))->first();
            $admTeacher = AdmTeacher::find($admToken->teacher_id);
            $admSchool = $admTeacher->admSchool();
            $admTeacher->school_name = $admSchool ? $admSchool->name : null;
            return Utility::createResponse(200, $admTeacher);
        }
}
