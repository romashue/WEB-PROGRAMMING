<?php session_start(); ?>
<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>Task №2.c</title>
    <style>
        @font-face {
            font-family: "googleSans";
            src: url("../font/GoogleSans-Regular.ttf") format("ttf");
        }

        * {
            font-family: "googleSans", sans-serif;
            font-size: 23px;
        }

        html {
            background: #1C2918;
        }

        body div {
            width: 300px;
            background: #152011;
            border-radius: 15px;
            display: flex;
            flex-wrap: nowrap;
            justify-content: flex-start;
            align-items: center;
            flex-direction: column;
        }

        body {
            margin-top: 75px;
            background: #1C2918;
            display: flex;
            flex-wrap: nowrap;
            flex-direction: row;
            align-content: center;
            justify-content: center;
            align-items: center;
        }

        form {
            width: 300px;
            display: flex;
            flex-wrap: nowrap;
            justify-content: flex-start;
            align-items: center;
            flex-direction: column;
        }

        form * {
            margin-top: 15px;
            max-width: 270px;
        }

        label {
            width: 270px;
        }
        input[type=text] {
            margin-top: 5px;
            background: #3b4d34;
            color: #152011;
            border-radius: 7px;
        }

        input[type=text]::placeholder {
            margin-top: 0;
            width: 264px;
            color: #1C2918;
        }

        input[type=submit] {
            background: #3b4d34;
            color: #152011;
            border-radius: 7px;
            margin-bottom: 15px;
        }

        label {
            width: 270px;
            text-align: start;
            color: #3b4d34;
        }
    </style>
</head>
<body>
<div>
    <form action="second_task_c_response.php" method="post">
        <label>
            Введите Ваше имя:
            <input name="name" type="text" placeholder="Имя">
        </label>
        <label>
            Введите Ваш возраст:
            <input name="age" type="text" placeholder="Возраст">
        </label>
        <label>
            Введите Вашу зарплату:
            <input name="salary" type="text" placeholder="Зарплата">
        </label>
        <label>
            Еще что-нибудь?
            <br>
            <label>
                <input name="other" value="true" type="radio">
                Да
            </label>
            <label>
                <input name="other" value="false" type="radio">
                Нет
            </label>
        </label>
        <input type="submit">
    </form>
</div>
</body>