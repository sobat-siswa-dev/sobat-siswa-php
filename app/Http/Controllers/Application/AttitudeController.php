<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\{
    Controller,
    Utility
};

use App\Exports\ExpViolation;

use Illuminate\Http\Request;
use Redirect;

use App\Models\{
    BehTrophy,
    BehViolation,
    BehCounseling,
    AdmTrophy,
    AdmClass,
    AdmStudent,
    AdmRule
};

class AttitudeController extends Controller
{
    // Model
        private $model = [];

    // Counseling Page
        public function counselingPage (Request $request)
        {
            $this->model["admClassList"] = AdmClass::where("school_id", session()->get("admSchool")->id)
                                                    ->where("is_active", 1)
                                                    ->orderBy("name", "ASC")
                                                    ->get();
            return view("application.counseling.list", $this->model);
        }

    // Counseling Detail Page
        public function counselingDetailPage (Request $request, $id)
        {
            try {
                if ($request->has("submit-form")) {
                    $this->model["behCounseling"] = $request->has("id") ? BehCounseling::find($request->get("id")) : new BehCounseling();
                    return view("application.counseling.form", $this->model);
                } else if ($request->has("submit-save")) {
                    $behCounseling = $request->has("id") ? BehCounseling::find($request->get("id")) : new BehCounseling();
                    $admStudent = AdmStudent::find($id);
                    $behCounseling->held_date = $request->get("held_date");
                    $behCounseling->place = $request->get("place");
                    $behCounseling->problem = $request->get("problem");
                    $behCounseling->solution = $request->get("solution");
                    $behCounseling->student_id = $id;
                    $behCounseling->class_id = $admStudent->class_id;
                    if ($request->file("attch")) {
                        $behCounseling->attch = Utility::uploadFile($request, "attch", "attch-counseling/");
                    }
                    $behCounseling->save();
                    return Redirect::to(url('attitude/counseling/' . $id))
                                    ->with("actionSuccess", "Sukses menyimpan data !");
                    return false;
                } else if ($request->has("submit-delete")) {
                    $behCounseling = BehCounseling::find($request->get("id"));
                    $behCounseling->delete();
                    return Redirect::to(url('attitude/counseling/' . $id))
                                    ->with("actionSuccess", "Sukses menghapus data !");
                }
            } catch (Throwable $exception) {
                return Redirect::to(url('attitude/counseling/' . $id))
                                ->with("actionError", "Terjadi kesalahan !");
            }
            $this->model["admStudent"]  =   AdmStudent::find($id);
            $this->model["behCounselingList"]   =   BehCounseling::where("student_id", $id)->orderBy("held_date", "DESC")->get();
            return view("application.counseling.view", $this->model);
        }

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
                } else if ($request->has("submit-export")) {
                    $this->model["admStudent"]  =   AdmStudent::find($id);
                    $this->model["behViolationList"]   =   BehViolation::where("student_id", $id)
                                                                ->where("class_id", $this->model["admStudent"]->class_id)
                                                                ->orderBy("get_at", "DESC")->get();
                    return \Excel::download(new ExpViolation($this->model), "Data-Pelanggaran-NIS-" . $this->model["admStudent"]->nis . ".xlsx");
                }
            } catch (Throwable $exception) {
                return Redirect::to(url('attitude/violation/' . $id))
                                ->with("actionError", "Terjadi kesalahan !");
            }
            $this->model["admStudent"]  =   AdmStudent::find($id);
            $this->model["behViolationList"]   =   BehViolation::where("student_id", $id)
                                                        ->where("class_id", $this->model["admStudent"]->class_id)
                                                        ->orderBy("get_at", "DESC")->get();
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
            $this->model["behTrophyList"]   =   BehTrophy::where("student_id", $id)->orderBy("get_at", "DESC")->get();
            return view("application.trophy.view", $this->model);
        }

    // Student Selector Page
        public function studentSelectorPage (Request $request)
        {
            $this->model["admStudentList"] = AdmStudent::where("school_id", session()->get("admSchool")->id)
                                                        ->where("is_active", 1)
                                                        ->where("class_id", $request->get("class_id"))
                                                        ->orderBy("name", "ASC")
                                                        ->get();
            $this->model["requestUrl"] =   $request->get("request_url");
            return view("application.studentSelector", $this->model);
        }
}
