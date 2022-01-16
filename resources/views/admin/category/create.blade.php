@extends('admin.layout.master')

@section('content')
<div>
    <a href="{{route('language.index')}}" class="btn btn-sm btn-success">All Language</a>
</div>

<h4>Create Lanuguage</h4>
<form action="{{route('language.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Enter Language Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <input type="submit" class="btn btn-sm btn-dark" value="Create">
</form>
@endsection
