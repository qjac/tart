<?php
require('authenticate.php');

require_once('appvars.php');
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$categories = $db->query($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- the head section -->
<head>
    <title>Add Product</title>
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
            <h1>Add Product</h1>
            <form action="add_product.php" method="post"
                  id="add_product_form" enctype="multipart/form-data">
                <label>Category:</label>
                <select name="category_id">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </option>
                <?php endforeach; ?>
                </select>
                <br />

                <label>Code:</label>
                <input type="input" name="code" />
                <br />

                <label>Name:</label>
                <input type="input" name="name" />
                <br />

                <label>List Price:</label>
                <input type="input" name="price" />
                <br />
                  <label>Short Description</label>
                <br />
                <textarea name="shortdescription" id="shortdescription"></textarea>
                <script type="text/javascript">
    			CKEDITOR.replace( 'shortdescription',
    			{
        			toolbar : 'MyBasic',
					
    			});
				</script>
				
                <label>Description</label>
                <br />
                <textarea name="description" id="description"></textarea>
                <script type="text/javascript">
    			CKEDITOR.replace( 'description',
    			{
        			toolbar : 'MyBasic',
					
    			});
				</script>

				<script type="text/javascript">
				//CKEDITOR.replace('description');
				</script>
				 <br />
 <label for="product_image">Product Image:</label>
    <input type="file" id="product_image" name="product_image" />
    <br />
                <label>&nbsp;</label>
                <input type="submit" value="Add Product" />
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