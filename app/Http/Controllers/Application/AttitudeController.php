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
    AdmTrophy,
    AdmClass,
    AdmStudent
};

class AttitudeController extends Controller
{
    // Model
        private $model = [];
        
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
            $this->model["behTrophyList"]   =   BehTrophy::where("student_id", $id)->orderBy("get_at", "ASC")->paginate(10);
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
