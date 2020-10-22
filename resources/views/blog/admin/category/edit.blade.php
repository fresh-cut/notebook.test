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
            <h1>Edit category</h1>
            <form action="{{ route('blog.admin.categories.update', $blogCategory->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="text" class="form-control" name="title" value="{{$blogCategory->title}}" autocomplete="off">
                </div>

                <div class="form-group">
                    <select>
                        @foreach($categotyList as $category)
                            <option name="parent_id" value="{{$category->id}}">{{$category->title}}</option>
                         @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <textarea name="description" class="form-control">{{$blogCategory->description}}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-dark" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script scr="asset('js/app.js')"></script>
</body>
</html>
