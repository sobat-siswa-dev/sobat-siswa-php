<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KbmReportDetEx extends Model
{
    use HasFactory;

    protected $table = "kbm_report_det_ex";
    
    function admSubjectEx () {
        return AdmSubjectEx::find($this->subject_ex_id);
    }
}
