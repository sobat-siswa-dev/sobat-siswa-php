<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\{
    Controller,
    Utility
};

use App\Models\{
    AdmToken,
    AdmSchool,
    AdmStudent
};

use Hash;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Student Auth
        public function studentAuth (Request $request)
        {
            $admSchool = AdmSchool::where("code", $request->get("code"))->first();
            if ($admSchool) {
                $admStudent = AdmStudent::where("nis", $request->get("nis"))
                                        ->where("school_id", $admSchool->id)
                                        ->first();
                if ($admStudent) {
                    if (Hash::check($request->get("password"), $admStudent->password)) {
                        $admToken = AdmToken::where("student_id", $admStudent->id);
                        $admToken = $admToken->count() ? $admToken->first() : new AdmToken();
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
            }
            return Utility::createResponse(401, null);
        }
}
