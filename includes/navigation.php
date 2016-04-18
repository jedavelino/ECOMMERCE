<?php
	$sql = "SELECT * FROM categories WHERE parent = 0";
	$pquery = $db->query($sql);
?>
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
				<?php while($parent = mysqli_fetch_assoc($pquery)) : ?>
				<?php 
					$parent_id = $parent['id'];
					$sql2 = "SELECT * FROM categories WHERE parent = '$parent_id'";
					$cquery = $db->query($sql2);
				?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $parent['category']; ?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<?php while($child = mysqli_fetch_assoc($cquery)) : ?>
						<li><a href="#"><?php echo $child['category']; ?></a></li>
						<?php endwhile; ?>
					</ul>
				</li>
				<?php endwhile; ?>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container -->
</nav>