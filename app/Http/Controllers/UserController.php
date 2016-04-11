<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\StatusMessage;
use App\Follower;
use Auth;
use App\Http\Requests;

class UserController extends Controller
{
    
    public function index(){
    	$status = StatusMessage::user(Auth::user()->id)->get();
    	$followers = Follower::user(Auth::user()->id)->count();
    	$following = Follower::follower(Auth::user()->id)->count();
    	return view('home',['status'=>$status]);
    }

    public function getProfile($user){

    }
}
