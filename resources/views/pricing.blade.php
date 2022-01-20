@extends('layout.master')

@section('content')
{{-- Course Container --}}
<div class="container">

    <div class="row mt-1">
        @foreach($pricing as $p)
        <div class="col-md-6">
            <div class="card p-5 bg-dark text-white text-center">
                <h4 class="text-center">{{$p->title}}</h4>
                <div>
                    <span class="btn btn-sm btn-danger">{{$p->price}}ks</span>
                </div>
                <p>{{$p->description}}</p>

                <a href="{{url('active-plan/'.$p->slug)}}">Active</a>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
