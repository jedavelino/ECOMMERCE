<?php
	require_once 'core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';
	include 'includes/headerfull.php';
	include 'includes/leftbar.php';

	$sql = "SELECT * FROM products WHERE featured = 1";
	$featured = $db->query($sql);
?>

	<!-- Main Content -->
	<div class="col-md-8">
		<div class="row">
			<h2 class="text-center">Featured Products</h2>
			
			<?php while($product = mysqli_fetch_assoc($featured)) : ?>
			<div class="col-md-3">
				<h4><?php echo $product['title']; ?></h4>
				<img class="img-thumb" src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>">
				<p class="list-price text-danger">List Price: <s><?php echo $product['list_price']; ?></s></p>
				<p class="price">Our Price: <?php echo $product['price']; ?></p>
				<button type="button" class="btn btn-sm btn-success" onclick="detailsmodal(<?php echo $product['id']; ?>)">Details</button>
			</div>
			<?php endwhile; ?>

		</div>
	</div>

<?php
	include 'includes/rightbar.php';
	include 'includes/footer.php';