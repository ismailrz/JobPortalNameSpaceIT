<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected  $guarded = [];

    public function job(){
        return $this->hasMany(CompanyJob::class, 'companyId');
    }
}
