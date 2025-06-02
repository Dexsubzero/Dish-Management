<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Hi {{ $username }},</h1>

    <p>Thank you for your order!</p>

    <p>Your order has been confirmed and is being processed.
        Please prepare the amount of <strong>₱{{ number_format($total, 2) }}</strong>.
    </p>

    <p>We’ll notify you when it’s on the way.</p>

    <br>
    <p>Best regards,</p>
    <p>Faresync</p>
</body>
</html>
