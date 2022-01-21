<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LogActivity as HelpersLogActivity;
use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $logs=HelpersLogActivity::logActivityLists();
        return view("admin.dashboard.index",compact("logs"));
    }
}
