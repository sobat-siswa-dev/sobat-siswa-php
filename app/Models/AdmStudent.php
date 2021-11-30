<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\Utility;

class AdmStudent extends Model
{
    use HasFactory;

    protected $table = "adm_student";

    public function admClass ()
    {
        return AdmClass::find($this->class_id);
    }
    
    public function admSchool ()
    {
        return AdmSchool::find($this->school_id);
    }
    
    public function admAlumn ()
    {
        return AdmAlumn::find($this->alumn_id);
    }

    public function countTrophy () {
        return BehTrophy::where("student_id", $this->id)->count();
    }

    public function countViolationPoin () {
        $behViolationList = BehViolation::where("student_id", $this->id)
                                        ->where("class_id", $this->class_id)
                                        ->where("periode", Utility::currentSemesterPeriode())
                                        ->get();
        $returnCount = 0;
        foreach ($behViolationList as $behViolation) {
            $returnCount += $behViolation->poin;
        }
        return $returnCount;
    }

    public static function validateSchool ($id, $school_id) {
        return AdmStudent::where("id", $id)->where("school_id", $school_id)->count();
    }
}
