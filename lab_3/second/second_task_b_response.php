<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>Task №2.b (response)</title>
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

        div * {
            margin-top: 15px;
            min-width: 270px;
            max-width: 270px;
        }

        p {
            margin: 10px auto;
            width: 270px;
            text-align: start;
            color: #3b4d34;
        }
    </style>
</head>
<body>
<div>
    <?php

    $_SESSION['surName'] = !empty($_POST['surName']) ? $_POST['surName'] : '';
    $_SESSION['name'] = !empty($_POST['name']) ? $_POST['name'] : '';
    $_SESSION['age'] = !empty($_POST['age']) ? $_POST['age'] : '';
    ?>
    <p>Ваша фамилия: <?= $_SESSION['surName'] ?></p>
    <p>Ваше имя: <?= $_SESSION['name'] ?></p>
    <p>Ваш возраст: <?= $_SESSION['age'] ?></p>
</div>
</body>