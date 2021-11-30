<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QueryUtility
{
    public static function queryStatsTrendViolation ($school_id, $month, $year)
    {
        return "
            select
                bv.code,
                bv.description, 
                count(bv.id) as total,
                sum(bv.poin) as totalpoin
            from
                beh_violation bv
            join adm_student ast on
                bv.student_id = ast.id
            where 
                ast.school_id = $school_id
                and ast.is_active in (1,2)
                and month(bv.get_at) = $month
                and year(bv.get_at) = $year 
            group by 
                bv.code, bv.description
            order by
                sum(bv.poin) desc
        ";
    }

    public static function queryStats6MonthViolation ($school_id, $month, $year)
    {
        return "
            select
                count(bv.id) as total,
                MONTHNAME('$year-$month-1') as monthlabel,
                $year as yearlabel
            from
                beh_violation bv
            join adm_student ast on
                bv.student_id = ast.id
            where
                ast.school_id = $school_id
                and ast.is_active in (1,2)
                and month(bv.get_at) = $month
                and year(bv.get_at) = $year 
        ";
    }

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
                bv.student_id,
                bv.created_at
            from
                beh_violation bv
            join adm_class ac on
                ac.id = bv.class_id
            join adm_student ast on
                ast.id = bv.student_id
            where 
                ac.school_id = $school_id 
                and ast.is_active in (1,2)
                and bv.periode = '" . Utility::currentSemesterPeriode() . "' 
            order by
                bv.id desc
            limit 3
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
                bt.student_id,
                bt.created_at 
            from
                beh_trophy bt
            join adm_student ast on
                ast.id = bt.student_id
            where 
                ast.school_id = $school_id 
                and ast.is_active in (1,2)
            order by
                bt.id desc
            limit 3
        ";
    }
}