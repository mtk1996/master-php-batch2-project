@extends('layout.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <a href="{{url('/course/'.$course_video->course->slug)}}">
                    <li class="list-group-item">Course Overview</li>
                </a>

                @foreach($course_video->course->video as $v)
                <a href="{{url('/course-video/'.$v->slug)}}">
                    <li class="list-group-item">
                        @if($course_video->course->type==='free')

                        <i class="fas fa-unlock text-success"></i>
                        @else
                        @if ($isActive)
                        <i class="fas fa-unlock text-success"></i>
                        @else
                        <i class="fas fa-lock text-danger"></i>
                        @endif
                        @endif
                        {{$v->title}}
                    </li>
                </a>
                @endforeach
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card p-3 text-white bg-dark">
                {{$course_video->course->title}} Course
            </div>
            <hr>
            <h2>{{$course_video->title}}</h2>
            <iframe src="{{$course_video->video_url}}" class="w-100" height="400" frameborder="0"></iframe>

        </div>
    </div>
</div>
@endsection
