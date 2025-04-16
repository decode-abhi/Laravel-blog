<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

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

}
