<?php
require_once __DIR__ . '/init.php';
if ($_SESSION['role'] != 'A') {
    die("You're not authorized to do this!");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>PHPoad - New forum</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
<?php require_once 'nav.php'; ?> 
    <main>
<h1>Create a new forum for category id: <?php echo $_GET['category_id']; ?>: </h1>
    <form action="createForum.php?category_id=<?php echo $_GET['category_id']; ?>" method="post">
        <label for="forumName">Forum name:</label>
        <br>
        <input type="text" name="forumName" id="forumName">
        <br>
        <label for="forumDescription">Forum description:</label>
        <br>
        <textarea rows="3" cols="20" name="forumDescription" id="forumDescription"></textarea>
        <br>
        <input type="submit" value="Create forum">
    </form>
  </main>
</body>
</html>
