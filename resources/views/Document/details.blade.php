<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show File</title>
</head>
<body>
    <h2>{{ $data->title }}</h2>
    <h3>{{ $data->description }}</h3>
    <p>
        <iframe src="{{ url('/storage/cover_images/'.$data->file) }}" frameborder="4" style="width: 400px;height:200px"></iframe>
    </p>
</body>
</html>