<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Utility
{
    public static function createResponse ($status, $result) {
        $response["result"] = $result;
        $response["status"] = $status;
        switch ($status) {
            case 200:
                $response["message"] = "Success";
                break;
            case 500:
                $response["message"] = "Internal Server Error";
                break;
            case 401:
                $response["message"] = "Invalid Authentication";
                break;
            default:
                break;
        }
        return response($response);
    }

    public static function createSlug ($str, $delimiter = '-') 
    {
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    } 

    public static function uploadFile (Request $request, string $name, $customFolder = 'media/', $customName = false)
    {
        $file = $request->file($name);
        $newName = null;
        if ($file != false) {
            $storageUrl =   "storage/files/" .  $customFolder . date("Y") . "-" . date("m") . "-" . date("d") . "/";
            $newName    =  date("His") . "_" . ($customName ? $customName . '.' . $file->getClientOriginalExtension() : $file->getClientOriginalName());
            $file->move($storageUrl, $newName);
            $newName    = $storageUrl . $newName;
        }
        return $newName;
    }

    public static function currentSemesterPeriode () {
        $month = date("m");
        $year = date("Y");
        return $month > 7 ? $year . "/" . ($year + 1) : ($year - 1) . "/" . $year;
    }
}
