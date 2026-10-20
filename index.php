<?php
session_start();
include 'indexdata.php';
global $resultCategory;
global $resultForum;
global $isAdmin;
$isAdmin = false;
    if($_SESSION['role'] == 'A'){
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
    echo "you're not logged in. <a href='login.php'>login</a>";
    
    
  } ?>


  <h1>PHPoad - the PHP toad; but better and hand-written</h1>
  <main>
      <?php 
        if($isAdmin == true){
        echo "<a href='newCategory.php'>make a new category +<br></a>";
      }
      ?>

    <?php
    if ($resultCategory->num_rows > 0) {
      while ($rowCategory = $resultCategory->fetch_assoc()) {
        echo "
              <section>
      ";
      if($isAdmin == true){
       echo " <h2>{$rowCategory["name"]}<a href='deleteCategory.php?id={$rowCategory["id"]}'>delete this category - </a></h2>
                <a href='newForum.php?category_id={$rowCategory["id"]}'>+</a>";  
      }else{
        echo "<h2>{$rowCategory["name"]}</h2>";
      }
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
