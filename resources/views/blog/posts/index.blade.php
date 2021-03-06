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
            <h1>All tasks</h1>
            <a href="{{ route('blog.posts.create') }}" class="btn btn-success">Add tasks</a>
            <br><br>
            <table class="table">
                <thead>
                <tr style="text-align: center">
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($posts as $post):?>
                <tr>
                    <td align="center" width="5%">{{$post->id}}</td>
                    <td ><?=$post->title?></td>
                    <td class="d-flex justify-content-center align-items-center">
                        <a href="{{ route('blog.posts.show', $post->id) }}"><i class="far fa-eye p-0 mr-1"></i></a>
                        <a href="{{ route('blog.posts.edit', $post->id) }}"><i class="fas fa-pencil-alt p-0 mx-1"></i></a>
                        <form action="{{ route('blog.posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link p-0 ml-1" type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>

                </tr>
                <?php endforeach;?>
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
