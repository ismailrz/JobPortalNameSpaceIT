<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
    public function user(){
        return $this->belongsTo(UserProfile::class,'userId','userId');
    }
}
