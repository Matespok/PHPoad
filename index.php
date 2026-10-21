<?php
require_once __DIR__ . '/init.php';
include 'indexdata.php';
global $resultCategory;
global $resultForum;
global $isAdmin;
$isAdmin = false;
if ($_SESSION['role'] == 'A') {
    $isAdmin = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHPoad</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php if (isset($_SESSION['user_id'])) {
      echo "you're logged in!";
      echo "<a href='logout.php'>logout</a>";
  } else {
      echo "you're not logged in. <a href='loginQuery.php'>login</a>";


  } ?>


  <h1>PHPoad - the PHP toad; but better and hand-written</h1>
  <main>
      <?php
        if ($isAdmin == true) {
            echo "<a href='newCategory.php'>make a new category +<br></a>";
        }
?>

    <?php
    if (count($resultCategory) > 0) {
        foreach ($resultCategory as $category) {
            echo "
              <section>
      ";
            if ($isAdmin == true) {
                echo " <h2>{$category["name"]}<a href='deleteCategoryQuery.php?id={$category["id"]}'>delete this category - </a></h2>
                <a href='newForum.php?category_id={$category["id"]}'>+</a>";
            } else {
                echo "<h2>{$category["name"]}</h2>";
            }
            if (count($resultForum) > 0) {
                foreach ($resultForum as $forum) {
                    if ($category["id"] == $forum["category_id"]) {
                        echo "
                  <a href='viewForum.php?id={$forum['id']}'>
                  <article>
                    <h4>{$forum['name']}</h4>
                    <p>{$forum["description"]}</p>
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
