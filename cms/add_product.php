<?php
require('authenticate.php');

$category_id = $_POST['category_id'];
$code = $_POST['code'];
$name = $_POST['name'];
$price = $_POST['price'];
$shortdescription = $_POST['shortdescription'];
$description = $_POST['description'];

if(isset($code))
{
// Validate inputs
if (empty($code) || empty($name) || empty($price) || empty($description) || empty($shortdescription)) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, add the product to the database
    require_once('database.php');
    $query = "INSERT INTO products
                 (categoryID, productCode, productName, listPrice, shortDescription, description)
              VALUES
                 ('$category_id', '$code', '$name', '$price', '$shortdescription', '$description')";
    $db->exec($query);
	
	//$last_inserted_row = $db->lastInsertId();
//echo $last_inserted_row;
include('insert_image.php');
include('resize_image.php');
    // Display the Product List page
    include('index.php');
}
}
else
{
	include('index.php');
}
?>