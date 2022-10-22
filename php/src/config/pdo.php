<?php 
  try {
    $db = 'db';
    $user = 'root';
    $password = 'MYSQL_ROOT_PASSWORD';
    $dbName = 'MYSQL_DATABASE';

    $dsn = "mysql:host=$db;dbname=$dbName";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  } catch (Exception $e){
    die('Exception: ' . $e->getMessage());
  }