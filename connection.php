<?php
$servername = "127.0.0.1";
$username = "root";

// connecting to the database

try {
  $db = new PDO("mysql:host=$servername;dbname=bootcamp", $username);
  // set the PDO error mode to exception
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?> 