<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9;
        padding: 20px;
        color: #333;
    }

    h1 {
        text-align: center;
        color: #2c3e50;
    }

    a {
        display: inline-block;
        background-color: #3498db;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 8px;
        margin-bottom: 20px;
        transition: background-color 0.3s ease;
    }

    a:hover {
        background-color: #2980b9;
    }

    .post-container {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    .post-container h3 {
        font-size: 20px;
        margin: 0 0 10px;
        color: #34495e;
    }

    .post-container h2 {
        display: inline;
        font-size: 18px;
        margin-right: 10px;
        color: #7f8c8d;
    }

    .post-container p {
        font-size: 16px;
        line-height: 1.6;
    }

    hr {
        border: none;
        border-top: 1px solid #e1e1e1;
    }
    .edit{
        background:green;
    }
    .delete{
        background:red;
    }
    .list-footer{
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        padding: 5px;
        margin-bottom: 20px;
    }
    .post-header span {
    width: 400px;
    display: block;
    float: right;
}
    .post-header img {
    width: 200px;
    float: right;
}
.title{
    color:#000;
    text-transform:uppercase;
    font-size:18px;
    font-weight:700;
    margin-top:20px;
}
</style>

</head>
<body>
    
        <h1>Post list</h1>
        <a href="{{route('post.create')}}">Create New Post</a>
        @include('message')
        @foreach($post as $postItem)
            <div class="post-container">
                <div class="post-header">
                            <h2>({{ $postItem->id }}) 
                    @if($postItem->category_id && $postItem->category_id != null)
                        {{ $postItem->category->name ? $postItem->category->name : '' }}
                    @else
                        category not avilable
                    @endif

                        </h2>
                         <h4 class="title">   {{ $postItem->title }} </h4>
                            <span>
                                @if($postItem->image_path && $postItem->image_path != null)
                                    <img src="{{asset('/storage/'.$postItem->image_path)}}" alt="">
                                @else
                                <img src="https://exotique.com.mt/wp-content/uploads/woocommerce-placeholder.png" alt="">
                                @endif
                            </span>
                </div>
                <p>{{ $postItem->body }}</p>
                <div class="btn-container">
                <a href="{{route('post.edit',$postItem->id)}}" class="edit">Edit Post</a>
                <a href="{{route('post.destroy',$postItem->id)}}"class="delete" >Delete Post</a>
                </div>
               <div class="comment">
                @if($postItem->comments->count())
                    <h4>comments:</h4>
                        @foreach($postItem->comments as $in => $comment)
                            <ol>
                                <li>{{$in}}<b>{{$comment->commenter_name }}</b></li>
                            </ol>
                            <ul>
                                <li>{{$comment->comment}}</li>
                            </ul>
                        @endforeach
                @endif
               </div>
            </div>
            <hr>
        @endforeach
        <div class="d-flex justify-content-center mt-4">
        {{ $post->links('pagination::bootstrap-5') }}
    </div>
</body>
</html>