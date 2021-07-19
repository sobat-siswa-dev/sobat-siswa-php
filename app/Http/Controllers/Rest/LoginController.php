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
    // Login Ep
        public function loginEp (Request $request)
        {
            $admSchool = AdmSchool::where("code", $request->get("code"))->first();
            if ($admSchool) {
                if ($request->get("type") == 'student') {
                    $admStudent = AdmStudent::where("nis", $request->get("nis"))
                                                ->where("school_id", $admSchool->id)
                                                ->where("is_active", "1")
                                                ->first();
                    if ($admStudent) {
                        if (Hash::check($request->get("password"), $admStudent->password)) {
                            $admToken = AdmToken::where("student_id", $admStudent->id)->first();
                            $admToken = $admToken ? $admToken : new AdmToken();
                            $admToken->student_id = $admStudent->id;
                            $admToken->token = bcrypt($admStudent->id . date("d F Y, H:i:s"));
                            $admToken->expired_at = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s"))) . " +1 day"));
                            $admToken->save();
                            return Utility::createResponse(200, [
                                "token" => $admToken->token,
                                "expired_at" => $admToken->expired_at
                            ]);
                        }
                    }
                } else if ($request->get("type") == 'teacher') {
                    $admTeacher = AdmTeacher::where("email", $request->get("email"))
                                                ->where("school_id", $admSchool->id)
                                                ->where("is_active", "1")
                                                ->first();
                    if ($admTeacher) {
                        if (Hash::check($request->get("password"), $admTeacher->password)) {
                            $admToken = AdmToken::where("teacher_id", $admTeacher->id)->first();
                            $admToken = $admToken ? $admToken : new AdmToken();
                            $admToken->teacher_id = $admTeacher->id;
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

    // Profile Ep
        public function profileEp (Request $request)
        {
            $admToken = AdmToken::where("token", $request->header ('Authorization'))->first();
            if ($admToken->student_id) {
                $admStudent = AdmStudent::find($admToken->student_id);
                $admClass = $admStudent->admClass();
                $admSchool = $admStudent->admSchool();
                $admStudent->class_name = $admClass ? $admClass->name : null;
                $admStudent->school_name = $admSchool ? $admSchool->name : null;
                unset($admStudent->id);
                unset($admStudent->is_active);
                unset($admStudent->password);
                unset($admStudent->parent_id);
                unset($admStudent->alumn_id);
                unset($admStudent->class_id);
                unset($admStudent->school_id);
                unset($admStudent->created_at);
                unset($admStudent->updated_at);
                return Utility::createResponse(200, $admStudent);
            } else if ($admToken->teacher_id) {
                $admTeacher = AdmTeacher::find($admToken->teacher_id);
                $admSchool = $admTeacher->admSchool();
                $admTeacher->school_name = $admSchool ? $admSchool->name : null;
                unset($admTeacher->id);
                unset($admTeacher->is_active);
                unset($admTeacher->password);
                unset($admTeacher->school_id);
                unset($admTeacher->created_at);
                unset($admTeacher->updated_at);
                unset($admTeacher->role);
                return Utility::createResponse(200, $admTeacher);
            }
            return Utility::createResponse(200, null);
        }
}
