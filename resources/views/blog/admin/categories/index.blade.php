<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('css/css/app.css')}}">
    <meta charset="UTF-8">
    <title>Categories</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-3 sidebar">
            <ul class="sidebar-menu list-unstyled">
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('blog.admin.categories.index') }}">Категории</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="#2">2</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="#3">Users</a></li>
            </ul>
        </div>
        <div class="col-9">
            <h1>All categories</h1>
            <nav>
                <a href="{{ route('blog.admin.categories.create') }}" class="btn btn-success">Add categories</a>
            </nav>
            <br>
            <table class="table">
                <thead>
                <tr style="text-align: center">
                    <th>#</th>
                    <th>Категория</th>
                    <th>Родитель</th>
                </tr>
                </thead>
                <tbody>
                @foreach($blogCategories as $blogCategory)
                <tr>
                   <td align="center">{{$blogCategory->id}}</td>
                   <td align="center">
                       <a href="{{ route('blog.admin.categories.edit',$blogCategory->id) }}">
                           {{$blogCategory->title}}
                       </a>
                   </td>
                   <td align="center">{{$blogCategory->parent_id}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @if($blogCategories->total() > $blogCategories->count() )
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $blogCategories->links() }}
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
