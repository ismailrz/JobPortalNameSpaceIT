<?php

namespace App\Http\Controllers;

use App\CompanyJob;
use App\User;
use App\UserProfile;
use Illuminate\Http\Request;

class UserControlle extends Controller
{
    public  function  profile($id){
        $rows = User::find($id);
        return view('user.profile',compact('rows'));
    }

    public function  update(Request $request, $id){
        UserProfile::where('userId', $id)->update([
            'firstName' => $request->firstName,
            'LastName' => $request->lastName,
            'skill' => $request->skill,
        ]);
        return redirect()->back()->with('message','Information Updated SUccessfully');
    }

    public  function  resume(Request $request , $id){

        $this->validate($request, [
            'resume' => 'required|mimes:doc,docx,pdf|max:5000'
        ]);
        $resume = $request->file('resume')->store('public/files');
        UserProfile::where('userId', $id)->update([
            'resume' => $resume,
        ]);
        return redirect()->back()->with('message','Resume uploaded Successfully!!');

    }
    public function picture(Request $request, $id){
        $this->validate($request, [
            'picture' => 'required|mimes:jpg,jpeg,png|max:5000'
        ]);
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $text = $file->getClientOriginalExtension();
            $filename = time().'.'.$text;
            $file->move('Images/',$filename);

            UserProfile::where('userId', $id)->update([
                'picture' => $filename,
            ]);

        }
        return redirect()->back()->with('message',' profile photo updated successfully!');
    }


}
