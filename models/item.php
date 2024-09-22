<?php
class Item
{
  private $conn;
  private $table_name = "items";

  public $id;
  public $name;
  public $quantity;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function readAll()
  {
    $query = "SELECT * FROM " . $this->table_name;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  public function create()
  {
    $query = "INSERT INTO " . $this->table_name . " SET name=:name, quantity=:quantity";
    $stmt = $this->conn->prepare($query);
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->quantity = htmlspecialchars(strip_tags($this->quantity));
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":quantity", $this->quantity);
    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  public function update()
  {
    $query = "UPDATE " . $this->table_name . " SET name=:name,quantity=:quantity WHERE id=:id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":quantity", $this->quantity);
    $stmt->bindParam(":id", $this->id);
    if ($stmt->execute()) {
      return true;
    }
    return false;
  }
  public function delete()
  {
    $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $this->id);
    if ($stmt->execute()) {
      return true;
    }
    return false;
  }


  public function readOne()
  {
    $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $this->id);
    $stmt->execute();
    return $stmt;
  }
}
