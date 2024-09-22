<?php
require_once '../controllers/itemController.php';
$items = $item->readAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory management</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <h1>Inventory Mangaement</h1>
  <a href="add_item.php">Add Item</a>
  <table border="1">
    <thead>
      <tr>

        <th>Name</th>
        <th>Quantity</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($items && $items->rowCount() > 0): ?>
        <?php while ($row = $items->fetch(PDO::FETCH_ASSOC)): ?>

          <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['quantity']); ?></td>
            <td>
              <a href="edit_item.php?id=<?= $row['id']; ?>">Edit</a>
              <a href="delete_item.php?id=<?= $row['id']; ?>">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td>No items found</td>
        </tr>
      <?php endif; ?>
    </tbody>

  </table>

</body>

</html>