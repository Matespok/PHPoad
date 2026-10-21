<?php

require_once __DIR__ . '/init.php';
if ($_SESSION['role'] != 'A') {
    die("You're not authorized to do this action.");
}

if (!isset($_POST['forumName']) || trim($_POST['forumName']) === '') {
    die("The name was not given.");
}


$category_id = $_GET['category_id'];
$name = trim($_POST['forumName']);
$description = trim($_POST['forumDescription']);

$db = Database::getConnection();
$stmt = $db->prepare("INSERT INTO forums (name, description, category_id) 
                      VALUES (:name,:description,:category_id)");
$stmt->execute([
    'name' => $name,
    'description' => $description,
    'category_id' => $category_id,
]);
$idOfForum = $db->lastInsertId();
echo "<p>Forum was created successfully. <br>  <a href='viewForum.php?id={$idOfForum}'>Go to forum:</a></p>";
