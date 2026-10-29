<?php
require_once __DIR__ . '/init.php';
if (isset($_SESSION['id'])) {
    echo "<p>You're already logged in. Go to <a href='index.php'>index</a></p>";
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PHPoad register</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>

<?php require_once 'nav.php'; ?> 
      <form method="post" action="register.php">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      <br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <br>
      <label for="about-me">About you (not mandatory):</label>
      <textarea name="about-me" id="about-me" rows="4" cols="30"></textarea>
      <input type="submit" value="Register">
            </form>
            <span>PLS fill all fields out before registering...</span>
</body>

</html>
