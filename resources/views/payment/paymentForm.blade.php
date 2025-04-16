<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Payment Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="pay-header p-1 mb-5 border rounded shadow-sm bg-light">
        <h2 class="text-center mb-4">Make a Payment</h2>
    </div>
    <div class="container p-4 border rounded shadow-sm bg-light">
        <form action="{{route('payment.razorpay')}}" method="POST">
            <!-- For Laravel, add CSRF token -->
             @csrf

            <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
            </div>

            <div class="mb-3">
            <label for="amount" class="form-label">Amount (in INR)</label>
            <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" required>
            </div>

            <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-lg">Pay Now</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
