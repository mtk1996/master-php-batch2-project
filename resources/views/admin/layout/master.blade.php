<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MMCoder Admin</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <a href="{{url('admin/')}}">
                        <li class="list-group-item">
                            Home
                        </li>
                    </a>

                    <a href="{{route('language.index')}}">
                        <li class="list-group-item">
                            Language
                        </li>
                    </a>
                    <a href="{{route('category.index')}}">
                        <li class="list-group-item">
                            Category
                        </li>
                    </a>
                    <a href="{{route('article.index')}}">
                        <li class="list-group-item">
                            Article
                        </li>
                    </a>
                    <a href="{{route('course.index')}}">
                        <li class="list-group-item">
                            Course
                        </li>
                    </a>
                    <a href="{{route('pricing.index')}}">
                        <li class="list-group-item">
                            Pricing
                        </li>
                    </a>
                    <a href="{{url('/admin/logout')}}">
                        <li class="list-group-item">
                            Logout
                        </li>
                    </a>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="card p-2">
                    @if(session()->has('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    @if(session()->has('error'))
                    <div class="alert alert-success">{{session('error')}}</div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>


    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js">
    </script>

    @yield('script')
</body>

</html>
