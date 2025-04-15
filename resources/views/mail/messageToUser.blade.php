<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>{{$sentSubject}}</h3>
    <ul>
        <li>Name : {{$sentDetails['name']}}</li>
        <li>Age : {{$sentDetails['age']}}</li>
        <li>Number : {{$sentDetails['number']}}</li>
        <li>Education : {{$sentDetails['education']}}</li>
        <li>Role : {{$sentDetails['role']}}</li>
    </ul>
    <p> {{$sentMessage}} </p>
</body>
</html>