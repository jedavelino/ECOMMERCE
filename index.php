<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Shaunta's Boutique</title>

	<!-- Styles -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<!-- Navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Shaunta's Boutique</a>
			</div>

			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Men <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Shirts</a></li>
							<li><a href="#">Pants</a></li>
							<li><a href="#">Shoes</a></li>
							<li><a href="#">Accessories</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container -->
	</nav>

	<!-- Header -->
	<header id="headerWrapper">
		<div id="back-flower"></div>
		<div id="logotext"></div>
		<div id="fore-flower"></div>
	</header>

	<div class="container-fluid">
		<!-- Left Sidebar -->
		<div class="col-md-2">Left Sidebar</div>

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

		<!-- Right Sidebar -->
		<div class="col-md-2">Right Sidebar</div>
	</div><!-- /.container -->


	<!-- Footer -->
	<footer class="text-center" id="footer">
		&copy; Copyright 2016 Shaunta's Boutique
	</footer>

	<!-- Details Modal -->
	<div class="modal fade details-1" id="details-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title text-center" id="myModalLabel">Levis Jeans</h4>
				</div>

				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-6">
								<div class="center-block">
									<img class="details img-responsive" src="images/products/men4.png" alt="Levis Jeans">
								</div>
							</div>

							<div class="col-sm-6">
								<h4>Details</h4>
								<p>These jeans are amazing! They are straight leg, fit great and look sexy. Get a pair while they last!</p>
								<hr>
								<p>Price: $34.99</p>
								<p>Brand: Levis</p>

								<hr>
								
								<form action="add_cart.php" method="post">
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="quantity">Quantity:</label>
												<input class="form-control" id="quantity" type="text" name="quantity">
											</div>
										</div>

										<div class="col-sm-9">
											<div class="form-group">
												<label for="size">Size:</label>
												<select name="size" class="form-control" id="size">
													<option value=""></option>
													<option value="28">28</option>
													<option value="32">32</option>
													<option value="36">36</option>
												</select>
											</div>
										</div>

										<div class="col-sm-12">
											<p><strong>Available: 3</strong></p>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div><!-- /.container-fluid -->
				</div><!-- /.modal-body -->

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
				</div>
			</div>
		</div>
	</div><!-- /.modal -->

	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(window).scroll( function() {
			var vscroll = $(this).scrollTop();
			//console.log(vscroll);
			$('#logotext').css({
				"transform" : "translate(0px, "+vscroll/2+"px)"
			});
			$('#back-flower').css({
				"transform" : "translate("+vscroll/5+"px, -"+vscroll/12+"px)"
			});
			$('#fore-flower').css({
				"transform" : "translate(0px, -"+vscroll/2+"px)"
			});
		});
	</script>
</body>
</html>