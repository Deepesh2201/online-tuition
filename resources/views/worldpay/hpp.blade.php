<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorldPay Payment</title>
</head>
<body>
    <form action="{{route('worldpay.payment')}}" method="post">
        @csrf
        <!-- Mandatory Fields -->
        <input type="text" name="orderid" value="" placeholder="enter orderid">
        <input type="" name="amount" value="" placeholder="enter amount">
        <input type="" name="currency" value="GBP" readonly disabled placeholder="enter currency">
        <input type="text" name="purpose" placeholder="enter purpose">

        <button type="submit">Pay Now</button>
    </form>
</body>
</html>
