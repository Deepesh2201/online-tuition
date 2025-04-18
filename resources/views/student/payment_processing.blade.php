@extends('student.layouts.main')

@section('main-section')

<style>
    .status-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        text-align: center;
        padding: 30px;
    }

    .message {
        font-size: 2rem;
        font-weight: bold;
        color: #2ecc71;
    }

    .error {
        color: #e74c3c;
    }

    .countdown {
        margin-top: 15px;
        font-size: 1.2rem;
        color: #555;
    }

    .invoice-container {
        width: 80%;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
    }

    .invoice-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .invoice-header h2 {
        font-size: 2rem;
    }

    .invoice-details {
        margin: 20px 0;
        font-size: 1.2rem;
    }

    .invoice-details th, .invoice-details td {
        padding: 8px;
        text-align: left;
    }

    .invoice-details {
        width: 100%;
        border-collapse: collapse;
    }

    .invoice-details th {
        background-color: #2ecc71;
        color: white;
    }

    .invoice-details td {
        background-color: #f9f9f9;
    }

    .print-button {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .print-button:hover {
        background-color: #2980b9;
    }
</style>

<div class="status-container">
    @if ($order_status)
        <div class="message">✅ Payment Successful!</div>

        <!-- Invoice Section -->
        <div class="invoice-container" id="invoice">
            <div class="invoice-header">
                <h2>Invoice</h2>
                <p>Transaction ID: {{ $orderid }}</p>
            </div>
            <table class="invoice-details">
                <tr>
                    <th>Amount</th>
                    <td>{{ $currency }} {{ number_format($amount, 2) }}</td>
                </tr>
                <tr>
                    <th>Payment Method</th>
                    <td>{{ $payment_method }}</td>
                </tr>
                <tr>
                    <th>Payment Status</th>
                    <td>{{ $order_status }}</td>
                </tr>
            </table>
            <button class="print-button" onclick="window.print()">Print Invoice</button>
        </div>
    @else
        <div class="message error">❌ Payment Failed!</div>
        <div class="countdown">Please try again or contact support.</div>
    @endif
</div>

@endsection
