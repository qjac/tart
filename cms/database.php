<?php
    $dsn = 'mysql:host=localhost;dbname=finaljrq';
    $username = 'root';
    $password = 'root';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
	
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASSWORD', 'root');
  define('DB_NAME', 'finaljrq');
?>