@extends('admin.layout.master')

@section('content')
<div>
    <a href="{{route('course-video.create').'?course_id='.$course->id}}" class="btn btn-sm btn-success">Create</a>
</div>

<div class="alert alert-warning">
    Manage Video For <b class="text-danger">{{$course->title}}</b>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($course_videos as $l)
        <tr>
            <td>{{$l->id}}</td>
            <td>{{$l->title}}</td>
            <td>{{$l->video_url}}</td>
            <td>
                <a href="{{route('course-video.edit',$l->id).'?course_id='.$course->id}}"
                    class="btn btn-sm btn-primary">Edit</a>
                <form action="{{route('course-video.destroy',$l->id).'?course_id='.$course->id}}" class="d-inline"
                    method="POST" onsubmit="return confirm('sure delete?')">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
