<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
</head>
<body>
    <table border="1">
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Description</th>
        <th>View</th>
        <th>Download</th>
        @foreach ($file as $key=>$data)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $data->title }}</td>
            <td>{{ $data->description }}</td>
            <td><a href="/files/{{ $data->id }}">View</a></td>
            <td><a href="/file/download/{{ $data->file }}">Download</a></td>
        </tr>
        @endforeach
    </table>
   
</body>
</html>