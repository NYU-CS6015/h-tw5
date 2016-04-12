<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;
use App\Http\Requests;

class FollowerController extends Controller
{
    public function follow(Request $request){
    	$status = new Follower;
        $status->user = $request->follow_id;
        $status->follower = $request->user_id;
        $status->save();
        $isFollowing = true;
        return back();//->with(['isFollowing'->$isFollowing]);
    }

    public function unfollow(Request $request){
    	$unfollow = ['user'=>$request->follow_id,'follower'=>$request->user_id];
		$affectedRows = Follower::where($unfollow)->delete();
		$isFollowing = false;
        return back();//->with(['isFollowing'->$isFollowing]);
    }
}
