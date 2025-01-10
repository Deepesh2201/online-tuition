<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorldPayController extends Controller
{
    public function showPaymentPage($orderId)
    {
        // $order = Order::findOrFail($orderId); // Replace with your order model
        $order = $orderId;
        return view('worldpay.hpp', compact('order'));
    }

    public function handleCallback(Request $request)
    {
        // Validate and process the callback data
        $status = $request->input('transStatus'); // Get the transaction status
        $orderId = $request->input('cartId');

        if ($status === 'Y') {
            // Payment successful
            $order = Order::findOrFail($orderId);
            $order->update(['status' => 'paid']);
            return redirect()->route('payment.success');
        } elseif ($status === 'C') {
            // Payment cancelled
            return redirect()->route('payment.cancel');
        } else {
            // Payment failed
            return redirect()->route('payment.failed');
        }
    }
}
