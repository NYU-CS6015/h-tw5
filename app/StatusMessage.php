<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusMessage extends Model
{
    public function scopeUser($query, $id){
        return $query->whereUserId($id);
    }
}
