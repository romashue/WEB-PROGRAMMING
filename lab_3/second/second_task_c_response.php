<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>Task №2.c (response)</title>
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

        div ul {
            margin: 10px auto;
        }

        div * {
            /*margin-top: 15px;*/
            min-width: 270px;
            max-width: 270px;
        }


        p {
            margin: 10px auto;
            width: 270px;
            text-align: start;
            color: #3b4d34;
        }

        li {
            color: #3b4d34;
        }
    </style>
</head>
<body>
<div>
    <?php
    $_SESSION['inputData'] = array();
    $_SESSION['inputData'][] = !empty($_POST['name']) ? $_POST['name'] : '';
    $_SESSION['inputData'][] = !empty($_POST['age']) ? $_POST['age'] : '';
    $_SESSION['inputData'][] = !empty($_POST['salary']) ? $_POST['salary'] : '';
    $_SESSION['inputData'][] = !empty($_POST['other']) && $_POST['other'] == 'true' ? 'Ещё что-нибудь' : 'Не ещё что-нибудь';

    echo '<ul>';
    foreach ($_SESSION['inputData'] as $value) {
        echo '<li>' . $value . '</li>';
    }
    echo '</ul>';
    ?>

</div>
</body>