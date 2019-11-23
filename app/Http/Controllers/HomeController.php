<?php

namespace App\Http\Controllers;

use App\Applicants;
use App\CompanyJob;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $applicants = Applicants::paginate(5);
        $jobs = CompanyJob::paginate(5);
        return view('user.index',compact('applicants','jobs'));
    }
}
