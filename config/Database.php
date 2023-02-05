<?php

  $host = 'localhost';
  $user = 'root';
  $pWord = 'sdmV[TQqecJ@8_u4';
  $dbName = 'world';

  // Set DSN (Data Source Name)
  $dsn = 'mysql:host='.$host.';dbname='.$dbName;

  try {
    $pdo = new PDO($dsn, $user, $pWord);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  } catch (PDOException $e) {
    $error_message = 'Database Error: ';
    $error_message .= $e->getMessage();
    echo $error_message;
    exit('Unable to connect to the database');
  }
?>