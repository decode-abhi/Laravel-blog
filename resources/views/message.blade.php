<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container-heading{max-width: 600px; margin: 20px auto; background-color: #fff; padding: 2px 40px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); border-radius: 12px;font-size:24px;text-transform:uppercase;font-weight:500;}
        .alert {
    max-width: 250px;
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    font-size: 16px;
    font-weight: 500;
    position: relative;
    animation: fadeIn 0.5s ease-in-out;
}

.success-alert {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.error-alert {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.alert ul {
    margin: 0;
    padding-left: 20px;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

    </style>
</head>
<body>
@if(session('success'))
    <div class="alert success-alert">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert error-alert">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div class="alert error-alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</body>
</html>