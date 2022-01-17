@extends('admin.layout.master')

@section('content')
<div>
    <a href="{{route('course-video.index').'?course_id='.$course->id}}" class="btn btn-sm btn-success">All Course
        Videos</a>
</div>

<h4>Edit Course Video For <b class="text text-danger">{{$course->title}}</b> </h4>
<form action="{{route('course-video.update',$course_video->id).'?course_id='.$course->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Title</label>
        <input type="text" name="title" value="{{$course_video->title}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Enter URL</label>
        <input type="text" name="video_url" value="{{$course_video->video_url}}" class="form-control">
    </div>
    <input type="submit" class="btn btn-sm btn-dark" value="Update">
</form>
@endsection
