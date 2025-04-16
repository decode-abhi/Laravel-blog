<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{

    public function testRazorpayAuth()
    {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        // Try fetching something simple like an order list
        try {
            $orders = $api->order->all(['count' => 1]);
            dd('Connection successful ✅', $orders);
        } catch (\Exception $e) {
            dd('❌ Razorpay error:', $e->getMessage());
        }
    }

    public function createPayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1'
        ]);

        $amountInPaise = intval($request->amount * 100); // convert to integer

        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
        $order = $api->order->create([
            'receipt' => 'order_' . rand(1000, 9999),
            'amount' => $amountInPaise,
            'currency' => 'INR',
            'payment_capture' => 1,
        ]);

        return view('payment.paymentPage', [
            'order_id' => $order->id,
            'amount' => $amountInPaise
        ]);
    }

    public function createStripePayment(Request $request){
        

        $request->validate([
            'amount' => 'required|numeric|min:1'
        ]);
        $amountInPaise = intval($request->amount * 100);
      
        Stripe::setApiKey(config('services.stripe.secret'));
        $intent = PaymentIntent::create([
            'amount' => $amountInPaise,
            'currency' => 'inr',
            'description' => 'Payment for Laravel Stripe Demo - Export',
            'shipping' => [
            'name' => $request->name,
            'address' => [
                'line1' => '123 Sample Street',
                'postal_code' => '110001',
                'city' => 'Delhi',
                'state' => 'Delhi',
                'country' => 'IN',
            ],
        ],
            'automatic_payment_methods' => ['enabled' => true], 
        ]);
    
        return response()->json([
            'clientSecret' => $intent->client_secret
        ]);
        
    }

}
