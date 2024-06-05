<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>lab_5</title>
</head>
<body>
<h1>Title</h1>

<form action="save.php" method="POST">
    <label for="email">Почта</label>
    <input type="email" name="email" id="email" required>

    <label for="title">Название</label>
    <input type="text" name="title" id="title" required>

    <label for="categories">Категория</label>
    <select name="category" id="categories" required>
        <option value="directors">Режиссёры</option>
        <option value="writers">Писатели</option>
        <option value="actors">Актёры</option>
    </select><br>

    <label for="description">Описание:</label><br>
    <textarea name="description" id="description" rows="10" cols="54" required></textarea><br>

    <button type="submit">Отправить</button>
</form>

<div id="table">
    <table>
        <thead>
        <tr>
            <th>Почта</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Описание</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $container = 'db';
        $useruser = 'root';
        $password = 'helloworld';
        $database = 'web';
        $port = 3306;

        $BASE = new mysqli($container, $useruser, $password, $database, $port);

        if ($BASE->connect_error) {
            die("Connection failed: " . $BASE->connect_error);
        }

        $result = $BASE->query("SELECT email, title, category, description FROM web.ad");

        foreach ($BASE->query("SELECT * FROM web.ad") as $row) {
            $email = $row['email'];
            $category = $row['category'];
            $title = $row['title'];
            $description = $row['description'];
            echo "<div><p>$category</p><p>$title</p><p>$description</p></div>";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
