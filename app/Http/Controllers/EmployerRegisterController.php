<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployerRegisterController extends Controller
{
    public  function  store(){
        $user =  User::create([
            'userType' => 'employer',
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        Company::create([
            'userId' => $user->id,
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'businessName' => request('businessName'),
        ]);
        return  redirect('login');
    }
}
