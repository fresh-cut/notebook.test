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
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('blog.admin.categories.index') }}">Категории</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="#2">2</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="#3">3</a></li>
            </ul>
        </div>
        <div class="col-9">
            <h1>Create category</h1>
            @php
                /** @var \Illuminate\Support\ViewErrorBag $errors */
            @endphp
            @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{$errors->first()}}
                    </div>
            @endif
            @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{session('success')}}
                    </div>
            @endif


            <form action="{{ route('blog.admin.posts.store') }}" method="post">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="title">Заголовок</label>
                        <input type="text" class="form-control" id="title" name="title" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="slug">Идентификатор</label>
                        <input type="text" class="form-control" id="slug" name="slug" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="parent_id">Родитель</label>
                    <select name="parent_id" id="parent_id" class="form-control" required>
                        @foreach($categoryList as $categoryOption)
                            <option value="{{$categoryOption->id}}">
                                {{$categoryOption->id_title}}
                            </option>
                         @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea name="description" id="description" class="form-control">{{old('description',' ')}}</textarea>
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
