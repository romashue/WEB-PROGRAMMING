<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Task №2.a</title>
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
            /*height: 400px;*/
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

        textarea {
            background: #3b4d34;
            color: #152011;

            margin: 0;
            min-width: 264px;
            max-width: 264px;
            min-height: 250px;
            max-height: 250px;
            border-radius: 7px;
        }

        textarea::placeholder {
            color: #1C2918;

        }

        input[type=submit] {
            background: #3b4d34;
            color: #152011;
            border-radius: 7px;
            margin-bottom: 15px;
        }

        p {
            width: 270px;
            margin: 10px auto;
            text-align: justify;
            color: #3b4d34;
        }
    </style>
</head>
<body>
<div>
    <form method="post">
        <label>
            <textarea name="inputText" placeholder="Введите любой текст!"></textarea>
        </label>
        <input type="submit">
    </form>
    <?php
    $inputText = !empty($_POST['inputText']) ? $_POST['inputText'] : '';
    $regExp = '/[a-z0-9а-яё.]+/ui';
    $matches = array();
    $count = preg_match_all($regExp, $inputText, $matches);

    ?>
    <p>
        Слов в тексте: <?= $count ?>
    </p>
    <p>
        Длина текста: <?= mb_strlen($inputText) ?>
    </p>
</div>
</body>
</html>