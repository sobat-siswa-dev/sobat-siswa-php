<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\{
    Controller,
    Utility,
    QueryUtility
};

use Illuminate\Http\Request;
use App\Models\{
    AdmSchool,
    AdmTeacher
};

class RegistrationController extends Controller
{
    // Root Page
        public function rootPage (Request $request)
        {
            $admSchool = session()->get("admSchool") ? session()->get("admSchool") : new AdmSchool();
            session(["admSchool" => $admSchool]);
            return view("registration.root");
        }
        
    // Step 1 Page
        public function step1Page (Request $request)
        {
            $admSchool = session()->get("admSchool");
            $admSchool->name = $request->get("name");
            session(["admSchool" => $admSchool]);
            return view("registration.step-1");
        }
        
    // Step 2 Page
        public function step2Page (Request $request)
        {
            $admSchool = session()->get("admSchool");
            $admSchool->address = $request->get("address");
            $admSchool->email = $request->get("email");
            $admSchool->telp = $request->get("telp");
            $admSchool->fax = $request->get("fax");
            session(["admSchool" => $admSchool]);
            return view("registration.step-2");
        }

    // Final Page
        public function finalPage (Request $request)
        {
            $admSchool = session()->get("admSchool");
            $admSchool->admin_name = $request->get("admin_name");
            $admSchool->admin_email = $request->get("admin_email");
            session(["admSchool" => $admSchool]);
            return view("registration.final");
        }

    // Finish Page
        public function finishPage (Request $request)
        {
            $admSchool = session()->get("admSchool");
            $admSchool->code = Utility::createSlug($admSchool->name);
            $admSchool->save();
            $admTeacher = new AdmTeacher();
            $admTeacher->name = $admSchool->admin_name;
            $admTeacher->email = $admSchool->admin_email;
            $admTeacher->password = bcrypt("sobatSiswaJaya");
            $admTeacher->school_id = $admSchool->id;
            $admTeacher->role = 0;
            $admTeacher->is_active = 1;
            $admTeacher->save();
            session()->flush();
            return view("registration.finish", ["email" => $admTeacher->email, "password" => "sobatSiswaJaya"]);
        }
}
