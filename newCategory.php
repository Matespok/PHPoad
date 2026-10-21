<?php
require_once __DIR__ . '/init.php';
if ($_SESSION['role'] != 'A') {
    die("You're not authorized to do this.");
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHPoad new category</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <main>
    <form method="post" action="createCategory.php">
        <label for="categoryName">Category name: </label>
        <br>
        <input type="text" name="categoryName" id="categoryName">
        <br>
        <input type="submit" value="Create category">
    </form>
  </main>
</body>
</html>
