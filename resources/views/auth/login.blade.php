@extends('layout.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card mt-5">
                <div class="card-header bg-dark text-white">Login Form</div>
                <div class="card-body">
                    <form action="{{url('/login')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Enter Email</label>
                            <input type="email" name="email" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Enter Password</label>
                            <input type="password" name="password" class="form-control" id="">
                        </div>
                        <input type="submit" value="Login" class="btn btn-sm btn-danger" name="" id="">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
