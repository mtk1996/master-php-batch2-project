@extends('admin.layout.master')

@section('content')
<div>
    <a href="{{route('article.index')}}" class="btn btn-sm btn-success">All Article</a>
</div>


<form action="{{route('article.update',$article->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Choose Category</label>
        <select name="category_id" class="form-control" id="">
            @foreach($category as $c)
            <option value="{{$c->id}}" @if($c->id==$article->category_id)
                selected
                @endif
                >{{$c->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Choose Language</label>
        <select name="language_id[]" multiple class="form-control" id="language">
            @foreach($language as $c)
            <option value="{{$c->id}}" @foreach($article->language as $al)
                @if($al->id === $c->id)
                selected
                @endif
                @endforeach
                >{{$c->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Enter Title</label>
        <input type="text" name="title" value="{{$article->title}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Choose Image</label>
        <input type="file" name="image" class="form-control">
        <br>
        <img src="{{asset('/images/'.$article->image)}}" style="width:100px" class="img-thumbnail" alt="">
    </div>
    <div class="form-group">
        <label for="">Enter description</label>
        <textarea name="description" class="form-control">{{$article->description}}</textarea>
    </div>
    <input type="submit" class="btn btn-sm btn-dark" value="Update">
</form>
@endsection


@section('script')
{{-- Select 2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    $(function(){
        $('#language').select2();
    })
</script>
@endsection
