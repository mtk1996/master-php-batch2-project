@extends('admin.layout.master')

@section('content')
<div>
    <a href="{{route('course-video.index').'?course_id='.$course->id}}" class="btn btn-sm btn-success">All Course
        Videos</a>
</div>

<h4>Create Course Video For {{$course->title}}</h4>
<form action="{{route('course-video.store').'?course_id='.$course->id}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Enter URL</label>
        <input type="text" name="video_url" class="form-control">
    </div>
    <input type="submit" class="btn btn-sm btn-dark" value="Create">
</form>
@endsection
