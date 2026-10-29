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
        <?php require_once 'nav.php';
?> 
        
       <main>
      <?php
      if ($isAdmin == true) {
          echo "<a href='newCategory.php' class='btn'>make a new category +<br></a>";
      }
?>

  <?php
    if (count($resultCategory) > 0) {
        foreach ($resultCategory as $category) {
            echo "
      ";
            if ($isAdmin == true) {
                echo "
            <div class='category-title'>{$category["name"]} 
        <span><a href='newForum.php?category_id={$category["id"]}'>+ Make a new forum inside this category</a> | <a href='deleteCategoryQuery.php?id={$category["id"]}'> - delete this category </a></span>

            </div>";
            } else {
                echo "<div class='category-title'>{$category["name"]}</div>";
            }
            if (count($resultForum) > 0) {
                foreach ($resultForum as $forum) {
                    if ($category["id"] == $forum["category_id"]) {
                        echo "
            
            <a href='viewForum.php?id={$forum['id']}&category_name={$category['name']}'>
            <div class='forum'>
            <h4>{$forum['name']}
            <br>
                    <span>{$forum["description"]}</span>
                </div>
            </a>";
                    }
                }
            }
            echo "";
        }
    } ?>
</main>
</body>

</html>
