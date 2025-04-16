<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h5>Processing...</h5>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "{{ config('services.razorpay.key') }}",
            "amount": {{ $amount }}, 
            "currency": "INR",
            "name": "My Laravel App",
            "description": "Test Payment",
            "order_id": "{{ $order_id }}",
            "handler": function (response) {
                alert("Payment successful: " + response.razorpay_payment_id);
                window.location.href = "{{ route('payment.thankyou') }}";  // Fixed the route call
            },
            "theme": {
                "color": "#528FF0"
            }
        };
    
        var rzp1 = new Razorpay(options);
        rzp1.open();
    </script>
    

</body>
</html>