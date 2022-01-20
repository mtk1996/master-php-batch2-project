@extends('layout.master')

@section('content')
<div class="contianer">
    <div class="row">
        <div class="col-md-3">
            <div class="card p-2">
                <ul class="list-group">
                    <li class="list-group-item text-white bg-dark">Cateogry List </li>
                    @foreach ($category as $c)
                    <a href="{{url('/course?category='.$c->slug)}}">
                        <li class="list-group-item">{{$c->name}}</li>
                    </a>
                    @endforeach
                </ul>
            </div>
            <hr>
            <div class="card p-2">
                <ul class="list-group">
                    <li class="list-group-item text-white bg-dark">Language List </li>
                    @foreach ($language as $c)
                    <a href="{{url('/course?language='.$c->slug)}}">
                        <li class="list-group-item">{{$c->name}}</li>
                    </a>
                    @endforeach
                </ul>
            </div>

        </div>
        <div class="col-md-9">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{url('/course')}}" method="GET">
                            <input type="text" class="btn" name="search" id="">
                            <select name="category" id="" class="btn bg-dark text-white">
                                <option value="">--Cateogry--</option>
                                @foreach ($category as $c)
                                <option value="{{$c->slug}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                            <select name="language" id="" class="btn bg-dark text-white">
                                <option value="">--Language--</option>
                                @foreach ($language as $c)
                                <option value="{{$c->slug}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                            <input type="submit" value="Filter" class="btn btn-dark" />
                        </form>

                    </div>
                </div>
                <div class="row">
                    {{-- loop for course --}}
                    @foreach ($course as $c)
                    <div class="col-md-4 mt-2">
                        <a href="{{url('/course/'.$c->slug)}}">
                            <div class="card">
                                <img src="{{asset('/images/'.$c->image)}}" class="card-header" alt="">
                                <div class="card-body">
                                    <h4>{{$c->title}}</h4>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-center btn btn-sm btn-danger">
                                            <span class="fas fa-heart"></span>
                                            <br>
                                            {{$c->like_count}}
                                        </div>
                                        <div class="text-center btn btn-sm btn-warning">
                                            <span class="fas fa-comment"></span>
                                            <br>
                                            {{$c->comment_count}}
                                        </div>
                                        <div class="text-center btn btn-sm btn-danger">
                                            <span class="fas fa-play"></span>
                                            <br>
                                            {{$c->video_count}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
