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
        @foreach ($category as $l)

        <tr>
            <td>{{$l->id}}</td>
            <td>{{$l->name}}</td>
            <td>
                <a href="{{route('category.edit',$l->id)}}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{route('category.destroy',$l->id)}}" class="d-inline" method="POST"
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
{{$category->links()}}
@endsection
