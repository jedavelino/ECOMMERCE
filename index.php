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

	<p style="height: 1000px;">
	</p>


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