<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Подключение шрифта -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <style>
        /* Стили для темной темы */
        body {
            background-color: #333;
            color: #fff;
            font-family: 'Russo One', sans-serif; /* Используем шрифт Russo One */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center; /* Центрируем содержимое */
        }
        .content {
            border: 4px solid #fff;
            border-radius: 10px;
            padding: 40px;
            max-width: 600px;
            width: 100%;
            background-color: #272829;
            padding-left: 50px;
            padding-right: 50px;
        }
        h1 {
            font-size: 4rem;
        }
        p{
            font-size: 2rem;
        }
        .buttons {
            margin-top: 50px;
            padding-bottom: 40px;
        }
        .buttons a {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: 3px solid #fff;
            border-radius: 15px;
            padding: 20px 40px;
            font-size: 25px;
            margin: 10px;
            transition: background-color 0.3s ease;
        }
        .buttons a:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <div class="content">
        <h1>ToDo app</h1>
        <p>Welcome to our system!</p>
        <p>Please choose identification method</p>
        <div class="buttons">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
</body>
</html>
