<?php
$product_image = $_FILES['product_image']['name'];
    $product_image_type = $_FILES['product_image']['type'];
    $product_image_size = $_FILES['product_image']['size']; 
	
	// get file info using $FILES variable. 
	// $FILES variable - An array of items uploaded to the current script via the HTTP POST method. 
	
	require_once('appvars.php');
	if(isset($product_id))
	{
		$image_id = $product_id;	
	}
	else
	{
		$image_id = $db->lastInsertId();
	}
	
	/*
	echo $image_id;
	echo $image_id;
    echo $image_id; 
    echo $image_id; 
	*/
	


if ((($product_image_type == 'image/gif') || ($product_image_type == 'image/jpeg') || ($product_image_type == 'image/jpg') || ($product_image_type == 'image/png'))
        && ($product_image_size > 0) && ($product_image_size <= GW_MAXFILESIZE)) 
		{
		
		// File was uploaded to temp directory when form was submitted. Check if there was an error in the initial upload process.
        if ($_FILES['product_image']['error'] == 0) {
          // Move the file to the target upload folder
          $target = GW_UPLOADPATH . $product_image;
		  
          if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target)) 
		  {
			
			/*
				The strrchr() function finds the position of the last occurrence of a string within another string, and returns all 		                characters from this position to the end of the string.
				
				strrchr() returns .gif
				
				sbustr(.gif, 1) returns everything after the first character. gif
			*/
	
			// get file extension
			$file_ext =  substr(strrchr($product_image,'.'),1);
			

            // Write the data to the database. dont forget singal quotes here.
           $query = "update products set  file_ext = '$file_ext' where productID = '$image_id'";
		   
$db->exec($query);   
	
			
		
		    // rename takes two parmaters. currnet file first, new file second.
		
			rename(GW_UPLOADPATH . $product_image, GW_UPLOADPATH . $image_id .'.' .$file_ext);
			
			
		  }
		}
	}
	
	?>