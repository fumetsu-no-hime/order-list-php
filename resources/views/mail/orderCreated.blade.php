<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .test {
            display: flex;
            justify-content: space-between;

        }
    </style>
</head>

<body>
    <h1>您好,{{ $myData['name'] }}</h1>
    <p>您已成立訂單,訂單編號為{{ $myData['order_id'] }}</p>
    <p>總金額: {{ $myData['subtotal'] }}</p>
    <div class="test">
        <p style="margin-right:auto">謝謝惠顧</p>
        <p>洪雋亞敬上</p>
    </div>

</body>

</html>
