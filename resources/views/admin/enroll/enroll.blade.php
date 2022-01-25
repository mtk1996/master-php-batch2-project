@extends('admin.layout.master')

@section('content')
<h3>Student Enroll</h3>
<div>
    <a href="{{url('admin/enroll')}}" class="btn btn-dark btn-sm ">All</a>
    <a href="{{url('admin/enroll?pending=y')}}" class="btn btn-success btn-sm">Show All Pending</a>

</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>User</th>
            <th>Plan</th>
            <th>Status</th>
            <th>Payment Image</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($enroll as $e)

        <tr>
            <td>{{$e->user->name}}</td>
            <td>{{$e->pricing->title}}</td>
            <td>
                @if($e->type==='pending')
                <span class="badge badge-primary">
                    {{$e->type}}
                </span>

                @elseif ($e->type==='active')
                <span class="badge badge-success">
                    {{$e->type}}
                </span>

                @else
                <span class="badge badge-danger">
                    {{$e->type}}
                </span>
                @endif
            </td>
            <td>
                <img src="{{asset('/images/'.$e->payment_image)}}" width="150" alt="">
            </td>
            <td>
                @if($e->type==='pending')
                <a href="{{url('admin/enroll-active/'.$e->id)}}" class="btn btn-sm btn-dark">Set Active</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$enroll->links()}}
@endsection
