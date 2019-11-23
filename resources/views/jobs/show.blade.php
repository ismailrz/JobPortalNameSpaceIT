@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> <b>  {{$job->title}}</b></div>

                    <div class="card-body">
                        <p>
                        <h3>Description</h3>
                        {{$job->description}}
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Short Info</div>
                    <div class="card-body">
                        <p>Salary : {{$job->salary}}</p>
                        <p>Location : {{$job->location}}</p>
                        <p>Country : {{$job->country}}</p>
                        <p>Last Date : {{$job->created_at->diffForHumans()}}</p>

                        @if(Auth::check() && auth()->user()->userType == 'seeker')
                            @if(count($applyCheck) == 0)
                                <form action="{{Route('job.apply',[$job->id])}}" method="post">
                                    @csrf
                                    <button class="btn btn-success btn-block" type="submit">Apply</button>
                                </form>
                            @else
                                <button class="btn btn-outline-danger btn-block disabled" type="submit" >Already Applied</button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

