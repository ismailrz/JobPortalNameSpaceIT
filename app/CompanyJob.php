<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyJob extends Model
{
    public function company(){
        return $this->belongsTo(Company::class, 'userId');
    }
}
