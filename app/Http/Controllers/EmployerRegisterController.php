<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployerRegisterController extends Controller
{
    public  function  store(){
        $checkEmail = User::where('email', 'like', request('email'))->get();

       if(count($checkEmail) == 0){
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
       else{
            return redirect('login')->with('message','Email has Exist! Please Login first.');
        }

    }
}
