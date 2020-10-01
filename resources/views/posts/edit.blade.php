    <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Edit note</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit tasks</h1>
            <form action="/posts/{{$post['id']}}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="text" class="form-control" name="title" value="<?=$post['title']?>" autocomplete="off">
                </div>
                <div class="form-group">
                    <textarea name="bodytext" class="form-control"><?=$post['bodytext']?></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-warning" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
