<?php
require_once '../controllers/itemController.php';

if (isset($_GET['id'])) {
  $itemId = $_GET['id'];
  $item->id = $itemId;
  $stmt = $item->readOne();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if (!$row) {
    echo "item not found";
    exit;
  }
} else {
  echo "no item id specified";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit item</title>
</head>

<body>
  <h1>Edit item</h1>
  <form action="../controllers/itemController.php" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
    <label for="name">Name</label>
    <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>">
    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" value="<?= htmlspecialchars($row['quantity']) ?>">
    <button type="submit" name="update">Update Item</button>

  </form>
  <a href="index.php">Back to inventory</a>

</body>

</html>