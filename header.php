<?php 
	require('database.php');
	// grab categories from db
	$query = 'select * from categories order by categoryName';
	$categories_menu = $db->query($query);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>TART -Frames with Attitude</title>

	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link href='https://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="stylesheet" href="js/SlickNav/slicknav.min.css" />
	<link rel="stylesheet" href="css/styles.css">

</head>

<body>
	<div class="container u-full-width">
		<header class="row u-full-width">
			<a href="index.php"><img src="images/logo.png" alt="logo" class="logo"></a>

			<?php require('search-form.php') ?>

			<div id="mobile-nav"></div>
			<nav>
				<ul id="menu">
					<li><a href="#">Frame Styles</a>
						<ul>
							<?php 
	           		foreach ($categories_menu as $category_menu):
	            ?>
							<li>
			        	<a href="items.php?category_id=<?php echo $category_menu['categoryID']; ?>"><?php echo $category_menu['categoryName']; ?></a>
			        </li>
			    <?php endforeach; ?>
						</ul>
					</li>
					<li><a href="locations.php">Locations</a></li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="connect.php">Connect with Us</a></li>
				</ul>
			</nav>
		</header>
		<div class="u-cf"></div>