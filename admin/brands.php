<?php
	require_once '../core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';
	$results = $db->query("SELECT * FROM brand ORDER BY brand");
	$errors = array();
	if(isset($_POST['add_submit'])) {
		$brand = sanitize($_POST['brand']);
		// Check if brand is blank
		if($brand == '') {
			$errors[] .= 'You must enter a brand!';
		}
		// Check if brand exist in database
		$result = $db->query("SELECT * FROM brand WHERE brand = '$brand'");
		$count = mysqli_num_rows($result);
		if($count > 0) {
			$errors[] .= $brand.' already exist. Please choose another brand name.';
		}
		// Display errors
		if(!empty($errors)) {
			echo display_errors($errors);
		} else {
			// Add brand to database
			$sql = "INSERT INTO brand (brand) VALUES ('$brand')";
			$db->query($sql);
			header('Location: brands.php');
		}
	}
?>
<h2 class="text-center">Brands</h2>
<hr>

<div class="text-center">
	<form class="form-inline" action="brands.php" method="post">
		<div class="form-group">
			<label for="brand">Add A Brand:</label>
			<input class="form-control" type="text" name="brand" id="brand" value="<?php echo ((isset($_POST['brand']))?$_POST['brand'] : ''); ?>">
			<input class="btn btn-success" type="submit" name="add_submit" value="Add Brand">
		</div>
	</form>
</div>
<hr>

<table class="table table-bordered table-striped table-auto table-condensed">
	<thead>
		<th></th>
		<th>Brand</th>
		<th></th>
	</thead>
	<tbody>
		<?php while($brand = mysqli_fetch_assoc($results)) : ?>
		<tr>
			<td><a class="btn btn-xs btn-default" href="brands.php?edit=<?php echo $brand['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
			<td><?php echo $brand['brand']; ?></td>
			<td><a class="btn btn-xs btn-default" href="brands.php?delete=<?php echo $brand['id']; ?>"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>

<?php
	include 'includes/footer.php';