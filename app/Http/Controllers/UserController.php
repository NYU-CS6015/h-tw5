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
    	// print_r(Auth::user()->id);
    	// exit;
    	$status = StatusMessage::User(Auth::user()->id)->get();
    	$followers = Follower::user(Auth::user()->id)->count();
    	$following = Follower::follower(Auth::user()->id)->count();
    	return view('home',['status'=>$status,'followers'=>$followers,'following'=>$following]);
    }

    public function getProfile($user){
    	$profile = User::where('username', $user)->get();
    	if (sizeof($profile) == 0){
    		abort(404,'Does not exist');
    	}
    	$thisUser = $profile[0]->toArray();
    	// print_r($thisUser);
    	$status = StatusMessage::User($thisUser['id'])->get();
    	$followers = Follower::user($thisUser['id'])->count();
    	$following = Follower::follower($thisUser['id'])->count();
    	if(Auth::check())
    		$followBool = Follower::IsFollowing($thisUser['id'],Auth::user()->id)->get();
    	else $followBool = 0;
    	if (sizeof($followBool) == 1){$isFollowing = true;}
    	else $isFollowing = false;
    	return view('profile',['status'=>$status,'followers'=>$followers,'following'=>$following,'user'=>$thisUser,'isFollowing'=>$isFollowing]);
    }
}
