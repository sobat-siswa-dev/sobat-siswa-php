<?php

namespace App\Http\Controllers\Application;

use Throwable, Redirect;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    AdmRule,
    AdmClass,
    AdmClassGroup,
    AdmStudent,
    AdmAlumn
};

class MasterController extends Controller
{
    // Model
        private $model = [];

    // Rule Page    
        public function rulePage (Request $request)
        {
            try {
                if ($request->has("submit-form")) {
                    $this->model["admRule"] = $request->has("id") ? AdmRule::find($request->get("id")) : new AdmRule();
                    return view("application.rule.form", $this->model);
                } else if ($request->has("submit-save")) {
                    $admRule = $request->has("id") ? AdmRule::find($request->get("id")) : new AdmRule();
                    $admRule->code = $request->get("code");
                    $admRule->description = $request->get("description");
                    $admRule->poin = $request->get("poin");
                    $admRule->school_id = session()->get("admSchool")->id;
                    $admRule->is_active = 1;
                    $admRule->save();
                    return Redirect::to(url("/master/rule"))
                                    ->with("actionSuccess", "Sukses menyimpan data !");
                } else if ($request->has("submit-delete")) {
                    $admRule = AdmRule::find($request->get("id"));
                    $admRule->delete();
                    return Redirect::to(url("/master/rule"))
                                    ->with("actionSuccess", "Sukses menghapus data !");
                }
            } catch (Throwable $exception) {
                return Redirect::to(url("/master/rule"))
                                ->with("actionError", "Terjadi kesalahan !");
            }
            $this->model["admRuleList"] = AdmRule::where("school_id", session()->get("admSchool")->id)
                                                ->where("is_active", 1)
                                                ->orderBy("code", "ASC")
                                                ->paginate("10");
            return view("application.rule.list", $this->model);
        }

    // Alumn Page
        public function alumnPage (Request $request)
        {
            $this->model["admStudentAlumnList"] = AdmStudent::where("school_id", session()->get("admSchool")->id)
                                                            ->where("is_active", 2)
                                                            ->orderBy("alumn_id", "ASC")
                                                            ->orderBy("name", "ASC")
                                                            ->paginate("10");
            return view("application.alumn.list", $this->model);
        }

    // Student Page 
        public function studentPage (Request $request)
        {
            try {
                if ($request->has("submit-form")) {
                    $this->model["admStudent"] = $request->has("id") ? AdmStudent::find($request->get("id")) : new AdmStudent();
                    $this->model["admClassList"] = AdmClass::where("school_id", session()->get("admSchool")->id)
                                                            ->where("is_active", 1)
                                                            ->orderBy("name", "ASC")
                                                            ->get();
                    return view("application.student.form", $this->model);
                } else if ($request->has("submit-save")) {
                    $admStudent = $request->has("id") ? AdmStudent::find($request->get("id")) : new AdmStudent();
                    $admStudent->nis = $request->get("nis");
                    $admStudent->name = $request->get("name");
                    $admStudent->class_id = $request->get("class_id");
                    $admStudent->place_birth = $request->get("place_birth");
                    $admStudent->date_birth = $request->get("date_birth");
                    $admStudent->gender = $request->get("gender");
                    $admStudent->address = $request->get("address");
                    $admStudent->phone = $request->get("phone");
                    $admStudent->email = $request->get("email");
                    $admStudent->father_name = $request->get("father_name");
                    $admStudent->father_work = $request->get("father_work");
                    $admStudent->mother_name = $request->get("mother_name");
                    $admStudent->mother_work = $request->get("mother_work");
                    $admStudent->vice_name = $request->get("vice_name");
                    $admStudent->vice_work = $request->get("vice_work");
                    $admStudent->school_id = session()->get("admSchool")->id;
                    $admStudent->is_active = 1;
                    if ($admStudent->password == false) {
                        $admStudent->password = bcrypt($request->get("nis") . "_" . session()->get("admSchool")->code);
                    }
                    $admStudent->save();
                    return Redirect::to(url("/master/student"))
                                    ->with("actionSuccess", "Sukses menyimpan data !");
                    return false;
                } else if ($request->has("submit-delete")) {
                    $admStudent = AdmStudent::find($request->get("id"));
                    $admStudent->is_active = 0;
                    $admStudent->save();
                    return Redirect::to(url("/master/student"))
                                    ->with("actionSuccess", "Sukses menghapus data !");
                }
            } catch (Throwable $exception) {
                return Redirect::to(url("/master/student"))
                                ->with("actionError", "Terjadi kesalahan !");
            }
            $this->model["admStudentList"] = AdmStudent::where("school_id", session()->get("admSchool")->id)
                                                        ->where("is_active", 1)
                                                        ->orderBy("class_id", "ASC")
                                                        ->orderBy("name", "ASC")
                                                        ->paginate("10");
            return view("application.student.list", $this->model);
        }

    // Class Group Page
        public function classGroupPage (Request $request)
        {
            try {
                if ($request->has("submit-form")) {
                    $this->model["admClassGroup"] = $request->has("id") ? AdmClassGroup::find($request->get("id")) : new AdmClassGroup();
                    return view("application.classGroup.form", $this->model);
                } else if ($request->has("submit-save")) {
                    $admClassGroup = $request->has("id") ? AdmClassGroup::find($request->get("id")) : new AdmClassGroup();
                    $admClassGroup->name = $request->get("name");
                    $admClassGroup->school_id = session()->get("admSchool")->id;
                    $admClassGroup->is_active = 1;
                    $admClassGroup->save();
                    return Redirect::to(url("/master/classGroup"))
                                    ->with("actionSuccess", "Sukses menyimpan data !");
                } else if ($request->has("submit-delete")) {
                    $admClassGroup = AdmClassGroup::find($request->get("id"));
                    $admClassGroup->delete();
                    return Redirect::to(url("/master/classGroup"))
                                    ->with("actionSuccess", "Sukses menghapus data !");
                }
            } catch (Throwable $exception) {
                return Redirect::to(url("/master/classGroup"))
                                ->with("actionError", "Terjadi kesalahan !");
            }
            $this->model["admClassGroupList"] = AdmClassGroup::where("school_id", session()->get("admSchool")->id)
                                                            ->where("is_active", 1)
                                                            ->orderBy("name", "ASC")
                                                            ->paginate("10");
            return view("application.classGroup.list", $this->model);
        }

    // Class Page
        public function classPage (Request $request)
        {
            try {
                if ($request->has("submit-form")) {
                    $this->model["admClass"] = $request->has("id") ? AdmClass::find($request->get("id")) : new AdmClass();
                    $this->model["admClassGroupList"] = AdmClassGroup::where("school_id", session()->get("admSchool")->id)
                                                                    ->where("is_active", 1)
                                                                    ->orderBy("name", "ASC")
                                                                    ->get();
                    return view("application.class.form", $this->model);
                } else if ($request->has("submit-save")) {
                    $admClass = $request->has("id") ? AdmClass::find($request->get("id")) : new AdmClass();
                    $admClass->name = $request->get("name");
                    $admClass->code = $request->get("code");
                    $admClass->group_id = $request->get("group_id");
                    $admClass->school_id = session()->get("admSchool")->id;
                    $admClass->is_active = 1;
                    $admClass->save();
                    return Redirect::to(url("/master/class"))
                                    ->with("actionSuccess", "Sukses menyimpan data !");
                } else if ($request->has("submit-delete")) {
                    $admClass = AdmClass::find($request->get("id"));
                    $admClass->delete();
                    return Redirect::to(url("/master/class"))
                                    ->with("actionSuccess", "Sukses menghapus data !");
                } else if ($request->has("submit-form-move")) {
                    $this->model["admClass"] = AdmClass::find($request->get("id"));
                    $this->model["admClassList"] = AdmClass::where("school_id", session()->get("admSchool")->id)
                                                            ->where("is_active", 1)
                                                            ->orderBy("name", "ASC")
                                                            ->get();
                    $this->model["admAlumnList"] = AdmAlumn::where("school_id", session()->get("admSchool")->id)
                                                            ->orderBy("year", "ASC")
                                                            ->get();
                    $this->model["admStudentList"] = AdmStudent::where("school_id", session()->get("admSchool")->id)
                                                                ->where("is_active", 1)
                                                                ->where("class_id", $request->get("id"))
                                                                ->orderBy("name", "ASC")
                                                                ->get();
                    return view("application.class.form-move", $this->model);
                } else if ($request->has("submit-save-move")) {
                    if ($request->get("class_to") != -99) {
                        foreach ($request->get("admStudentArray") as $admStudentId) {
                            $admStudent = AdmStudent::find($admStudentId);
                            $admStudent->class_id = $request->get("class_to");
                            $admStudent->save();
                        }
                        return Redirect::to(url("/master/class"))
                                        ->with("actionSuccess", "Sukses memindahkan siswa ke kelas tujuan !");
                    } else {
                        if ($request->get("alumn_id") != -99) {
                            $admAlumn = AdmAlumn::find($request->get("alumn_id"));
                        } else {
                            $admAlumn = new AdmAlumn();
                            $admAlumn->name = $request->get("alumn_name");
                            $admAlumn->year = $request->get("alumn_year");
                            $admAlumn->description = $request->get("alumn_description");
                            $admAlumn->school_id = session()->get("admSchool")->id;
                            $admAlumn->save();
                        }
                        foreach ($request->get("admStudentArray") as $admStudentId) {
                            $admStudent = AdmStudent::find($admStudentId);
                            $admStudent->class_id = null;
                            $admStudent->alumn_id = $admAlumn->id;
                            $admStudent->is_active = 2;
                            $admStudent->save();
                        }
                        return Redirect::to(url("/master/class"))
                                        ->with("actionSuccess", "Sukses memindahkan siswa menjadi alumni !");
                    }
                }
            } catch (Throwable $exception) {
                return Redirect::to(url("/master/class"))
                                ->with("actionError", "Terjadi kesalahan !");
            }
            $this->model["admClassList"] = AdmClass::where("school_id", session()->get("admSchool")->id)
                                                    ->where("is_active", 1)
                                                    ->orderBy("name", "ASC")
                                                    ->paginate("10");
            return view("application.class.list", $this->model);
        }
}
