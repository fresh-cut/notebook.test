<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('css/css/app.css')}}">
    <meta charset="UTF-8">
    <title>Posts</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 sidebar">
            <ul class="sidebar-menu list-unstyled">
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('blog.admin.categories.index') }}">Категории</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('blog.admin.posts.index') }}">Посты</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="#3">Users</a></li>
            </ul>
        </div>
        <div class="col-10">
            <h1>All posts</h1>
            <nav>
                <a href="{{ route('blog.admin.posts.create') }}" class="btn btn-success">Написать</a>
            </nav>
            <br>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Автор</th>
                    <th>Категория</th>
                    <th>Заголовок</th>
                    <th>Дата публикации</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    @php
                    /** @var \App\Models\BlogPost $post */
                    @endphp
                <tr @if(!$post->is_published) style="background-color: #ccc" @endif>
                   <td>{{ $post->id }}</td>
                   <td>{{ $post->user->name }}</td>
                   <td>{{ $post->category->title }}</td>
                   <td >
                       <a href="{{ route('blog.admin.posts.edit',$post->id) }}">
                           {{$post->title}}
                       </a>
                   </td>
                   <td>{{$post->is_published ? \Carbon\Carbon::parse($post->published_at)->format('d.M H:i') : ''}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @if($posts->total() > $posts->count() )
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
<script scr="asset('js/app.js')"></script>
</body>
</html>
