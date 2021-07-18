<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KbmAnnouncement extends Model
{
    use HasFactory;

    protected $table = "kbm_announcement";
    
    public static function validateSchool ($id, $school_id) {
        return KbmAnnouncement::where("id", $id)->where("school_id", $school_id)->count();
    }
}
