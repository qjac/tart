<?php 
	require('header.php');
 ?>
 <?php 
// get current category
	$category_id = $_GET['category_id'];
	$category = $db->prepare('select * from categories where categoryID = :category_id');
	$category->execute(array(':category_id' => $category_id));

	$category_row = $category->fetch();
	$category_name = $category_row['categoryName'];

	// get products based on category_id
	$products = $db->prepare('select * from products where categoryID = :category_id');
	$products->execute(array(':category_id' => $category_id));
 ?>



 <main class="u-cf u-full-width">
		<div class="hero u-full-width">
			<!-- background image! Woohoo! -->
			<h2><?php echo $category_name; ?></h2>	
		</div> <!-- end hero -->
	
		<section>
			<hr>
	<?php $i=0; ?>
                <?php foreach ($products as $product) : ?>
                <?php 

		if ($i%2 == 0) 
                {
                	echo '<div class="row">';
                } 
                ?>
		<div class="stack-up equalhi">
                    <img src="lg_images/<?php echo $product['productID'];  ?>.<?php echo $product['file_ext'];  ?>" alt="<?php echo $product['productName']; ?>">
		<h4> <a href="item.php?product_id=<?php echo $product['productID']; ?>"><?php echo $product['productName']; ?></a>
		</h4>
		<h6>$<?php echo $product['listPrice']; ?>
		</h6>
		<p>		<?php echo $product['shortDescription']; ?> 
		</p>
		<p>Catalogue #<?php echo $product['productCode']; ?></p>

	<a href="item.php?product_id=<?php echo $product['productID']; ?>">
		More Info
		</a>
		</div>
		<?php 
                $i++;
		if ($i%2 == 0) 
		{
			echo '</div>';

		} 
		
		?>
		<?php endforeach; ?>
    
    <?php
    // end div for rows that have only one item.
     if ($i%2 != 0) 
		{
			echo '</div>';

		} 
    ?>
		</section>
	</main>

<?php 
	require('footer.php');
 ?>

