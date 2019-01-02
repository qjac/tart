<?php
require('authenticate.php');

// Get IDs
$userid = $_GET['userid'];

// Delete the product from the database
require_once('database.php');
$query = "DELETE FROM users
          WHERE userID = '$userid'";
$db->exec($query);

// display the Product List page
include('user_list.php');
?>