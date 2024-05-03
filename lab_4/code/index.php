<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Lab №4</title>
    <style>
        @font-face {
            font-family: "googleSans";
            src: url("/font/GoogleSans-Regular.ttf") format("ttf");
        }

        * {
            font-family: "googleSans", sans-serif;
            font-size: 23px;
        }

        html {
            background: #1C2918;
        }

        body div {
            height: auto;
            width: 300px;
            background: #293c23;
            border-radius: 15px;
            display: flex;
            flex-wrap: nowrap;
            justify-content: flex-start;
            align-items: center;
            flex-direction: column;
        }

        div div {
            width: 600px;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-evenly;
            align-items: flex-start;
        }

        div div p {
            max-width: 200px;
            margin: 10px 10px;
            word-wrap: anywhere;
            text-align: center;
            min-height: 46px;
        }

        body {
            margin-top: 75px;
            background: #1C2918;
            display: flex;
            flex-wrap: nowrap;
            flex-direction: row;
            justify-content: space-evenly;
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
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            flex-wrap: nowrap;
        }

        textarea {
            background: #556c4c;
            color: #293c23;

            margin: 5px 0 0 0;
            min-width: 264px;
            max-width: 264px;
            min-height: 250px;
            max-height: 250px;
            border-radius: 7px;
        }

        textarea::placeholder, input::placeholder {
            color: #1C2918;
        }

        input[type=submit], input[type=email], input[type=text], select {
            background: #556c4c;
            color: #293c23;
            margin: 5px auto 0 auto;
            border-radius: 7px;
            /*margin-bottom: 15px;*/
        }


        input[type=text] {
            width: 264px;
        }

        select {
            width: 270px;
            margin-bottom: 0;
        }

        p, label {
            width: 270px;
            margin: 10px auto;
            text-align: start;
            color: #556c4c;
        }

        h3 {
            color: #556c4c;
        }
    </style>
</head>
<body>
<div>
    <form action="save.php" method="post">
        <label>
            Ваш email:
            <input name="email" required type="email" placeholder="example@web.edu">
        </label>
        <label>
            Категория:
            <select name="category" required>
                <option value="first">Первая категория</option>
                <option value="second">Вторая категория</option>
                <option value="other">Иное</option>
            </select>
        </label>
        <label>
            Заголовок:
            <input name="title" required type="text" placeholder="Абракадабра">
        </label>
        <label>
            Описание:
            <textarea name="description" placeholder="Много разных буковок"></textarea>
        </label>
        <label>
            <input type="submit">
        </label>
    </form>
</div>
<div style="width: 600px">
    <div>
        <h3>Категория</h3>
        <h3>Заголовок</h3>
        <h3>Описание</h3>
    </div>
    <?php

    require_once "vendor/autoload.php";

    use Google\Client;
    use Google\Service\Drive;
    use Google\Service\Sheets\SpreadSheet;

    $apiKey = "AIzaSyCi6n8XQUTmO2nQkLwQucYByK0OQsy8o3g";
    $clientId = "658150328571-ee9ed21shkuuqsqepse7piikm2fstgsn.apps.googleusercontent.com";
    $clientSecret = "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";

    $client = new Google_Client();
    $client->setApplicationName("testApplicationName");
    $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
    $client->setAccessType("offline");
    try {
        $client->setAuthConfig(__DIR__ . "/data/credentials.json");
    } catch (\Google\Exception $e) {
        echo "<p>Ошибочка вышла</p>";
    }
    $client->useApplicationDefaultCredentials();
    $client->addScope('https://www.googleapis.com/auth/spreadsheets');

    $service = new Google_Service_Sheets($client);
    $spreadsheetId = '1aM_DhSvp7J8lUGVSyRUUFOYtqedjwFDpCp35ILu_LNU';

    try {
        $range = "sheet";
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        for ($i = 1; $i < sizeof($response->getValues()); $i++) {
            $valuesInRow = array();
            echo "<div>";
            for ($j = 0; $j < 3; $j++) {
                if ($j < sizeof($response->getValues()[$i])) {
                    echo "<p>" . $response->getValues()[$i][$j] . "</p>";
                } else {
                    echo "<p></p>";
                }
            }
            echo "</div>";
        }
    } catch (\Google\Service\Exception $e) {
        echo "Возникла ошибка с получением данных";
    }
    ?>
</div>
</body>
</html>