<?php
$username = "root";
$password = "";
try {
  $dbz = new PDO('mysql:host=localhost;dbname=register', $username, $password);
  $dbz->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $dbz->query("SET NAMES 'utf8mb4'");
} catch(PDOException $e) {
  echo "Connection failed " . $e->getMessage();
}

try{
  $db = new PDO('mysql:host=localhost;dbname=comment', $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->query("SET NAMES 'utf8'");
} catch(PDOException $e) {
  echo "Connection failed " . $e->getMessage();
}
 ?>
