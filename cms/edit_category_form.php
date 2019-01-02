<?php
require('authenticate.php');

require('database.php');

$category_id = $_POST['category_id'];
$query = 'SELECT *
          FROM categories
          WHERE categoryID = ' . $category_id;
$categories = $db->query($query);
$category = $categories->fetch();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Category</title>
</head>

<body>

    <h2>Edit Category</h2>
    <form action="edit_category.php" method="post" id="edit_category_form">
    
         <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>" />

        <label>Name:</label>
        <input type="input" name="categoryName" value="<?php echo $category['categoryName']; ?>" />
        
        <input id="edit_category_button" type="submit" value="Update"/>
    </form>
</body>
</html>