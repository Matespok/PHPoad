<?php

require_once __DIR__ . '/init.php';
if ($_SESSION['role'] != 'A') {
    die("You're not authorized to do this action.");
}
$isSure = $_POST['sure'];
if ($isSure == "Yes, I'm sure") {
    $db = Database::getConnection();
    $category_id = $_GET['id'];
    $stmt = $db->prepare("DELETE FROM forum_categories WHERE id = :category_id");
    $stmt->execute([
        'category_id' => $category_id,
    ]);
    echo "<p>Category deleted. Go back to <a href='index.php'>index</a></p>";
}
