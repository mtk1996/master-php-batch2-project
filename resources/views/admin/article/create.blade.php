@extends('admin.layout.master')

@section('content')
<div>
    <a href="{{route('article.index')}}" class="btn btn-sm btn-success">All Article</a>
</div>

<h4>Create Article</h4>
<form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Choose Category</label>
        <select name="category_id" class="form-control" id="">
            @foreach($category as $c)
            <option value="{{$c->id}}">{{$c->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Choose Language</label>
        <select name="language_id[]" multiple class="form-control" id="language">
            @foreach($language as $c)
            <option value="{{$c->id}}">{{$c->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Enter Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Choose Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Enter description</label>
        <textarea name="description" class="form-control" id="description"></textarea>
    </div>
    <input type="submit" class="btn btn-sm btn-dark" value="Create">
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
