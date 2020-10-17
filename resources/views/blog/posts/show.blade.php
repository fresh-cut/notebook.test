<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('css/css/app.css')}}">
    <meta charset="UTF-8">
    <title>Notebook</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-3 sidebar">
            <ul class="sidebar-menu list-unstyled">
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="#1">1</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="#2">2</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="#3">3</a></li>
            </ul>
        </div>
        <div class="col-9">
            <h1>{{$post['title']}}</h1>
            <p>
                {{$post['bodytext']}}
            </p>
            <a href="{{ route('blog.posts.index') }}">Go to back</a>
        </div>
    </div>
</div>
<script scr="asset('js/app.js')"></script>
</body>
</html>

