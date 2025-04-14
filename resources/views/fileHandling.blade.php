<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>file handling</h1>
    <form action="{{route('files.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="file" name="file_hand" id="">
        <p>{{isset($path)}}</p>
        <img src="{{asset('storage/uploads/5pwFBvcEodcREztiVAf5hS3r4u9OvyqtZFFBVtV7.jpg')}}" alt="" width="300px">
        <button type="submit">submit</button>
    </form>
</body>
</html>