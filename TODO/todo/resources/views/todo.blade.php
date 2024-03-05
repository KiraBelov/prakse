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
    <!-- Подключение Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        .buttons a {
            display: inline-block;
            padding: 20px 30px;
            border: 3px solid #fff;
            border-radius: 15px;
            background-color: #444;
            color: #fff;
            box-sizing: border-box;
            font-size: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none; /* Убираем подчеркивание у ссылки */
            margin-right: 4rem; /* Расстояние между элементами */
            vertical-align: middle; /* Выравниваем по вертикали */
        }
        .buttons a:hover {
            background-color: #007bff;
        }
        /* Стили для модального окна */
        #confirmationDialog {
            display: none; /* По умолчанию скрыто */
            position: fixed; /* Фиксируем позицию */
            top: 50%; /* Размещаем по центру вертикально */
            left: 50%; /* Размещаем по центру горизонтально */
            transform: translate(-50%, -50%); /* Центрируем по обоим осям */
            background-color: rgba(0, 0, 0, 0.5); /* Черный полупрозрачный фон */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Тень */
            z-index: 999; /* Поверх других элементов */
        }

        #confirmationDialog h2 {
            color: #fff;
            margin-bottom: 20px;
        }

        #confirmationDialog button {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        #confirmationDialog button.yes {
            background-color: #28a745; /* Зеленый цвет */
            color: #fff;
        }

        #confirmationDialog button.no {
            background-color: #dc3545; /* Красный цвет */
            color: #fff;
        }

        /* Стили для полей ввода */
        #groupInput {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 5px;
            font-size: 16px;
        }

       /* Стили для таблицы */
    #todoTable {
        display: none; /* Изначально скрываем таблицу */
        margin-top: 50px;
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }
        #todoTable td {
            padding: 10px;
            border: 1px solid #fff;
        }
    </style>
</head>
<body>
    <h1>ToDo List App</h1>
    <p>Create a new to-do list:</p>
    <div class="buttons">
        <a href="{{ route('createTodo') }}">Create Todo</a>
        <a href="#" onclick="showConfirmationDialog()">Create Group</a> <!-- Новая кнопка -->
    </div>

    <!-- Модальное окно подтверждения -->
    <div id="confirmationDialog">
        <h2>Do you want to create ToDo Group?</h2>
        <button class="yes" onclick="showGroupInput()">Yes</button>
        <button class="no" onclick="hideConfirmationDialog()">No</button>
    </div>

    <!-- Таблица ToDo -->
    <table id="todoTable">
        <tr>
            <td id="groupName">Group Name</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td><button onclick="addTodo()">Add Todo</button></td>
        </tr>
        <tr>
            <td><button onclick="deleteGroup()">Delete Group</button></td>
        </tr>
    </table>

    <script>
        function showConfirmationDialog() {
            document.getElementById('confirmationDialog').style.display = 'block';
        }

        function hideConfirmationDialog() {
            document.getElementById('confirmationDialog').style.display = 'none';
        }

        function showGroupInput() {
            // Скрываем кнопки "Yes" и "No"
            document.querySelector('#confirmationDialog button.yes').style.display = 'none';
            document.querySelector('#confirmationDialog button.no').style.display = 'none';

            // Добавляем поле ввода для имени группы
            const groupInput = document.createElement('input');
            groupInput.setAttribute('type', 'text');
            groupInput.setAttribute('id', 'groupInput');
            groupInput.setAttribute('placeholder', 'Enter group name...');
            document.getElementById('confirmationDialog').appendChild(groupInput);

            // Добавляем кнопку "Create"
            const createButton = document.createElement('button');
            createButton.textContent = 'Create';
            createButton.setAttribute('class', 'yes');
            createButton.setAttribute('onclick', 'createGroup()');
            document.getElementById('confirmationDialog').appendChild(createButton);
        }

        function createGroup() {
            // Получаем имя группы
            const groupName = document.getElementById('groupInput').value;
            
            // Заполняем ячейку с названием группы
            document.getElementById('groupName').textContent = groupName;
            
            // Закрываем модальное окно
            hideConfirmationDialog();
        }

        function addTodo() {
            // Здесь вы можете добавить новую задачу в список ToDo
            alert('Adding Todo...');
        }

        function deleteGroup() {
            // Здесь вы можете удалить группу ToDo
            alert('Deleting Group...');
        }
    </script>
</body>
</html>

