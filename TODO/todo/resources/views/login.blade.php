<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Подключение шрифта -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <!-- Подключение Vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <style>
        /* Стили для темной темы */
        body {
            background-color: #333;
            color: #fff;
            font-family: 'Russo One', sans-serif; /* Используем шрифт Russo One */
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            font-size: 2rem;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"],
        .emailButton {
            width: 100%;
            padding: 20px; /* Увеличиваем высоту кнопки */
            margin-bottom: 10px;
            border: 3px solid #fff;
            border-radius: 15px;
            background-color: #444;
            color: #fff;
            box-sizing: border-box;
            font-size: 20px;
        }
        .emailButton {
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        .emailButton:hover {
            background-color: #0056b3;
        }
        button {
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s ease;
            padding: 25px 30px; /* Увеличиваем высоту и ширину кнопки */
            font-size: 24px; /* Увеличиваем размер текста кнопки */
        }
        button:hover {
            background-color: #0056b3;
        }
        .register {
            margin-top: 10px;
            font-size: 30px;
        }
        .register a {
            color: #007bff;
            text-decoration: none;
        }
        .register a:hover {
            text-decoration: underline;
        }
        h1 {
            text-align: center;
            font-size: 4rem;
        }
    </style>
</head>
<body>
    <div id="app">
        <h1>Login</h1>
        
        <form action="{{ route('login') }}" method="POST">
            @csrf <!-- Добавляем CSRF-токен для защиты формы -->
            @if(Session::has('error'))
            <div class="alert alert-danger bg-red-100 px-4 py-3 rounded-xl mb-4" role="alert">{{Session::get('error')}}</div>
            @endif
            <label for="name">Email:</label>
            <input type="email" name="epasts" id="email" v-model="formData.name" class="emailButton" required>
            <label for="password">Password:</label>
            <input type="password" name="parole" id="password" v-model="formData.password" required>
            <button type="submit">Login</button> <!-- Добавляем тип кнопки "submit" -->
            <div class="register">
                Not a user? <a href="{{ route('register') }}">Register</a>
            </div>
        </form>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: {
                formData: {
                    name: '',
                    password: ''
                }
            },
            methods: {
                login() {
                    // Здесь можно добавить логику для отправки данных формы на сервер
                    console.log('Login data:', this.formData);
                    // Для примера, отправим данные в консоль
                }
            }
        });
    </script>
</body>
</html>

     
