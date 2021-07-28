<?php

namespace App\Http\Controllers\Application;

use Throwable, Redirect;

use App\Http\Controllers\{
    Controller,
    Utility
};

use Illuminate\Http\Request;

use App\Exports\ExpStudent;

use App\Models\{
    AdmRule,
    AdmClass,
    AdmClassGroup,
    AdmStudent,
    AdmTeacher,
    AdmSchool,
    AdmAlumn
};

class MasterController extends Controller
{
    // Model
        private $model = [];

    // School Page
        public function schoolPage (Request $request)
        {
            try {
                if ($request->has("submit-form")) {
                    $this->model["admSchool"] = AdmSchool::find(session()->get("admSchool")->id);
                    return view("application.school.form", $this->model);
                } else if ($request->has("submit-save")) {
                    $admSchool = AdmSchool::find(session()->get("admSchool")->id);
                    $admSchool->name = $request->get("name");
                    $admSchool->address = $request->get("address");
                    $admSchool->email = $request->get("email");
                    $admSchool->telp = $request->get("telp");
                    $admSchool->fax = $request->get("fax");
                    if ($request->file("attch")) {
                        $admSchool->logo = Utility::uploadFile($request, "attch", "attch-school/");
                    }
                    $admSchool->save();
                    return Redirect::to(url("/master/school"))
                                    ->with("actionSuccess", "Sukses menyimpan data !");
                }
            } catch (Throwable $exception) {
                return Redirect::to(url("/master/school"))
                                ->with("actionError", "Terjadi kesalahan !");
            }
            $this->model["admSchool"] = AdmSchool::find(session()->get("admSchool")->id);
            return view("application.school.view", $this->model);
        }

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

    // Teacher Page 
        public function teacherPage (Request $request)
        {
            try {
                if ($request->has("submit-form")) {
                    $this->model["admTeacher"] = $request->has("id") ? AdmTeacher::find($request->get("id")) : new AdmTeacher();
                    return view("application.teacher.form", $this->model);
                } else if ($request->has("submit-save")) {
                    $admTeacher = $request->has("id") ? AdmTeacher::find($request->get("id")) : new AdmTeacher();
                    $admTeacher->nip = $request->get("nip");
                    $admTeacher->name = $request->get("name");
                    $admTeacher->phone = $request->get("phone");
                    $admTeacher->whatsapp = $request->get("whatsapp");
                    $admTeacher->address = $request->get("address");
                    $admTeacher->email = $request->get("email");
                    $admTeacher->structural_pos = $request->get("structural_pos");
                    $admTeacher->school_id = session()->get("admSchool")->id;
                    $admTeacher->is_active = 1;
                    if ($request->get("password")) {
                        $admTeacher->password = bcrypt($request->get("password"));
                    }
                    if (!$admTeacher->role) {
                        $admTeacher->role   =   1;
                    }
                    $admTeacher->save();
                    return Redirect::to(url("/master/teacher"))
                                    ->with("actionSuccess", "Sukses menyimpan data !");
                    return false;
                } else if ($request->has("submit-delete")) {
                    $admTeacher = AdmTeacher::find($request->get("id"));
                    $admTeacher->is_active = 0;
                    $admTeacher->save();
                    return Redirect::to(url("/master/teacher"))
                                    ->with("actionSuccess", "Sukses menghapus data !");
                }
            } catch (Throwable $exception) {
                return Redirect::to(url("/master/teacher"))
                                ->with("actionError", "Terjadi kesalahan !");
            }
            $this->model["admTeacherList"] = AdmTeacher::where("school_id", session()->get("admSchool")->id)
                                                        ->where("is_active", 1)
                                                        ->orderBy("name", "ASC")
                                                        ->paginate("10");
            return view("application.teacher.list", $this->model);
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
                    if ($request->get("password")) {
                        $admStudent->password = bcrypt($request->get("password"));
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
                } else if ($request->has("submit-export")) {
                    $this->filterStudentPage($request);
                    $this->model["admStudentList"] = $this->model["admStudentList"]->orderBy("class_id", "ASC")
                                                                ->orderBy("name", "ASC")
                                                                ->get();
                    return \Excel::download(new ExpStudent($this->model), "Data-Siswa-" . date("dmyHis") . ".xlsx");
                }
            } catch (Throwable $exception) {
                return Redirect::to(url("/master/student"))
                                ->with("actionError", "Terjadi kesalahan !");
            }
            $this->filterStudentPage($request);
            $this->model["admClassList"] = AdmClass::where("school_id", session()->get("admSchool")->id)
                                                    ->where("is_active", 1)
                                                    ->orderBy("name", "ASC")
                                                    ->get();
            $this->model["admStudentList"] = $this->model["admStudentList"]->orderBy("class_id", "ASC")
                                                        ->orderBy("name", "ASC")
                                                        ->paginate("10");
            return view("application.student.list", $this->model);
        }

        public function filterStudentPage (Request $request)
        {
            $this->model["admStudentList"] = AdmStudent::where("school_id", session()->get("admSchool")->id)
                                                        ->where("is_active", 1);
            if ($request->get("class_id")) {
                $this->model["admStudentList"] = $this->model["admStudentList"]->where("class_id", $request->get("class_id"));
            }
            if ($request->get("gender")) {
                $this->model["admStudentList"] = $this->model["admStudentList"]->where("gender", $request->get("gender"));
            }
            if ($request->get("keyword")) {
                $this->model["admStudentList"] = $this->model["admStudentList"]->where("name", "LIKE", "%" . $request->get("keyword") . "%")
                                                                                ->orWhere("phone", "LIKE", "%" . $request->get("keyword") . "%")
                                                                                ->orWhere("email", "LIKE", "%" . $request->get("keyword") . "%");
            }
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
                    $admClass->level = $request->get("level");
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
