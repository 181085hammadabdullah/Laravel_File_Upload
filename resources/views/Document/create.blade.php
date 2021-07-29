<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload</title>
</head>
<body>
    <form action="/files" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="title">
        <input type="text" name="description" placeholder="description">
        <input type="file" name="file">
        <input type="submit" value="Submit">
    </form>
</body>
</html>