<?php
require_once __DIR__ . '/init.php';

if ($_SESSION['role'] != 'A') {
    die("You're not permitted to do this action.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHPoad Delete category</title>
    <link rel="stylesheet" href="style.css">
</head>
  <body>
    <main>
<form method="post" action="deleteCategory.php?id=<?php echo $_GET['id']; ?>">
        <label for='sure'><b>Write this sentence:</b> "<i>Yes, I'm sure</i>"</label>
        <br>
        <input type='text' name='sure' id='sure'>
        <br> 
        <input type='submit' value='Delete'>  
       </form>
    </main>

</body>
</html>

