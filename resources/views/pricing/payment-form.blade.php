@extends('layout.master')

@section('content')
{{-- Course Container --}}
<div class="container">
    <div class="row mt-1">
        <div class="col-md-6 offset-md-3">
            <div class="card p-3">
                <div class="alert alert-danger">
                    Please Transfer {{$pricing->price}}ks to 09876
                </div>
                <form action="{{url('/active-plan/'.$pricing->slug)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Please Send Payment Image Proof</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-sm btn-danger" value="send">
                </form>
            </div>

        </div>
    </div>
</div>


@endsection
