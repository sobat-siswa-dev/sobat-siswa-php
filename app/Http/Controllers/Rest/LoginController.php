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
    
    // Refresh Token Ep
        public function refreshTokenEp (Request $request)
        {
            $admToken = AdmToken::where("token", $request->header('Authorization'))->first();
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
}
