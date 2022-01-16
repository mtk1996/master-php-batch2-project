@extends('layout.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item">Video Title</li>
                <li class="list-group-item">Video Title</li>
                <li class="list-group-item">Video Title</li>
                <li class="list-group-item">Video Title</li>
                <li class="list-group-item">Video Title</li>
            </ul>
        </div>
        <div class="col-md-9">
            <img src="https://i.ibb.co/mXKQyKB/b85bde27e97c.png" class="w-100" alt="">

            <div class="card p-2">
                <div>
                    <button class="btn btn-sm btn-danger">
                        <i class="fas fa-heart"></i>
                        <br>
                        <span class="badge bg-primary">10</span>
                    </button>
                    <button class="btn btn-sm btn-danger">
                        <i class="fas fa-comments"></i>
                        <br>
                        <span class="badge bg-primary">10</span>
                    </button>
                </div>
                <h2>Course Title</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum natus rerum, aliquid perferendis
                    incidunt fugiat vero praesentium ut hic porro sit ratione beatae, harum quas eius. Consectetur
                    obcaecati iste voluptates.</p>

                <hr>
                <div>
                    <h4>Comments</h4>
                    <form action="">
                        <textarea class="form-control"></textarea>
                        <input type="submit" value="Create Comment" class="btn btn-sm btn-danger">
                    </form>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <b>User Name</b>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe facere recusandae
                                voluptas exercitationem hic maiores voluptates iusto numquam corporis sequi amet
                                consectetur, velit minus odio. Nisi vero inventore dolores repellat?</p>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
