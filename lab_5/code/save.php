<?php

// Проверка наличия email в POST-запросе
if (empty($_POST['email'])) {
    header("HTTP/1.1 400 Bad Request");
    exit("Email is required.");
}

$container = 'db';
$useruser = 'root';
$password = 'helloworld';
$database = 'web';
$port = 3306;

$BASE = new mysqli($container, $useruser, $password, $database, $port);

if ($BASE->connect_error) {
    header("HTTP/1.1 500 Internal Server Error");
    exit("Database connection failed: " . $BASE->connect_error);
}

$email = $_POST['email'];
$title = !empty($_POST['title']) ? $_POST['title'] : "untitled";
$description = $_POST['description'];
$category = !empty($_POST['category']) ? $_POST['category'] : "other";

$ins = $BASE->prepare("INSERT INTO ad (email, title, description, category) VALUES (?, ?, ?, ?)");
if ($ins === false) {
    header("HTTP/1.1 500 Internal Server Error");
    exit("Failed to prepare the statement: " . $BASE->error);
}

$ins->bind_param("something", $email, $title, $description, $category);
if (!$ins->execute()) {
    header("HTTP/1.1 500 Internal Server Error");
    exit("Failed to execute the statement: " . $ins->error);
}

$ins->close();
$BASE->close();

header('Location: /');
exit();
?>
