<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorldPay Payment</title>
</head>
<body>
    <form action="https://secure.worldpay.com/wcc/purchase" method="post">
        <!-- Mandatory Fields -->
        <input type="" name="instId" value="{{ env('WORLDPAY_INSTALLATION_ID') }}">
        {{-- <input type="hidden" name="cartId" value="{{ $order->id }}"> --}}
        <input type="" name="cartId" value="1">
        <input type="" name="amount" value="101">
        <input type="" name="currency" value="GBP">
        <input type="" name="desc" value="Order Payment for 1">

        <!-- Optional Fields -->
        <input type="" name="testMode" value="{{ env('WORLDPAY_TEST_MODE') ? '100' : '0' }}">
        <input type="" name="MC_callback" value="{{ route('worldpay.callback') }}">

        <!-- Submit Button -->
        <button type="submit">Pay Now</button>
    </form>
</body>
</html>
