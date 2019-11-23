@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="row ">

            <div class="col-md-3">
                @if(empty(auth()->user()->profile->picture))
                    <img src="{{asset('Images/profile.jpg')}}" alt="" width="100%" height="200">
                @else
                    <img src="{{asset('Images/')}}/{{auth()->user()->profile->picture}}" alt="" width="100%" height="200">
                @endif

                <div class="card">
                    <form action="{{Route('user.picture',[$rows->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">Update your photo</div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="picture"> <br>
                            <button class="btn btn-success btn-block">upload</button>

                            @if($errors->has('picture'))
                                <div class="text-danger" >
                                    {{$errors->first('picture')}}
                                </div>
                            @endif
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Update your information</div>

                    <div class="card-body">
                        <form action="{{Route('user.update',[$rows->id])}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" name="firstName" value="{{auth()->user()->profile->firstName}}">
                            </div>
                            @if($errors->has('firstName'))
                                <div class="text-danger" >
                                    {{$errors->first('firstName')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" name="lastName" value="{{auth()->user()->profile->lastName}}">
                            </div>
                            @if($errors->has('lastName'))
                                <div class="text-danger" >
                                    {{$errors->first('lastName')}}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="skill">Skills</label>
                                <textarea name="skill" id="" cols="30" rows="3" class="form-control">
                                  {{Auth::user()->profile->skill}}
                              </textarea>
                            </div>
                            @if($errors->has('skill'))
                                <div class="text-danger" >
                                    {{$errors->first('skill')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <button class="btn btn-success btn-block" type="submit">Update</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">User Description</div>
                    <div class="card-body">
                        <p><b>Name :</b>{{$rows->profile->firstName }} {{$rows->profile->lastName }} </p>
                        <p><b>Email :</b>{{Auth::user()->email}}</p>
                        <p><b>User Type :</b>{{Auth::user()->userType}}</p>
                        <p><b>Skill :</b>{{Auth::user()->profile->skill}}</p>

                        @if(!empty(Auth::user()->profile->resume))
                            <p>Resume :
                                <a href="{{Storage::url(Auth::user()->profile->resume)}}">Download resume</a>
                            </p>
                        @else
                            <p class="text-danger">Please upload your resume </p>
                        @endif



                    </div>
                </div>
                <div class="card">
                    <form action="{{Route('user.resume',[$rows->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">Update your resume</div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="resume"> <br>
                            <button class="btn btn-success btn-block">upload</button>
                        </div>
                    </form>
                    @if($errors->has('resume'))
                        <div class="text-danger" >
                            {{$errors->first('resume')}}
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
