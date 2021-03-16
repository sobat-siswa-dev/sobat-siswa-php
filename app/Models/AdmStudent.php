<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmStudent extends Model
{
    use HasFactory;

    protected $table = "adm_student";

    public function admClass ()
    {
        return AdmClass::find($this->class_id);
    }
    
    public function admAlumn ()
    {
        return AdmAlumn::find($this->alumn_id);
    }
}
