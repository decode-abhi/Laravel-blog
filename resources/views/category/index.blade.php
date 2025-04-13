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
</style>

</head>
<body>
    <h1>All Categories</h1>
    <div class="category-container">
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->name}}</td>
                    <td>edit</td>
                    <td>delete</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>