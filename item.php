<?php 
	require('header.php');
 ?>

 <?php 
	// get current product
	$product_id = $_GET['product_id'];

	$product = $db->prepare('select * from categories inner join products on categories.categoryID = products.categoryID where productID = :product_id');
	$product->execute(array(':product_id' => $product_id));

	$product_row = $product->fetch();
 ?>



 <main class="row u-cf u-full-width">
		<div class="hero u-full-width">
			<!-- background image! Woohoo! -->
			<h2><?php echo $product_row['categoryName']; ?> -<?php echo $product_row['productName']; ?></h2>	
		</div> <!-- end hero -->
	
		<section>
			<hr>
			<div class="single-product">
				<img src="lg_images/<?php echo $product_row['productID']; ?>.<?php echo $product_row['file_ext']; ?>" > <br>
				<h4><?php echo $product_row['productName']; ?><br>
				</h4>
				<h6>$<?php echo $product_row['listPrice']; ?><br>
				</h6>
				<p>
				<?php echo $product_row['description']; ?>
				</p>
				<p>Catalogue #<?php echo $product_row['productCode']; ?><br> </p>
				<p>
					<a class="btn" href="items.php?category_id=<?php echo $product_row['categoryID']; ?>">Back to <?php echo $product_row['categoryName']; ?> Frames</a>
				</p>
			</div>

		</section>
	</main>

<?php 
	require('footer.php');
 ?>

