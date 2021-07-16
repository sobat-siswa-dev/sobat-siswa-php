<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StGlobalController extends Controller
{
    // Model
        private $model = [];

    // St Dashboard Page   
        public function stdashboardPage (Request $request)
        {
            return view("applicationst.dashboard", $this->model);
        }
}
