@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-striped table-hover">
                <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($applicants as $applicant)
                    <tr>
                        <td>
                        @if(empty($applicant->user->picture))
                            <img src="{{asset('Images/profile.jpg')}}" alt="" width="100" height="100">
                        @else
                            <img src="{{asset('Images/')}}/{{$applicant->user->picture}}" alt="" width="100" height="100">
                        @endif
                        </td>
                        <td>Title : {{$applicant->title}}</td>
                        <td>Applicant : {{$applicant->user->firstName}} {{$applicant->user->lastName}} </td>
                        <td>Skill : {{$applicant->user->skill}}</td>
                        <td><a href="{{Storage::url($applicant->user->resume)}}">Download resume</a></td>

                        <td> <i class="fa fa-calendar-check fa-2x"></i> Date : {{$applicant->created_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination justify-content-center">
            {{$applicants->links()}}
        </div>
    </div>
@endsection

