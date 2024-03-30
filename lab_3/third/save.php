<?php
if (empty($_POST['email'])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}
$inputData = array();
$inputData[] = !empty($_POST['category']) ? $_POST['category'] : "other";
$inputData[] = $_POST['email'];
$inputData[] = !empty($_POST['title']) ? $_POST['title'] : "untitled";
$inputData[] = $_POST['description'];

$path = "./categories/$inputData[0]";

$file = $path . "/$inputData[2].txt";
if (!file_put_contents($file, $inputData[3])) {
    throw new Exception("Траблы");
}
chmod($file, 0777);
header('Location: /third/third_task.php');
exit();

