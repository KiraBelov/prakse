<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create ToDo List</title>
    <!-- Подключение шрифта -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
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
            width: 80%; /* Увеличиваем ширину таблицы */
        }
        th, td {
            border: 1px solid #fff; /* Рамка для ячеек */
            padding: 10px; /* Отступы внутри ячеек */
            text-align: center; /* Центрируем содержимое по горизонтали */
        }
        /* Стили для кнопок удаления и изменения */
        .deleteButton, .editButton {
            padding: 10px; /* Уменьшаем отступы */
            border-radius: 10px;
            font-size: 16px; /* Уменьшаем размер шрифта */
            cursor: pointer;
            transition: background-color 0.3s ease;
            vertical-align: middle; /* Выравниваем по вертикали */
            display: block; /* Делаем кнопки блочными элементами */
            margin: 0 auto; /* Центрируем кнопки по горизонтали */
        }
        .deleteButton {
            background-color: #ff0000; /* Красный цвет */
            border: 3px solid #ff0000; /* Красная рамка */
            color: #fff; /* Белый цвет текста */
            width: 80%; /* Увеличиваем ширину кнопки удаления */
        }
        .editButton {
            background-color: #ffff00; /* Желтый цвет */
            border: 3px solid #ffff00; /* Желтая рамка */
            color: #000; /* Черный цвет текста */
            width: 80%; /* Увеличиваем ширину кнопки изменения */
        }
        .deleteButton:hover {
            background-color: #cc0000; /* Темнокрасный при наведении */
            border-color: #cc0000; /* Темнокрасная рамка при наведении */
        }
        .editButton:hover {
            background-color: #cccc00; /* Темножелтый при наведении */
            border-color: #cccc00; /* Темножелтая рамка при наведении */
        }
        /* Стили для кнопки сохранить */
        #saveButton {
            display: none; /* По умолчанию скрыта */
            margin-top: 20px; /* Отступ сверху */
            position: fixed; /* Фиксируем позицию */
            left: 50%; /* Размещаем по центру горизонтально */
            transform: translateX(-50%); /* Смещаем влево на 50% от ширины кнопки */
            bottom: 20px; /* Отступ снизу */
        }

        /* Стили для всплывающего окна */
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
    </style>
</head>
<body>
    <h1>ToDo List App</h1>
    <p>Create a new to-do list:</p>
    <div id="todoForm"> <!-- Обертка для полей ввода и кнопки -->
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

    <!-- Кнопка "Сохранить" -->
    <button id="saveButton" onclick="showConfirmationDialog()">Save</button>

    <!-- Всплывающее окно подтверждения -->
    <div id="confirmationDialog">
        <h2>Do you want to save ToDo?</h2>
        <button class="yes" onclick="saveTodo()">Yes</button>
        <button class="no" onclick="hideConfirmationDialog()">No</button>
    </div>

    <script>
        function addTodo() {
            var todoInput = document.getElementById('todoInput');
            var todoDescription = todoInput.value.trim();
            if (todoDescription !== '') {
                addTodoToTable(todoDescription);
                todoInput.value = ''; // Очистить поле ввода
                toggleSaveButtonVisibility(); // Показать кнопку "Сохранить"
            }
        }

        function addTodoToTable(description) {
            var todoTable = document.getElementById('todoTable').getElementsByTagName('tbody')[0];
            var row = todoTable.insertRow();
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            cell1.textContent = description;
            cell2.innerHTML = '<button class="deleteButton" onclick="showDeleteConfirmation(this)"><i class="fas fa-trash"></i></button>'; // Иконка корзины
            cell3.innerHTML = '<button class="editButton" onclick="showEditConfirmation(this)"><i class="fas fa-edit"></i></button>'; // Иконка карандаша
            document.getElementById('todoTable').style.display = 'table'; // Показать таблицу
        }

        function toggleSaveButtonVisibility() {
            var saveButton = document.getElementById('saveButton');
            var todoTable = document.getElementById('todoTable');
            if (todoTable.getElementsByTagName('tr').length > 1) { // Если в таблице есть хотя бы одна запись
                saveButton.style.display = 'block'; // Показать кнопку "Сохранить"
            } else {
                saveButton.style.display = 'none'; // Скрыть кнопку "Сохранить"
            }
        }

        function showConfirmationDialog() {
            var dialog = document.getElementById('confirmationDialog');
            dialog.style.display = 'block'; // Показать всплывающее окно
        }

        function hideConfirmationDialog() {
            var dialog = document.getElementById('confirmationDialog');
            dialog.style.display = 'none'; // Скрыть всплывающее окно
        }

        function showDeleteConfirmation(button) {
            var dialog = document.getElementById('confirmationDialog');
            dialog.style.display = 'block'; // Показать всплывающее окно
            var yesButton = document.querySelector('#confirmationDialog button.yes');
            yesButton.onclick = function() {
                deleteTodo(button);
            };
        }

        function showEditConfirmation(button) {
            var dialog = document.getElementById('confirmationDialog');
            dialog.style.display = 'block'; // Показать всплывающее окно
            var yesButton = document.querySelector('#confirmationDialog button.yes');
            yesButton.onclick = function() {
                editTodo(button);
            };
        }

        function deleteTodo(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
            toggleSaveButtonVisibility(); // Проверить видимость кнопки "Сохранить"
            hideConfirmationDialog(); // Скрыть всплывающее окно
        }

        function editTodo(button) {
            var row = button.parentNode.parentNode;
            var newDescription = prompt('Enter new description:');
            if (newDescription !== null) {
                row.cells[0].textContent = newDescription;
                hideConfirmationDialog(); // Скрыть всплывающее окно
            }
        }

        function saveTodo() {
            // Действия по сохранению ToDo
            hideConfirmationDialog(); // Скрыть всплывающее окно
        }
    </script>
</body>
</html>
