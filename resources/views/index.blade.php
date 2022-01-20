@extends('layout.master')

@section('content')
{{-- Course Container --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3">
                <div class="d-flex justify-content-between">
                    <h3>
                        All Courses
                    </h3>

                    <a href="{{url('/course')}}" class="btn btn-sm btn-danger">
                        View All
                    </a>
                </div>
            </div>

        </div>
    </div>
    <div class="row mt-1">
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
<hr>

{{-- Article Container --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3">
                <div class="d-flex justify-content-between">
                    <h3>
                        All Articles
                    </h3>

                    <a href="{{url('/article')}}" class="btn btn-sm btn-danger">
                        View All
                    </a>
                </div>
            </div>

        </div>
    </div>
    <div class="row mt-1">
        {{-- loop for course --}}
        @foreach ($article as $c)
        <div class="col-md-4 mt-2">
            <a href="{{url('/article/'.$c->slug)}}">
                <div class="card">
                    <img src="https://i.ibb.co/mXKQyKB/b85bde27e97c.png" class="card-header" alt="">
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

                        </div>
                    </div>
                </div>
            </a>

        </div>
        @endforeach

    </div>
</div>
@endsection
