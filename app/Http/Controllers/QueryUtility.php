<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QueryUtility
{
    public static function queryRecentViolation ($school_id)
    {
        return "
            select
                ast.name,
                ac.name as class_name,
                bv.code,
                bv.description,
                bv.poin,
                ac.school_id,
                bv.created_at
            from
                beh_violation bv
            join adm_class ac on
                ac.id = bv.class_id
            join adm_student ast on
                ast.id = bv.student_id
            where 
                ac.school_id = $school_id 
            order by
                bv.id desc
            limit 5
        ";
    }

    public static function queryRecentTrophy ($school_id)
    {
        return "
            select
                ast.name,
                bt.name as description,
                bt.level,
                ast.school_id,
                bt.created_at 
            from
                beh_trophy bt
            join adm_student ast on
                ast.id = bt.student_id
            where 
                ast.school_id = $school_id
            order by
                bt.id desc
            limit 5
        ";
    }
}