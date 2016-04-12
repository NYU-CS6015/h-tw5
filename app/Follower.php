<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public function scopeUser($query, $id){
        return $query->whereUser($id);
    }

    public function scopeFollower($query,$id){
    	return $query->whereFollower($id);
    }

    public function scopeIsFollowing($query,$id,$user){
    	return $query->where('user',$id)->where('follower',$user);
    }
}
