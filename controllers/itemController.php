<?php
require_once '../config/database.php';
require_once '../models/item.php';


$database = new Database();
$db = $database->getConnection();
$item = new Item($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['create'])) {
    $item->name = $_POST['name'];
    $item->quantity = $_POST['quantity'];
    if ($item->create()) {
      header("Location: ../public/index.php");
      exit();
    }
  } elseif (isset($_POST['update'])) {
    $item->id = $_POST['id'];
    $item->name = $_POST['name'];
    $item->quantity = $_POST['quantity'];
    if ($item->update()) {
      header("Location: ../public/index.php");
      exit();
    }
  } elseif (isset($_POST['delete'])) {
    $item->id = $_POST['id'];
    if ($item->delete()) {
      header("Location: ../public/index.php");
      exit;
    }
  }
  header("Location: index.php");
}
