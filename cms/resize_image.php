<?php
$tmp_path = GW_UPLOADPATH . $image_id . '.' . $file_ext; //tmp path of the image
	$lg_path = GW_UPLOADPATH_LG . $image_id . '.' . $file_ext; //the path of lg image
	$sm_path = GW_UPLOADPATH_SM . $image_id . '.' . $file_ext; //the path of sm image
	if($file_ext == jpg)
	{ 
		$image_type = IMAGETYPE_JPEG; 
	} 
	else if($file_ext == jpeg)
	{ 
		$image_type = IMAGETYPE_JPEG; 
	}
	else if($file_ext == png) 
	{	
		$image_type = IMAGETYPE_PNG;
		
	}else if($file_ext == gif)
	{
		$image_type = IMAGETYPE_GIF;
	
	}
	//echo $image_type;
	//get the tmp image and its height and width
	if ($image_type == IMAGETYPE_JPEG)
	{ 
		$tmp_image = imagecreatefromjpeg($tmp_path);
		
		
	}else if($image_type == IMAGETYPE_PNG) 
	{	
		$tmp_image = imagecreatefrompng($tmp_path);
		
		
	}else if($image_type == IMAGETYPE_GIF)
	{
		$tmp_image = imagecreatefromgif($tmp_path);	
		
	} 
	
	$tmp_width = imagesx($tmp_image);
	$tmp_height = imagesy($tmp_image);
	
	//calculate height and width ratios for the lg maximum
	$lg_width_ratio = $tmp_width/GW_LGIMAGEWIDTH;
	$lg_height_ratio = $tmp_height/GW_LGIMAGEHEIGHT;
	
	//if image is largest than specified ratio, create the new image
	// note: there is a client-side check for this
	
	if($lg_width_ratio >= 1 || $lg_height_ratio >= 1)
	{
		//calculate height and width for the new image
		$lg_ratio = max($lg_width_ratio, $lg_height_ratio);
		$lg_height = round($tmp_height/$lg_ratio);
		$lg_width = round($tmp_width/$lg_ratio);
		
		//create new image
		$lg_image = imagecreatetruecolor($lg_width, $lg_height);
		
		//copy tmp image to new image and resize the file
		$new_x = 0; //start new image in upper left corner
		$new_y = 0;
		$tmp_x = 0; //copy tmp image from upper left corner
		$tmp_y = 0;
		imagecopyresampled($lg_image, $tmp_image,
						   $new_x, $new_y, $tmp_x, $tmp_y,
						   $lg_width, $lg_height, $tmp_width, $tmp_height);
						   
		//write the new image to a file
		if ($image_type == IMAGETYPE_JPEG)
		{ 
			imagejpeg($lg_image,$lg_path);
		
		}else if($image_type == IMAGETYPE_PNG) 
		{	
			imagepng($lg_image,$lg_path);
		
		}else if($image_type == IMAGETYPE_GIF)
		{
			imagegif($lg_image,$lg_path);
		} 
		
		//free any memory associated with the new image
		imagedestroy($lg_image);
		
	}
	
	//calculate height and width ratios for the lg maximum
	$sm_width_ratio = $tmp_width/GW_SMIMAGEWIDTH;
	$sm_height_ratio = $tmp_height/GW_SMIMAGEHEIGHT;
	
	//if image is largest than specified ratio, create the new image
	// note: there is a client-side check for this
	
	if($sm_width_ratio > 1 || $sm_height_ratio > 1)
	{
		//calculate height and width for the new image
		$sm_ratio = max($sm_width_ratio, $sm_height_ratio);
		$sm_height = round($tmp_height/$sm_ratio);
		$sm_width = round($tmp_width/$sm_ratio);
		
		//create new image
		$sm_image = imagecreatetruecolor($sm_width, $sm_height);
		
		//copy tmp image to new image and resize the file
		$new_x = 0; //start new image in upper left corner
		$new_y = 0;
		$tmp_x = 0; //copy tmp image from upper left corner
		$tmp_y = 0;
		imagecopyresampled($sm_image, $tmp_image,
						   $new_x, $new_y, $tmp_x, $tmp_y,
						   $sm_width, $sm_height, $tmp_width, $tmp_height);
						   
		//write the new image to a file
		if ($image_type == IMAGETYPE_JPEG)
		{ 
			imagejpeg($sm_image,$sm_path);
		
		}else if($image_type == IMAGETYPE_PNG) 
		{	
			imagepng($sm_image,$sm_path);
		
		}else if($image_type == IMAGETYPE_GIF)
		{
			imagegif($sm_image,$sm_path);
		} 
		
		//free any memory associated with the new image
		imagedestroy($sm_image);
		
	}
	
		//free any memory associated with the tmp image
		imagedestroy($tmp_image);
        
?>
