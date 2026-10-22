<?php
require_once __DIR__ . '/init.php';
if (isset($_SESSION['user_id'])) {
    die("<p>You're already logged in. </p><br> <a href='index.php'>Go to index</a>");
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PHPoad Login</title>
  <link rel="stylesheet" href="style.css">
</head>

  <body>
<?php require_once 'nav.php'; ?>  <main>
    <form method="post" action="login.php">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username">
      <br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password">
      <br>
        <input type="submit" value="login">
        <p>Don't have an account? <a href="registerQuery.php">Register!</a></p>
    </form>
  </main>
</body>

</html>
