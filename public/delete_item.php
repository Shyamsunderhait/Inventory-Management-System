<?php
require_once '../controllers/itemController.php';

if (isset($_GET['id'])) {
  $item->id = $_GET['id'];
} else {
  echo "No id specified";
  exit;
}







?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Item</title>
</head>


<body>
  <h1>Delete Item</h1>
  <p>Are you sure to delete this item</p>
  <form action="../controllers/itemController.php" method="POST">

    <input type="hidden
  " name="id" value="<?= htmlspecialchars($item->id) ?>">
    <button type="submit" name="delete"> Yes delete it!</button>
  </form>

</body>

</html>