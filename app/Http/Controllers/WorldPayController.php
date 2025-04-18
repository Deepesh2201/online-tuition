<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WorldPayController extends Controller
{
    public function showPaymentPage()
    {

        return view('worldpay.hpp');
    }

    public function initiatePayment(Request $request)
    {
        $username = 'XlHabGuPr1ge66w1'; // Replace with your Worldpay username
        $password = '0SoTaQx8yOET8F2aHjJ8CcbW5au7frpjeVnE0T1DJ1mv9kxEkDgyjV0Zh8uiixDH'; // Replace with your Worldpay password

        $response = Http::withBasicAuth($username, $password)
            ->withHeaders([
                'Content-Type' => 'application/vnd.worldpay.payment_pages-v1.hal+json',
                'Accept' => 'application/vnd.worldpay.payment_pages-v1.hal+json',
            ])
            ->post('https://try.access.worldpay.com/payment_pages', [
                'transactionReference' => 'Class_Purchased3',
                'merchant' => [
                    'entity' => 'PO4068001058',
                ],
                'narrative' => [
                    'line1' => 'Deepesh-001',
                ],
                'value' => [
                    'currency' => 'GBP',
                    'amount' => 100, // Replace with dynamic amount
                ],
                "resultURLs" => array(
                    "successURL" => "http://127.0.0.1:8000/student/studentpayments/?success",
                    "pendingURL" => "http://127.0.0.1:8000/student/studentpayments/?pending",
                    "failureURL" => "http://127.0.0.1:8000/student/studentpayments/?failure",
                    "errorURL"  =>   "http://127.0.0.1:8000/student/studentpayments/?error",
                    "cancelURL" =>  "http://127.0.0.1:8000/student/studentpayments/?cancel",
                    "expiryURL" =>  "http://127.0.0.1:8000/student/studentpayments/?expiry"
                  ),
                ]);

        if ($response->successful()) {
            $responseData = $response->json();
            $paymentUrl = $responseData['url'];
            return redirect()->away($paymentUrl); // Redirect the user to Worldpay payment page
        }

        return response()->json(['error' => 'Payment initiation failed'], 500);
    }
}
