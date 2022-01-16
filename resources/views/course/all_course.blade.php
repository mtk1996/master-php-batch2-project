@extends('layout.master')

@section('content')
<div class="contianer">
    <div class="row">
        <div class="col-md-3">
            <div class="card p-2">
                <ul class="list-group">
                    <li class="list-group-item">Cateogry One</li>
                </ul>
            </div>
            <hr>
            <div class="card p-2">
                <ul class="list-group">
                    <li class="list-group-item">Language</li>
                </ul>
            </div>

        </div>
        <div class="col-md-9">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="">
                            <select name="" id="" class="btn bg-dark text-white">
                                <option value="">--Cateogry--</option>
                                <option value="">Web Dev</option>
                            </select>
                            <select name="" id="" class="btn bg-dark text-white">
                                <option value="">--Language--</option>
                                <option value="">Javascript</option>
                            </select>
                            <input type="submit" value="Filter" class="btn btn-dark" />
                        </form>

                    </div>
                </div>
                <div class="row">
                    {{-- loop for course --}}
                    <div class="col-md-4 mt-2">
                        <div class="card">
                            <img src="https://i.ibb.co/mXKQyKB/b85bde27e97c.png" class="card-header" alt="">
                            <div class="card-body">
                                <h4>Coruse Title</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-2">
                        <div class="card">
                            <img src="https://i.ibb.co/mXKQyKB/b85bde27e97c.png" class="card-header" alt="">
                            <div class="card-body">
                                <h4>Coruse Title</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-2">
                        <div class="card">
                            <img src="https://i.ibb.co/mXKQyKB/b85bde27e97c.png" class="card-header" alt="">
                            <div class="card-body">
                                <h4>Coruse Title</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-2">
                        <div class="card">
                            <img src="https://i.ibb.co/mXKQyKB/b85bde27e97c.png" class="card-header" alt="">
                            <div class="card-body">
                                <h4>Coruse Title</h4>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
