@extends('admin.layout.master')

@section('content')
<div>
    <a href="{{route('category.create')}}" class="btn btn-sm btn-success">Create</a>
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
        @foreach ($course as $l)

        <tr>
            <td>{{$l->id}}</td>
            <td>{{$l->title}}</td>
            <td>
                <a href="{{route('course.edit',$l->id)}}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{route('course.destroy',$l->id)}}" class="d-inline" method="POST"
                    onsubmit="return confirm('sure delete?')">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$course->links()}}
@endsection
