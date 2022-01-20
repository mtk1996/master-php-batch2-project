@extends('layout.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <a href="{{url('/course/'.$course->slug)}}">
                    <li class="list-group-item">Course Overview</li>
                </a>

                @foreach($course->video as $v)
                <a href="{{url('/course-video/'.$v->slug)}}">
                    <li class="list-group-item">
                        @if($course->type==='free')

                        <i class="fas fa-unlock text-success"></i>
                        @else
                        @if ($isActive)
                        <i class="fas fa-unlock text-success"></i>
                        @else
                        <i class="fas fa-lock text-danger"></i>
                        @endif
                        @endif

                        {{$v->title}}

                    </li>
                </a>
                @endforeach
            </ul>
        </div>
        <div class="col-md-9">
            <img src="{{asset('/images/'.$course->image)}}" class="w-100" alt="">

            <div class="card p-2">
                <div>
                    <button class="btn btn-sm btn-danger">
                        <i class="fas fa-heart"></i>
                        <br>
                        <span class="badge bg-primary">{{$course->like_count}}</span>
                    </button>
                    <button class="btn btn-sm btn-danger">
                        <i class="fas fa-comments"></i>
                        <br>
                        <span class="badge bg-primary">{{$course->comment_count}}</span>
                    </button>

                    <small class="text-muted">
                        Language:
                    </small>
                    @foreach ($course->language as $c)
                    <span class="badge badge-success">{{$c->name}}</span>
                    @endforeach

                    <small class="text-muted">
                        Category: <span class="badge badge-dark">{{$course->category->name}}</span>
                    </small>

                </div>
                <h2>{{$course->title}}</h2>
                <p>
                    {!! $course->description !!}
                </p>

                <hr>
                @auth
                <div>

                    <h4>Comments</h4>

                    <textarea class="form-control" id="txtComment"></textarea>
                    <button id="btnComment" class="btn btn-sm btn-danger">Comment</button>

                    <ul class="list-group" id="commentBox">
                        @foreach($course->comment as $c)
                        <li class="list-group-item">
                            <b>{{$c->user->name}}</b>
                            <p>{{$c->comment}}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endauth

                @guest
                <div class="alert alert-danger">
                    Please <a href="{{url('/login')}}" class="btn btn-sm btn-dark">Login</a> To Create Review
                </div>
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.25.0/axios.min.js"
    integrity="sha512-/Q6t3CASm04EliI1QyIDAA/nDo9R8FQ/BULoUFyN4n/BDdyIxeH7u++Z+eobdmr11gG5D/6nPFyDlnisDwhpYA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var commentBox = document.getElementById('commentBox');
    var btnComment = document.getElementById('btnComment');
    var txtComment = document.getElementById('txtComment');

    btnComment.addEventListener('click',function(){
        if(txtComment.value==''){
            toastr.error('Please Enter Comment');
            return ;
        }

        const frmData = new FormData();
        frmData.append('comment',txtComment.value);
        frmData.append('course_slug',"{{$course->slug}}")
       // frmData.append('course_slug',"adfadfdasff")
        axios.post('/course-comment',frmData).then(function(res){
            if(res.data==='course_not_found'){
                toastr.error('Course Not Found');
            }
            if(res.data==='success'){
                toastr.success('Comment Created Success');
                var li = document.createElement('li');
                var b = document.createElement('b');
                var p = document.createElement('p');
                b.innerHTML = "{{isset(auth()->user()->name) ? auth()->user()->name : null}}";
                p.innerHTML = txtComment.value;

                li.classList.add('list-group-item');
                li.append(b)
                li.append(p)

                commentBox.prepend(li)
            }
        })
    })




</script>
@endsection
