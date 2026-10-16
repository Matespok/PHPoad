<html>

<body>
  <form action="<?php echo "CreateForums.php?category_id=" . $_GET['category_id'] . ""; ?>" method="post">
    Name: <input type="text" name="name"><br>
    Description: <input type="text" name="description"><br>
    <input type="submit">
  </form>

</body>

</html>
