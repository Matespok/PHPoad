<?php
require_once __DIR__ . '/init.php';
if (!isset($_SESSION['user_id'])) {
    die("YOU MUST <a href='login.php'>LOGIN</a>");
} ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PHPoad New topic</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
<?php require_once 'nav.php'; ?> 
    <form method="post" action="createTopic.php?id=<?php echo $_GET['id']; ?>">
      <label for="name">Topic name:</label>
      <input id="name" name="name" type="text">
      <br>
      <input type="submit">
    </form>
</body>

</html>
