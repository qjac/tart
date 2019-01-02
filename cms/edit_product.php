<?php
require('authenticate.php');

// Get the product data
$product_id = $_POST['product_id'];
$category_id = $_POST['category_id'];
$code = $_POST['code'];
$name = $_POST['name'];
$price = $_POST['price'];
$shortdescription = $_POST['shortdescription'];
$description = $_POST['description'];
$product_image = $_FILES['product_image']['name'];
// Bug fix - check for click on category link vs submit form.
if(isset($product_id))
{

// Validate inputs
if (empty($category_id) || empty($code) || empty($name) || empty($price) ) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, update the product in the database
    require_once('database.php');
    $query = "UPDATE products
              SET categoryID = '$category_id',
                  productCode = '$code',
                  productName = '$name',
                  listPrice = '$price',
				  shortDescription = '$shortdescription',
				  description = '$description'
               WHERE productID = '$product_id'";
    $db->exec($query);

    // Display the Product List page
	if(!empty($product_image))
	{
	include('insert_image.php');
	include('resize_image.php');
	}
    include('index.php');
}
}
else
{
	// category link was clicked, show index without update logic
	 include('index.php');
}

?>