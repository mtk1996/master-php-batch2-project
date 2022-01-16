@extends('admin.layout.master')

@section('content')
<div>
    <a href="{{route('course.index')}}" class="btn btn-sm btn-success">All Article</a>
</div>

<h4>Create Article</h4>
<form action="{{route('course.update',$course->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Choose Type</label>
        <select name="type" class="form-control" id="">
            <option value="free" @if($course->type=='free')
                selected
                @endif
                >Free</option>
            <option value="paid" @if($course->type=='paid')
                selected
                @endif
                >Paid</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Choose Category</label>
        <select name="category_id" class="form-control" id="">
            @foreach($category as $c)
            <option value="{{$c->id}}" @if ($c->id==$course->category_id) selected @endif
                >{{$c->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Choose Language</label>
        <select name="language_id[]" multiple class="form-control" id="language">
            @foreach($language as $c)

            <option value="{{$c->id}}" @foreach ( $course->language as $language )
                @if ($language->id === $c->id)
                selected
                @endif
                @endforeach
                >{{$c->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Enter Title</label>
        <input type="text" name="title" value="{{$course->title}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Choose Image</label>
        <input type="file" name="image" class="form-control">
        <img src="{{asset('/images/'.$course->image)}}" width="80" class="img-thumbnail" alt="">
    </div>
    <div class="form-group">
        <label for="">Enter description</label>
        <textarea name="description" class="form-control" id="description">{{$course->description}}</textarea>
    </div>
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
    <input type="submit" class="btn btn-sm btn-dark" value="Update">
</form>
@endsection

@section('script')
{{-- Select 2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

{{-- summernote --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(function(){
        $('#language').select2();

        $('#description').summernote();
    })
</script>
@endsection
