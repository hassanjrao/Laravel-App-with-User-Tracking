<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        if (Auth::user()->hasRole("user")) {

         
            return view('user.dashboard.index');


        } else if (Auth::user()->hasRole("super-admin")) {

            $logs=LogActivity::logActivityLists();

            return view('admin.dashboard.index',compact("logs"));
        }
    }
}
