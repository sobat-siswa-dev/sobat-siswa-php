<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmSubjectEx extends Model
{
    use HasFactory;

    protected $table = "adm_subject_ex";
    
    public function admClassGroup ()
    {
        return AdmClassGroup::find($this->group_id);
    }
}
