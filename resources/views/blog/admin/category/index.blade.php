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
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="#1">Posts</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="#2">2</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="#3">Users</a></li>
            </ul>
        </div>
        <div class="col-9">
            <h1>All categories</h1>
            <br><br>
            <table class="table">
                <thead>
                <tr style="text-align: center">
                    <th>#</th>
                    <th>Категория</th>
                    <th>Родитель</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($categories as $categorie):?>
                <tr>

                   <td align="center">{{$categorie->id}}</td>
                   <td align="center">{{$categorie['title']}}</td>
                   <td align="center">{{$categorie['parent_id']}}</td>
                </tr>
                <?php endforeach;?>
                <tr>
                    <td>{{$categories->links()}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script scr="asset('js/app.js')"></script>
</body>
</html>
