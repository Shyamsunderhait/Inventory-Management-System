<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Item</title>
</head>

<body>
  <h1>Add New Item</h1>
  <form action="../controllers/itemController.php" method="POST">
    <label for="name">Name</label>
    <input type="text" name="name" required>
    <label for="quantity">Quantity</label>
    <input type="number" name="quantity">
    <button type="submit" name="create">Add item</button>
  </form>
  <a href="index.php"> Back to inventory</a>

</body>

</html>