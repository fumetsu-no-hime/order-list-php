<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>頁面跳轉中</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh; background-color: rgb(90, 90, 90); color: white;">
        <h1>頁面跳轉中，請稍後</h1>
        <form action="https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5" method="POST" class="d-none"
            id="ecpay">
            <input type="hidden" name="MerchantID" value="{{ $data->MerchantID }}">
            <input type="hidden" name="MerchantTradeNo" value="{{ $data->MerchantTradeNo }}">
            <input type="hidden" name="MerchantTradeDate" value="{{ $data->MerchantTradeDate }}">
            <input type="hidden" name="PaymentType" value="{{ $data->PaymentType }}">
            <input type="hidden" name="TotalAmount" value="{{ $data->TotalAmount }}">
            <input type="hidden" name="TradeDesc" value="{{ $data->TradeDesc }}">
            <input type="hidden" name="ItemName" value="{{ $data->ItemName }}">
            <input type="hidden" name="ReturnURL" value="{{ $data->ReturnURL }}">
            <input type="hidden" name="ChoosePayment" value="{{ $data->ChoosePayment }}">
            <input type="hidden" name="CheckMacValue" value="{{ $data->CheckMacValue }}">
            <input type="hidden" name="EncryptType" value="{{ $data->EncryptType }}">
            <input type="hidden" name="ClientBackURL" value="{{ $data->ClientBackURL }}">
            <input type="hidden" name="IgnorePayment" value="{{ $data->IgnorePayment }}">
        </form>
    </div>

    <script>
        const form = document.querySelector('#ecpay');
        form.submit();
    </script>
</body>

</html>
