@extends('admin.layout.master')

@section('content')
<div>
    <a href="{{route('category.create')}}" class="btn btn-sm btn-success">Create</a>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>title</th>
            <th>learn date</th>
            <th>Price</th>
            <th>Description</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pricing as $p)

        <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->title}}</td>
            <td>{{$p->learn_date}}</td>
            <td>{{$p->price}}</td>
            <td>{{$p->description}}</td>
            <td>
                <a href="{{route('pricing.edit',$p->id)}}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{route('pricing.destroy',$p->id)}}" class="d-inline" method="POST"
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

@endsection
