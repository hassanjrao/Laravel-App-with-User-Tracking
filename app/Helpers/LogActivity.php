<?php

namespace App\Helpers;

use App\Models\LogActivity as ModelsLogActivity;
use Illuminate\Http\Request;

class LogActivity{

    public static function addToLog($subject){

        $log = [];
    	$log['subject'] = $subject;
    	$log['url'] = \Request::fullUrl();
    	$log['method'] = \Request::method();
    	$log['ip'] = \Request::ip();
    	// $log['agent'] = $request->header('user-agent');
    	$log['user_id'] = auth()->check() ? auth()->user()->id : NULL;

        ModelsLogActivity::create($log);
    }

    public static function logActivityLists()
    {
    	return  ModelsLogActivity::latest()->withTrashed()->get();
    }

}



?>
