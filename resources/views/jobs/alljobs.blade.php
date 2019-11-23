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
                @foreach($jobs as $job)
                    <tr>
                        <td>Title : {{$job->title}}</td>
                        <td>Description : {{$job->description}}</td>
                        <td>salary : {{$job->salary}}</td>
                        <td>location : <i class="fa fa-map-marker fa-2x"> &nbsp;</i> {{$job->location}}</td>
                        <td>Country : <i class="fa fa-map-marker fa-2x"> &nbsp;</i> {{$job->country}}</td>
                        <td> <i class="fa fa-calendar-check fa-2x"></i> Date : {{$job->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{Route('job.show',[$job->id])}}">
                                <button class="btn btn-outline-success">Details</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination justify-content-center">
            {{$jobs->links()}}
        </div>
    </div>
@endsection
