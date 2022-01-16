@extends('admin.layout.master')

@section('content')
<div>
    <a href="{{route('language.index')}}" class="btn btn-sm btn-success">All Language</a>
</div>


<form action="{{route('language.update',$language->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Enter Language Name</label>
        <input type="text" name="name" class="form-control" value="{{$language->name}}">
    </div>
    <input type="submit" class="btn btn-sm btn-dark" value="Update">
</form>
@endsection
