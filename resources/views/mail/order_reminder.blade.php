<!DOCTYPE html>
<html>
<head>
    <title>Order Ready to Deliver</title>
</head>
<body>
    <h1>Hello, {{ $name }}</h1>
    <p>Your order totaling ${{ number_format($total, 2) }} is ready to be delivered soon.</p>
    <p>Thank you for shopping with us!</p>
</body>
</html>
