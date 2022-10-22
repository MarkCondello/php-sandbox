<?php
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'MYSQL_ROOT_PASSWORD');
define('DB_NAME', 'MYSQL_DATABASE');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}