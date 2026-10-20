<?php
include 'viewForumData.php';
global $result;
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <main>
    <?php
    $id = $_GET['id'];
    echo "<a href='newTopic.php?id={$id}'>New topic</a><br>";
    if (mysqli_num_rows($result) != 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<a href='viewTopic.php?id={$row['id']}'>
      <article>
      {$row['name']}
      </article>
      </a>";
      }
    } else {
      echo "No topics yet.";
    }
    ?>
  </main>
</body>

</html>
