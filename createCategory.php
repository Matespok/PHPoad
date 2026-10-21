<?php

require_once __DIR__ . '/init.php';

if ($_SESSION['role'] != 'A') {
    die("You're not authorized to do this.");
}

if (!isset($_POST['categoryName']) || trim($_POST['categoryName']) === '') {
    die("The name was not given.");
}

$db = Database::getConnection();
$name = trim($_POST['categoryName']);
$stmt = $db->prepare("INSERT INTO forum_categories (name) VALUES (:categoryName)");
$stmt->execute(['categoryName' => $name]);
echo "
    <p>Succesfully created category. </p>
    <br>
    <a href='index.php'>Go back to index</a>";
