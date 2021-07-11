<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\{
    Controller,
    Utility
};

use Illuminate\Http\Request;
use Redirect;

use App\Models\{
    BehTrophy,
    BehViolation,
    AdmTrophy,
    AdmClass,
    AdmStudent,
    AdmRule
};

class AttitudeController extends Controller
{
    // Model
        private $model = [];

    // Violation Page
        public function violationPage (Request $request)
        {
            $this->model["admClassList"] = AdmClass::where("school_id", session()->get("admSchool")->id)
                                                    ->where("is_active", 1)
                                                    ->orderBy("name", "ASC")
                                                    ->get();
            return view("application.violation.list", $this->model);
        }

    // Violation Detail Page
        public function violationDetailPage (Request $request, $id)
        {
            try {
                if ($request->has("submit-form")) {
                    $this->model["admRuleList"] = AdmRule::where("school_id", session()->get("admSchool")->id)
                                                        ->where("is_active", 1)
                                                        ->orderBy("code", "ASC")
                                                        ->get();
                    $this->model["behViolation"] = $request->has("id") ? BehViolation::find($request->get("id")) : new BehViolation();
                    return view("application.violation.form", $this->model);
                } else if ($request->has("submit-save")) {
                    $behViolation = $request->has("id") ? BehViolation::find($request->get("id")) : new BehViolation();
                    $admRule = AdmRule::find($request->get("rule_id"));
                    $admStudent = AdmStudent::find($id);;
                    $behViolation->get_at = $request->get("get_at");
                    $behViolation->rule_id = $admRule->id;
                    $behViolation->description = $admRule->description;
                    $behViolation->poin = $admRule->poin;
                    $behViolation->code = $admRule->code;
                    $behViolation->student_id = $id;
                    $behViolation->class_id = $admStudent->class_id;
                    if ($request->file("attch")) {
                        $behViolation->attch = Utility::uploadFile($request, "attch", "attch-violation/");
                    }
                    $behViolation->save();
                    return Redirect::to(url('attitude/violation/' . $id))
                                    ->with("actionSuccess", "Sukses menyimpan data !");
                    return false;
                } else if ($request->has("submit-delete")) {
                    $behViolation = BehViolation::find($request->get("id"));
                    $behViolation->delete();
                    return Redirect::to(url('attitude/violation/' . $id))
                                    ->with("actionSuccess", "Sukses menghapus data !");
                }
            } catch (Throwable $exception) {
                return Redirect::to(url('attitude/violation/' . $id))
                                ->with("actionError", "Terjadi kesalahan !");
            }
            $this->model["admStudent"]  =   AdmStudent::find($id);
            $this->model["behViolationList"]   =   BehViolation::where("student_id", $id)->orderBy("get_at", "ASC")->get();
            return view("application.violation.view", $this->model);
        }

    // Trophy Page
        public function trophyPage (Request $request)
        {
            $this->model["admClassList"] = AdmClass::where("school_id", session()->get("admSchool")->id)
                                                    ->where("is_active", 1)
                                                    ->orderBy("name", "ASC")
                                                    ->get();
            return view("application.trophy.list", $this->model);
        }

    // Trophy Detail Page
        public function trophyDetailPage (Request $request, $id)
        {
            try {
                if ($request->has("submit-form")) {
                    $this->model["behTrophy"] = $request->has("id") ? BehTrophy::find($request->get("id")) : new BehTrophy();
                    return view("application.trophy.form", $this->model);
                } else if ($request->has("submit-save")) {
                    $behTrophy = $request->has("id") ? BehTrophy::find($request->get("id")) : new BehTrophy();
                    $behTrophy->name = $request->get("name");
                    $behTrophy->get_at = $request->get("get_at");
                    $behTrophy->description = $request->get("description");
                    $behTrophy->level = $request->get("level");
                    $behTrophy->student_id = $id;
                    if ($request->file("attch")) {
                        $behTrophy->attch = Utility::uploadFile($request, "attch", "attch-trophy/");
                    }
                    $behTrophy->save();
                    return Redirect::to(url('attitude/trophy/' . $id))
                                    ->with("actionSuccess", "Sukses menyimpan data !");
                    return false;
                } else if ($request->has("submit-delete")) {
                    $behTrophy = BehTrophy::find($request->get("id"));
                    $behTrophy->delete();
                    return Redirect::to(url('attitude/trophy/' . $id))
                                    ->with("actionSuccess", "Sukses menghapus data !");
                }
            } catch (Throwable $exception) {
                return Redirect::to(url('attitude/trophy/' . $id))
                                ->with("actionError", "Terjadi kesalahan !");
            }
            $this->model["admStudent"]  =   AdmStudent::find($id);
            $this->model["behTrophyList"]   =   BehTrophy::where("student_id", $id)->orderBy("get_at", "ASC")->get();
            return view("application.trophy.view", $this->model);
        }

    // Student Selector Page
        public function studentSelectorPage (Request $request)
        {
            $this->model["admStudentList"] = AdmStudent::where("school_id", session()->get("admSchool")->id)
                                                        ->where("is_active", 1)
                                                        ->where("class_id", $request->get("class_id"))
                                                        ->orderBy("name", "ASC")
                                                        ->paginate("10");
            $this->model["requestUrl"] =   $request->get("request_url");
            return view("application.studentSelector", $this->model);
        }
}
