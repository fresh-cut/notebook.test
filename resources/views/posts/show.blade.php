    <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Show note</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{$post['title']}}</h1>
            <p>
                {{$post['bodytext']}}
            </p>
            <a href="/posts">Go to back</a>
        </div>
    </div>
</div>
</body>
</html>
