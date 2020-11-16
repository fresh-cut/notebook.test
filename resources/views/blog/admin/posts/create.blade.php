<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('css/css/app.css')}}">
    <meta charset="UTF-8">
    <title>Notebook</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 sidebar">
            <ul class="sidebar-menu list-unstyled">
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('blog.admin.categories.index') }}">Категории</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('blog.admin.posts.index') }}">Посты</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="#3">3</a></li>
            </ul>
        </div>
        <div class="col-10">
            <h1>Написать пост</h1>
            <form action="{{ route('blog.admin.posts.store') }}" method="post">
                @csrf
                @method('POST')
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        @include('blog.admin.posts.includes.result_messages')
                        @include('blog.admin.posts.includes.post_create_main_col') {{-- основной столбец --}}
                    </div>
                    <div class="col-md-3">
                        @include('blog.admin.posts.includes.post_create_add_col')
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<script scr="asset('js/app.js')"></script>
</body>
</html>
