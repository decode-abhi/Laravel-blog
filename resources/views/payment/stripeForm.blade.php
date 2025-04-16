<!DOCTYPE html>
<html>
<head>
    <title>Stripe Payment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Stripe Payment Gateway Integration</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('payment.stripe-payment') }}" method="POST" id="payment-form">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input class="form-control" name="email" type="email" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Amount (INR)</label>
            <input class="form-control" name="amount" type="number" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Card Details</label>
            <div id="card-element"></div>
            <div id="card-errors" role="alert" class="text-danger mt-2"></div>
        </div>

        <button class="btn btn-primary">Pay</button>
    </form>
</div>


<script src="https://js.stripe.com/v3/"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const stripe = Stripe("{{ config('services.stripe.key') }}");
        const elements = stripe.elements();
        const card = elements.create('card');
        card.mount('#card-element');
    
        const form = document.getElementById('payment-form');
    
        form.addEventListener('submit', async function (e) {
            e.preventDefault();
    
            const name = form.querySelector('input[name="name"]').value;
            const email = form.querySelector('input[name="email"]').value;
            const amount = form.querySelector('input[name="amount"]').value;
            const description = 'this is a deccription about the payment doorv';
    
            // Step 1: Create Payment Intent
            const res = await fetch("{{ route('payment.stripe-payment') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ amount: amount })
            });
    
            const data = await res.json();
            const clientSecret = data.clientSecret;
    
            // Step 2: Confirm Payment
            const result = await stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: {
                        name: name,
                        email: email,
                       
                    },
                }
            });
    
            if (result.error) {
                document.getElementById('card-errors').textContent = result.error.message;
            } else {
                if (result.paymentIntent.status === 'succeeded') {
                    alert("✅ Payment Successful!");
                    form.reset();
                }
            }
        });
    });
</script>
    

</body>
</html>
