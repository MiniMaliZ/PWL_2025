<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        h1 {
            color: #333;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Sales of Products</h1>
    <h1>Name Products: {{ $name }}</h1>
    <h1>Price: {{ $price }}</h1>
    <h1>Amount: {{ $amount }}</h1>
    <h1>Total: {{ $total }}</h1>
    <h1>Pay: {{ $pay }}</h1>
    <h1>Change: {{ $change }}</h1>
</body>
</html>