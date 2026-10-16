<?php
session_start();
$id = $_GET['id'];
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PHPoad New topic</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <main>
    <form method="post" action="createTopic.php?id=<?php echo $id; ?>">
      <label for="name">Topic name:</label>
      <input id="name" name="name" type="text">
      <br>
      <input type="submit">
    </form>
  </main>
</body>

</html>
