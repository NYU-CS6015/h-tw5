<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusMessage;
use App\Http\Requests;

class StatusController extends Controller
{
    public function postStatus(Request $request){

    	$data = Input::all();
        if(Request::ajax())
        {
            $status = new StatusMessage;
        	$status->user_id = $data['user_id'];
        	$status->message = $data['message'];
        	$status->save();
        }

    	
    }
}
