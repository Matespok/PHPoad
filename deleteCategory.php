<?php
session_start();
$isAdmin = false;
if ($_SESSION['role'] == 'A') {
    $isAdmin = true;
} else {
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
 <?php $isSure = "no";
if (isset($_POST['sure'])) {
    $isSure = $_POST['sure'];
}
if ($isSure != "Yes, I'm sure") {
    echo "
<h2>Are you sure you want to delete this category?</h2>
<form method='post' action='deleteCategory.php?id={$_GET['id']}'>
  <label for='sure'><b>Write this sentence:</b> \"<i>Yes, I'm sure</i>\"</label>
  <br>
  <input type='text' name='sure' id='sure'>
  <br> 
  <input type='submit' value='Delete'>  
</form>
";
} elseif ($isSure == "Yes, I'm sure") {
    $servername = '127.0.0.1';
    $username = 'username';
    $password = 'UserPass';
    $dbname = 'mysqlPHPtoad';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sqltext = "DELETE FROM forum_categories WHERE id=?";


    $id = $_GET['id'];

    if (isset($_GET['id'])) {

        if ($stmt = $conn->prepare($sqltext)) {
            $stmt->bind_param('i', $id);
            if ($stmt->execute()) {
                echo "success!";
            } else {
                echo "error deleting a category: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Prepare failed" . $conn->error;
        }
    } else {
        echo "no id provided.";
    }
    echo "<br><a href='index.php'>Go back to index</a>";
} ?>      
    </main>

</body>
</html>

