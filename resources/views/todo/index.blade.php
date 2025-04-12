<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table {
        width: 50%;
        border-collapse: collapse;
        margin: 20px auto;
        font-family: Arial, sans-serif;
    }
    th, td {
        padding: 10px;
        text-align: center;
    }
    th {
        background-color: #f0f0f0;
    }
</style>

</head>
<body>
    <table  border="1">
        <thead>
            <tr>
                <th>Task</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($task as $todo)
            <tr>
                <td>{{$todo['Title']}}</td>
                <td><input type="checkbox" name="status" id="status" {{$todo['Status'] == 1 ? 'checked' : ''}}>{{$todo['Status'] == 1 ? 'Done' : 'Incompleted'}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>