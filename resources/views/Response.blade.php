<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><b>Payment is Successful</b></p>
    <style>
        p{
            text-align: center;
            font-size: 28px;
            font-family: "Times New Roman", Times, serif;
        }
        </style>
        <div class="text-center">id:{{$id}}</div>
        <div class="text-center">order:{{$order}}</div>
        <div class="text-center">success:{{$success}}</div>
        <div class="text-center">pending:{{$pending}}</div>
        <div class="text-center">hmac:{{$hmac}}</div>
</body>
</html>