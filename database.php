<?php
    // $dsn = 'mysql:host=localhost;dbname=finaljrq';
    // $username = 'root';
    // $password = 'root';

$dsn = 'mysql:host=db621138211.db.1and1.com;dbname=db621138211';
    $username = 'dbo621138211';
    $password = '!pAjamas1';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>