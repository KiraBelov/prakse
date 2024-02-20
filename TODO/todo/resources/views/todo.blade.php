<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
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
            text-align: center; /* Центрируем содержимое по горизонтали */
        }
        h1 {
            font-size: 4rem;
        }
        p {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        button, input {
            padding: 20px 30px;
            border: 3px solid #fff;
            border-radius: 15px;
            background-color: #444;
            color: #fff;
            box-sizing: border-box;
            font-size: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 4rem; /* Расстояние между элементами */
            vertical-align: middle; /* Выравниваем по вертикали */
        }
        button:hover {
            background-color: #007bff;
        }
        /* Стили для полей ввода */
        input {
            padding: 15px 30px;
            border-radius: 10px;
            font-size: 16px;
            margin-top: 0; /* Убираем верхний отступ */
        }
        /* Стили для таблицы */
        table {
            margin: 0 auto; /* Центрируем таблицу по горизонтали */
            border-collapse: collapse; /* Убираем промежутки между ячейками */
            margin-top: 20px; /* Добавляем немного отступа сверху */
            display: none; /* Скрываем таблицу по умолчанию */
        }
        th, td {
            border: 1px solid #fff; /* Рамка для ячеек */
            padding: 10px; /* Отступы внутри ячеек */
        }
    </style>
</head>
<body>
    <h1>ToDo List App</h1>
    <p>Create a new to-do list:</p>
    <button onclick="confirmNewTodo()" id="createTodoButton">Create a new ToDo</button>

    <div id="todoForm" style="display: none;"> <!-- Обертка для полей ввода и кнопки -->
        <input type="text" id="todoInput" placeholder="Enter ToDo description">
        <button onclick="addTodo()">Add ToDo</button>
    </div>

    <table id="todoTable">
        <thead>
            <tr>
                <th>Description</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <!-- Сюда будут добавляться строки с ToDo задачами -->
        </tbody>
    </table>

    <script>
        function confirmNewTodo() {
            var createTodoButton = document.getElementById('createTodoButton');
            createTodoButton.style.display = 'none'; // Скрыть кнопку "Create a new ToDo"
            document.getElementById('todoForm').style.display = 'block'; // Показать форму для ввода ToDo
        }

        function addTodo() {
            var todoInput = document.getElementById('todoInput');
            var todoDescription = todoInput.value.trim();
            if (todoDescription !== '') {
                addTodoToTable(todoDescription);
                todoInput.value = ''; // Очистить поле ввода
            }
        }

        function addTodoToTable(description) {
            var todoTable = document.getElementById('todoTable').getElementsByTagName('tbody')[0];
            var row = todoTable.insertRow();
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            cell1.textContent = description;
            cell2.innerHTML = '<button>Delete</button>';
            cell3.innerHTML = '<button>Edit</button>';
            document.getElementById('todoTable').style.display = 'table'; // Показать таблицу
        }
    </script>
</body>
</html>

