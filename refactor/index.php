<?php
session_start();
include 'indexdata.php';
global $resultCategory;
global $resultForum;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHPoad</title>
  <link rel="stylesheet" href="/refactor/style.css">
</head>

<body>
  <?php if (isset($_SESSION['user_id'])) {
    echo "you're logged in!";
    echo "<a href='logout.php'>logout</a>";
  } else {
    echo "you're not logged in. <a href='login.php'>login</a>";
  } ?>


  <h1>PHPoad - the PHP toad; but better and hand-written</h1>
  <main>

    <a href="/refactor/newCategory.php">+<br /></a>

    <?php
    if ($resultCategory->num_rows > 0) {
      while ($rowCategory = $resultCategory->fetch_assoc()) {
        echo "
              <section>
                <h2>{$rowCategory["name"]}<a href='deletecategory.php?id={$rowCategory["id"]}'> - </a></h2>
                <a href='newForum.php?category_id={$rowCategory["id"]}'>+</a>";
        if ($resultForum->num_rows > 0) {
          $resultForum->data_seek(0);
          while ($rowForum = $resultForum->fetch_assoc()) {
            if ($rowCategory["id"] == $rowForum["category_id"]) {
              echo "
                  <a href='viewForum.php?id={$rowForum['id']}'>
                  <article>
                    <h4>{$rowForum['name']}</h4>
                    <p>{$rowForum["description"]}</p>
                  </article>
                </a>";
            }
          }
        }
        echo "</section>";
      }
    } ?>
  </main>

</body>

</html>
