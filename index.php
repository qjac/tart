<?php 
	require('header.php');
 ?>

 <?php  // grab categories from db
	$query = 'select * from categories order by categoryName';
	$categories_list = $db->query($query);
?>

 <main class="row u-cf u-full-width">
		<div class="hero u-full-width">
			<!-- background image! Woohoo! -->
			<h2>Sweet 'n' Sour Eyewear.</h2>	
		</div> <!-- end hero -->
	
		<section>
			<hr>
			<h3>Pick Your Shape</h3>
		<div class="row no-divide">
			<?php 
	           		foreach ($categories_list as $category_list):
	            ?>
							<div class="stack-up equalhi no-divide" id="home<?php echo $category_list['categoryID']; ?>">
			        	<h4><a href="items.php?category_id=<?php echo $category_list['categoryID']; ?>"><?php echo $category_list['categoryName']; ?></a>
     </h4>
			        </div>
			    <?php endforeach; ?>
		    </div>



		</section>
	</main>

<?php 
	require('footer.php');
 ?>

