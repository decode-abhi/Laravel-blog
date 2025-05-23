<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f2f2f2; margin: 0; padding: 0; } 
        .container-heading{max-width: 600px; margin: 20px auto; background-color: #fff; padding: 2px 40px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); border-radius: 12px;font-size:24px;text-transform:uppercase;font-weight:500;}
        .form-container { max-width: 600px; margin: 80px auto; background-color: #fff; padding: 30px 40px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); border-radius: 12px; }
        form { display: flex; flex-direction: column; gap: 20px; }
        input[type="text"], textarea { padding: 12px; font-size: 16px; border: 1px solid #ccc; border-radius: 6px; resize: vertical; } input[type="text"]:focus, textarea:focus { border-color: #007bff; outline: none; } 
        button[type="submit"] { background-color: #007bff; color: white; padding: 12px; border: none; border-radius: 6px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease; }
        button[type="submit"]:hover { background-color: #0056b3; } 
      </style>
</head>
<body>
    
    <div class="container-heading">
        <h3>create post</h3>
    </div>
    <div class="form-container">
    @include('message')
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" id="title" placeholder="enter your title for post" value="{{old('title')}}">
            <textarea name="body" id="body" cols="30" rows="30" placeholder="enter the content">{{old('body')}}</textarea>
            <select name="category" id="">
                <option value="1">Select Category</option>
                @foreach($cat as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <input type="file" name="post_image" id="post_image">
            <button type="submit">Save Post</button>
        </form>
    </div>
</body>
</html>
