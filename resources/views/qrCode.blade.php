<!DOCTYPE html>
<html>
<head>
    <title>How to Generate QR Code in Laravel 6? - sabaytraining.com</title>
</head>
<body>

<div class="visible-print text-center">
    <h1>Laravel 6 - QR Code Generator Example</h1>

    {!! QrCode::size(250)->generate('sabaytraining.com'); !!}

    <p>example by sabaytraining.com.</p>
</div>

</body>
</html>
