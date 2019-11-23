<?php
namespace App\Http\Controllers;

use App\Applicants;
use App\CompanyJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function jobCreate(){
        return view('company.jobcreate');
    }

    public function jobStore(Request $request){
        $row = new companyJob();
        $row->companyId = Auth::user()->id;
        $row->title = $request->title;
        $row->description = $request->description;
        $row->salary = $request->salary;
        $row->location = $request->location;
        $row->country = $request->country;
        $row->save();
        return redirect()->to('/home')->with('message','Job Posted Susscessfully!');
    }

    public function applicants(){
        $applicants = Applicants::where('companyId', Auth::user()->id)->paginate(5);
        return view('company.applicants',compact('applicants'));
    }
}
