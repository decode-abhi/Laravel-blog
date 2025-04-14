<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 40px;
        background-color: #f8f9fa;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #343a40;
    }

    .category-container {
        max-width: 800px;
        margin: auto;
        background: #ffffff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background-color: #343a40;
        color: white;
    }

    th, td {
        padding: 12px 15px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    td:last-child, td:nth-last-child(2) {
        color: #007bff;
        cursor: pointer;
        font-weight: bold;
    }

    td:last-child:hover, td:nth-last-child(2):hover {
        text-decoration: underline;
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
</style>

</head>
<body>
    <h1>All Users</h1>
        <a href="{{route('user.create')}}">Create New User</a>
        @include('message')
    <div class="category-container">
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Profile Picture</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        @if($user->profileImage && $user->profileImage != null)
                            <img src="{{asset('/storage/'.$user->profileImage)}}" alt="" width="150px">
                        @else
                            <img src="data:image/jpeg;base64,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" alt="" width="150px">
                        @endif

                    </td>
                    <td>edit</td>
                    <td>delete</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>