<?php

namespace App\Http\Controllers;

use App\Applicants;
use App\CompanyJob;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class jobController extends Controller
{
    public  function  index(){
        $jobs = CompanyJob::paginate(5);
        return view('welcome',compact('jobs'));
    }
    public function jobs(){
        $jobs = CompanyJob::paginate(5);
        return view('jobs.alljobs',compact('jobs'));
    }
    public function show($id){
        $job = CompanyJob::find($id);
        $applyCheck = Applicants::where('jobId',$id)->where('userId',Auth::user()->id)->get();
        return view('jobs.show',compact('job','applyCheck'));
    }

    public function apply($id){
        $job = CompanyJob::find($id);
        $userId = auth()->user()->id;

        $row = new Applicants();
        $row->jobId = $job->id;
        $row->userId = $userId;
        $row->companyId = $job->companyId;
        $row->title = $job->title;
        $row->description = $job->description;
        $row->salary = $job->salary;
        $row->location = $job->location;
        $row->country = $job->country;
        $row->save();
        return redirect()->back()->with('message','Job applied successfully!');
    }
}
