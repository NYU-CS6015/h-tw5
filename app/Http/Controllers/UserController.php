<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\StatusMessage;
use App\Http\Requests;

class UserController extends Controller
{
    
    public function index(){
    	$status = StatusMessage::where('user_id',Auth::user()->id);
    	return view('home',['status'=>$status]);
    }

    public function getProfile($user){

    }
}
