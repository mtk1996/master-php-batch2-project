@extends('layout.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card mt-5">
                <div class="card-header bg-dark text-white">Login Form</div>
                <div class="card-body">
                    <form action="{{url('/register')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Enter Name</label>
                            <input type="text" name="name" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Chose Image</label>
                            <input type="file" name="image" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Enter Email</label>
                            <input type="email" name="email" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Enter Password</label>
                            <input type="password" name="password" class="form-control" id="">
                        </div>
                        <input type="submit" name="" value="Register" class="btn btn-sm btn-danger" id="">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
