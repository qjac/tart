<?php
require('authenticate.php');

// Get the product data
$category_id = $_POST['category_id'];
$categoryName = $_POST['categoryName'];

// Validate inputs
if (empty($categoryName)) {
    $error = "Invalid category data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, add the product to the database
    require_once('database.php');
    $query = "UPDATE categories
              SET categoryName = '$categoryName'
               WHERE categoryID = '$category_id'";
    $db->exec($query);

    // Display the Category List page
    include('category_list.php');
}
?>