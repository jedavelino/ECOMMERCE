<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/ecommerce/core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';

	if(isset($_GET['add'])) {
	$brandQuery = $db->query("SELECT * FROM brand ORDER BY brand");
	$parentQuery = $db->query("SELECT * FROM categories WHERE parent = 0 ORDER BY category");
?>


<!-- Form -->
<h2 class="text-center">Add A New Product</h2>
<hr>

<form class="form" action="products.php?add=1" method="post" enctype="multipart/form-data">
	<div class="form-group col-md-3">
		<label for="title">Title*:</label>
		<input class="form-control" type="text" name="title" id="title" value="<?php echo ((isset($_POST['title']))?sanitize($_POST['title']) : ''); ?>">
	</div>
	<div class="form-group col-md-3">
		<label for="brand">Brand*:</label>
		<select class="form-control" name="brand" id="brand">
			<option value=""<?php echo ((isset($_POST['brand']) && $_POST['brand'] == '')?' selected' : ''); ?>></option>
			<?php while($brand = mysqli_fetch_assoc($brandQuery)) : ?>
			<option value="<?php echo $brand['id']; ?>"<?php echo ((isset($_POST['brand']) && $_POST['brand'] == $brand['id'])?' selected' : ''); ?>><?php echo $brand['brand']; ?></option>
			<?php endwhile; ?>
		</select>
	</div>
	<div class="form-group col-md-3">
		<label for="parent">Parent Category*:</label>
		<select class="form-control" name="parent" id="parent">
			<option value=""<?php echo ((isset($_POST['parent']) && $_POST['parent'] == '')?' selected' : ''); ?>></option>
			<?php while($parent = mysqli_fetch_assoc($parentQuery)) : ?>
			<option value="<?php echo $parent['id']; ?>"<?php echo ((isset($_POST['parent']) && $_POST['parent'] == $parent['id'])?' selected' : ''); ?>><?php echo $parent['category']; ?></option>
			<?php endwhile; ?>
		</select>
	</div>
	<div class="form-group col-md-3">
		<label for="child">Child Category*:</label>
		<select class="form-control" name="child" id="child"></select>
	</div>
	<div class="form-group col-md-3">
		<label for="price">Price*:</label>
		<input class="form-control" type="text" name="price" id="price" value="<?php echo ((isset($_POST['price']))?$_POST['price'] : ''); ?>">
	</div>
	<div class="form-group col-md-3">
		<label for="list_price">List Price*:</label>
		<input class="form-control" type="text" name="list_price" id="list_price" value="<?php echo ((isset($_POST['list_price']))?sanitize($_POST['list_price']) : ''); ?>">
	</div>
	<div class="form-group col-md-3">
		<label>Quantity &amp; Sizes*:</label>
		<button class="btn btn-default form-control" onclick="jQuery('#sizesModal').modal('toggle');return false;">Quantity &amp; Sizes</button>
	</div>
	<div class="form-group col-md-3">
		<label for="sizes">Sizes &amp; Quantity Preview</label>
		<input class="form-control" type="text" name="sizes" id="sizes" value="<?php echo ((isset($_POST['sizes']))?$_POST['sizes'] : ''); ?>" readonly>
	</div>
	<div class="form-group col-md-6">
		<label for="photo">Product Photo:</label>
		<input class="form-control" type="file" name="photo" id="photo">
	</div>
	<div class="form-group col-md-6">
		<label for="description">Description</label>
		<textarea class="form-control" name="description" id="description" rows="6"><?php echo ((isset($_POST['description']))?sanitize($_POST['description']) : ''); ?></textarea>
	</div>
	<div class="form-group col-md-2 pull-right">
		<input class="form-control btn btn-success pull-right" type="submit" value="Add Product">
	</div>
	<div class="clearfix"></div>
</form>


<?php
	} else {

	$presults = $db->query("SELECT * FROM products WHERE deleted = 0");
	if(isset($_GET['featured'])) {
		$id = (int)$_GET['id'];
		$featured = (int)$_GET['featured'];
		$db->query("UPDATE products SET featured = '{$featured}' WHERE id = '{$id}'");
		header("Location: products.php");
	}
?>


<!-- Table -->
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
	}
	include 'includes/footer.php';