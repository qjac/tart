<?php
require('authenticate.php');
require_once('appvars.php');
require('database.php');
$category_id = $_POST['category_id'];
 // Week6 - Get all categories for select menu
    $query = "SELECT * FROM categories
			  where categoryID <> '$category_id'
              ORDER BY categoryID";
    $categories = $db->query($query);

// Week6 - Get category for selected item in categories select menu	
$query = "SELECT * FROM categories
 where categoryID = '$category_id'
              ORDER BY categoryID";
    $category_select = $db->query($query);
	$category_selected = $category_select->fetch();
	

$product_id = $_POST['product_id'];
$query = 'SELECT *
          FROM products
          WHERE productID = ' . $product_id;
$products = $db->query($query);
$product = $products->fetch();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- the head section -->
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
     <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
     <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
     <script type="text/javascript">
	 /* these vars are used in chk_dimensions.js */
	 var minWidth = <?php echo GW_MINFILEWIDTH ?>;
	 var minHeight = <?php echo GW_MINFILEHEIGHT ?>;
	 var maxFileSize = <?php echo GW_MAXFILESIZE ?>;
     </script>
     <script type="text/javascript" src="chk_dimensions.js"></script>
</head>

<!-- the body section -->
<body>
    <div id="page">
        <div id="header">
            <h1>Product Manager</h1>
        </div>

        <div id="main">
            <h1>Edit Product</h1>
            <form action="edit_product.php" method="post"
                  id="add_product_form" enctype="multipart/form-data">
                <input type="hidden" name="product_id"
                       value="<?php echo $product['productID']; ?>" />
				<!-- Week6 - removed Category ID label and text feild in favor of select menu -->
               
 <!-- Week6 - add select menu -->                      
                <label>Category:</label>     
                <select name="category_id">
                <!-- set selected catgegory -->
                <option value="<?php echo $category_selected['categoryID']; ?>"><?php echo $category_selected['categoryName']; ?></option>
                
                 <?php foreach ($categories as $category) : ?>
                 <option value="<?php echo $category['categoryID']; ?>"><?php echo $category['categoryName']; ?></option>
                 <?php endforeach; ?>
                </select>   
                <br />

                <label>Code:</label>
                <input type="input" name="code"
                       value="<?php echo $product['productCode']; ?>" />
                <br />

                <label>Name:</label>
                <input type="input" name="name"
                       value="<?php echo $product['productName']; ?>"  />
                <br />

                <label>List Price:</label>
                <input type="input" name="price"
                       value="<?php echo $product['listPrice']; ?>" />
                        <br />
                <label>Short Description:</label>
                <br />
                
                <textarea name="shortdescription" id="shortdescription"><?php echo $product['shortDescription']; ?></textarea>
				<script type="text/javascript">
    			CKEDITOR.replace( 'shortdescription',
    			{
        			toolbar : 'MyBasic',
					
    			});
				</script>
                <br />
                <label>Description:</label>
                <br />
                
                <textarea name="description" id="description"><?php echo $product['description']; ?></textarea>
				<script type="text/javascript">
    			CKEDITOR.replace( 'description',
    			{
        			toolbar : 'MyBasic',
					
    			});
				</script>

				<script type="text/javascript">
				// set this up first then apply custom toolbar above
				//CKEDITOR.replace('description');
				</script>
				<br />
                <label for="product_image">Product Image:</label>
    <input type="file" id="product_image" name="product_image" />
    <br />
                <label>&nbsp;</label>
                <input type="submit" value="Save Changes" />
                <br />
            </form>
            <p><a href="index.php">View Product List</a></p>
        </div><!-- end main -->

        <div id="footer">
            <p>
                &copy; <?php echo date("Y"); ?> 
            </p>
        </div>

    </div><!-- end page -->
</body>
</html>