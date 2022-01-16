@extends('admin.layout.master')

@section('content')
<div>
    <a href="{{route('article.create')}}" class="btn btn-sm btn-success">Create</a>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Category</th>
            <th>Language</th>
            <th>Title</th>
            <th>Description</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($article as $l)

        <tr>
            <td>{{$l->id}}</td>
            <td>
                <img src="{{asset('/images/'.$l->image)}}" alt="" style="width:50px" class="img-thumbnail">
            </td>
            <td>
                <span class="badge badge-primary">{{$l->category->name}}</span>
            </td>
            <td>
                @foreach($l->language as $lan)
                <span class="badge badge-danger">{{$lan->name}}</span>
                @endforeach

            </td>
            <td>
                {{$l->title}}
            </td>
            <td>
                {{$l->description}}
            </td>
            <td>
                <a href="{{route('article.edit',$l->id)}}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{route('article.destroy',$l->id)}}" class="d-inline" method="POST"
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
{{$article->links()}}
@endsection
