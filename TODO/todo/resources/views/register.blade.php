<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
        input[type="email"],
        input[type="password"],
        button {
            width: 100%;
            padding: 20px;
            margin-bottom: 10px;
            border: 3px solid #fff;
            border-radius: 15px;
            background-color: #444;
            color: #fff;
            box-sizing: border-box;
            font-size: 25px;
        }
        button {
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        h1 {
            text-align: center;
            font-size: 4rem;
        }
    </style>
</head>
<body>
    <div id="app">
        <h1>Registration</h1>
        <form @submit.prevent="register">
            <label for="name">Name:</label>
            <input type="text" id="name" v-model="formData.name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" v-model="formData.email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" v-model="formData.password" required>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" v-model="formData.password_confirmation" required>
            <button type="submit">Register</button>
        </form>
    </div>

    <script>
        // Инициализация Vue.js
        new Vue({
            el: '#app',
            data: {
                formData: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                }
            },
            methods: {
                register() {
                    // Здесь можно добавить логику для отправки данных формы на сервер
                    console.log('Registration data:', this.formData);
                    // Для примера, отправим данные в консоль
                }
            }
        });
    </script>
</body>
</html>
