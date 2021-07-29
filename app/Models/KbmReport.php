<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KbmReport extends Model
{
    use HasFactory;

    protected $table = "kbm_report";

    public function countDet () {
        return KbmReportDet::where("report_id", $this->id)->count();
    }
}
