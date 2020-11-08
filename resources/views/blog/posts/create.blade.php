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
            <h1>Create tasks</h1>
            <form action="{{ route('blog.posts.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="title" autocomplete="off" placeholder="напишите название для заметки">
                    <input type="hidden" name='category_id' value="2">
                    <input type="hidden" name='user_id' value="2">
                    <input type="hidden" name='slug' value="odio-raesentium-voluptas-rem-a-nesciunt-nihil-omnis-optio">
                    <input type="hidden" name='content_html' value="odio-praestium-voluptas-rem-a-nesciunt-nihil-omnis-optio">
                </div>
                <div class="form-group">
                    <textarea name="content_raw" class="form-control" placeholder="о чем вы думаете?"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit" >Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script scr="asset('js/app.js')"></script>
</body>
</html>

