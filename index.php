<?php
	require_once 'core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';
	include 'includes/headerfull.php';
	include 'includes/leftbar.php';
?>

		<!-- Main Content -->
		<div class="col-md-8">
			<div class="row">
				<h2 class="text-center">Featured Products</h2>
				<div class="col-md-3">
					<h4>Levis Jeans</h4>
					<img class="img-thumb" src="images/products/men4.png" alt="Levis Jeans">
					<p class="list-price text-danger">List Price: <s>$54.99</s></p>
					<p class="price">Our Price: $34.99</p>
					<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
				</div>

				<div class="col-md-3">
					<h4>Woman's Shirt</h4>
					<img class="img-thumb" src="images/products/women7.png" alt="Woman's Shirt">
					<p class="list-price text-danger">List Price: <s>$45.99</s></p>
					<p class="price">Our Price: $29.99</p>
					<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
				</div>

				<div class="col-md-3">
					<h4>Hollister Shirt</h4>
					<img class="img-thumb" src="images/products/men1.png" alt="Hollister Shirt">
					<p class="list-price text-danger">List Price: <s>$25.99</s></p>
					<p class="price">Our Price: $19.99</p>
					<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
				</div>

				<div class="col-md-3">
					<h4>Fancy Shoes</h4>
					<img class="img-thumb" src="images/products/women6.png" alt="Fancy Shoes">
					<p class="list-price text-danger">List Price: <s>$64.99</s></p>
					<p class="price">Our Price: $39.99</p>
					<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
				</div>

				<div class="col-md-3">
					<h4>Boys Hoodie</h4>
					<img class="img-thumb" src="images/products/boys1.png" alt="Boys Hoodie">
					<p class="list-price text-danger">List Price: <s>$24.99</s></p>
					<p class="price">Our Price: $19.99</p>
					<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
				</div>

				<div class="col-md-3">
					<h4>Girls Dress</h4>
					<img class="img-thumb" src="images/products/girls3.png" alt="Girls Dress">
					<p class="list-price text-danger">List Price: <s>$34.99</s></p>
					<p class="price">Our Price: $18.99</p>
					<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
				</div>

				<div class="col-md-3">
					<h4>Womens' Skirt</h4>
					<img class="img-thumb" src="images/products/women3.png" alt="Womens' Skirt">
					<p class="list-price text-danger">List Price: <s>$29.99</s></p>
					<p class="price">Our Price: $19.99</p>
					<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
				</div>

				<div class="col-md-3">
					<h4>Purse</h4>
					<img class="img-thumb" src="images/products/women5.png" alt="Purse">
					<p class="list-price text-danger">List Price: <s>$49.99</s></p>
					<p class="price">Our Price: $39.99</p>
					<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
				</div>
			</div>
		</div>

<?php
	include 'includes/detailsmodal.php';
	include 'includes/rightbar.php';
	include 'includes/footer.php';