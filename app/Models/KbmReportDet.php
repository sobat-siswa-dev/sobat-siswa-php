<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KbmReportDet extends Model
{
    use HasFactory;

    protected $table = "kbm_report_det";
    
    function admSubject () {
        return AdmSubject::find($this->subject_id);
    }
}
