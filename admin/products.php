<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/ecommerce/core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';

	$presults = $db->query("SELECT * FROM products WHERE deleted = 0");
	if(isset($_GET['featured'])) {
		$id = (int)$_GET['id'];
		$featured = (int)$_GET['featured'];
		//$featuredsql = "UPDATE products SET featured = '{$featured}' WHERE id = '{$id}'";
		$db->query("UPDATE products SET featured = '{$featured}' WHERE id = '{$id}'");
		header("Location: products.php");
	}
?>
<h2 class="text-center">Products</h2>
<a class="btn btn-success pull-right" id="add-product-btn" href="products.php?add=1">Add Product</a>
<div class="clearfix"></div>
<hr>

<table class="table table-bordered table-condensed table-striped">
	<thead>
		<th></th>
		<th>Product</th>
		<th>Price</th>
		<th>Category</th>
		<th>Featured</th>
		<th>Sold</th>
	</thead>
	<tbody>
		<?php while($product = mysqli_fetch_assoc($presults)) : 
			$childID = $product['categories'];
			$result = $db->query("SELECT * FROM categories WHERE id = '{$childID}'");
			$child = mysqli_fetch_assoc($result);
			$parentID = $child['parent'];
			$presult = $db->query("SELECT * FROM categories WHERE id = '$parentID'");
			$parent = mysqli_fetch_assoc($presult);
			$category = $parent['category'].' ~ '.$child['category'];
		?>
		<tr>
			<td>
				<a class="btn btn-xs btn-default" href="products.php?edit=<?php echo $product['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
				<a class="btn btn-xs btn-default" href="products.php?delete=<?php echo $product['id']; ?>"><span class="glyphicon glyphicon-remove"></span></a>
			</td>
			<td><?php echo $product['title']; ?></td>
			<td><?php echo money($product['price']); ?></td>
			<td><?php echo $category; ?></td>
			<td>
				<a class="btn btn-xs btn-default" href="products.php?featured=<?php echo (($product['featured'] == 0)?'1' : '0'); ?>&id=<?php echo $product['id']; ?>"><span class="glyphicon glyphicon-<?php echo (($product['featured'] == 1)?'minus': 'plus'); ?>"></span></a>&nbsp; <?php echo (($product['featured'] == 1)?'Featured Product' : ''); ?>
			</td>
			<td>0</td>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>


<?php
	include 'includes/footer.php';