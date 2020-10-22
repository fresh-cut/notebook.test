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
                    <label for="title">Заголовок</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$blogCategory->title}}" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="slug">Идентификатор</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{$blogCategory->slug}}" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="parent_id">Родитель</label>
                    <select name="parent_id" id="parent_id" class="form-control" required>
                        @foreach($categotyList as $categoryOption)
                            <option value="{{$categoryOption->id}}"
                                @if($blogCategory->parent_id===$categoryOption->id) selected @endif>
                                {{$categoryOption->title}}
                            </option>
                         @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea name="description" id="description" class="form-control">{{old('description',$blogCategory->description)}}</textarea>
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
