<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmClass extends Model
{
    use HasFactory;

    protected $table = "adm_class";

    public function admStudentCount ()
    {
        return AdmStudent::where("class_id", $this->id)
                        ->where("is_active", 1)
                        ->count();
    }
    
    public function admClassGroup ()
    {
        return AdmClassGroup::find($this->group_id);
    }
}
