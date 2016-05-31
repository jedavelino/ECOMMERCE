<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/ecommerce/core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';

	$errors = array();

	// Delete
	if(isset($_GET['delete']) && !empty($_GET['delete'])) {
		$delete_id = (int)$_GET['delete'];
		$delete_id = sanitize($delete_id);

		// Deleting a parent and its children to avoid orphaned categories.
		$result = $db->query("SELECT * FROM categories WHERE id = '{$delete_id}'");
		$category = mysqli_fetch_assoc($result);
		if($category['parent'] == 0) {
			$db->query("DELETE FROM categories WHERE parent = '{$delete_id}'");
			header("Location: categories.php");
		}

		// Deleting a child only.
		$db->query("DELETE FROM categories WHERE id = '{$delete_id}'");
		header("Location: categories.php");
	}

	// Process form
	if(isset($_POST) && !empty($_POST)) {
		$parent = sanitize($_POST['parent']);
		$category = sanitize($_POST['category']);

		$fresult = $db->query("SELECT * FROM categories WHERE category = '{$category}' AND parent = '{$parent}'");
		$count = mysqli_num_rows($fresult);
		
		// Check if category input is blank.
		if($category == '') {
			$errors[] .= 'The category cannot be left blank.';
		}

		// Check if category inputted has already exist in database.
		if($count > 0) {
			$errors[] .= $category.' already exists. Please choose a new category.';
		}

		// Display errors or add/update database.
		if(!empty($errors)) {
			// Display errors.
			$display = display_errors($errors);
?>
		<script>
			jQuery('document').ready(function() {
				jQuery('#errors').html('<?php echo $display; ?>');
			});
		</script>
<?php
		} else {
			// Add/update database.
			$updatesql = "INSERT INTO categories (category, parent) VALUES ('{$category}', '{$parent}')";
			$db->query($updatesql);
			header("Location: categories.php");
		}
	}
?>
<h2 class="text-center">Categories</h2>
<hr>

<div class="row">

	<!-- Form -->
	<div class="col-md-6">
		<form class="form" action="categories.php" method="post">
			<legend>Add A Category</legend>
			<div id="errors"></div>

			<div class="form-group">
				<label for="parent">Parent</label>
				<select class="form-control" name="parent" id="parent">
					<option value="0">Parent</option>
					<?php $result = $db->query("SELECT * FROM categories WHERE parent = 0"); ?>
					<?php while($parent = mysqli_fetch_assoc($result)) : ?>
					<option value="<?php echo $parent['id']; ?>"><?php echo $parent['category']; ?></option>
					<?php endwhile; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="category">Category</label>
				<input class="form-control" type="text" name="category" id="category">
			</div>
			<div class="form-group">
				<input class="btn btn-success" type="submit" value="Add Category">
			</div>
		</form>
	</div>
	
	<!-- Category Table -->
	<div class="col-md-6">
		<table class="table table-bordered table-condensed">
			<thead>
				<th>Category</th>
				<th>Parent</th>
				<th></th>
			</thead>
			<tbody>
				<?php $result = $db->query("SELECT * FROM categories WHERE parent = 0"); ?>
				<?php while($parent = mysqli_fetch_assoc($result)) : ?>
				<?php
					$parent_id = (int)$parent['id'];
					$cresult = $db->query("SELECT * FROM categories WHERE parent = '{$parent_id}'");
				?>
				<tr class="bg-primary">
					<td><?php echo $parent['category']; ?></td>
					<td>Parent</td>
					<td>
						<a class="btn btn-xs btn-default" href="categories.php?edit=<?php echo $parent['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
						<a class="btn btn-xs btn-default" href="categories.php?delete=<?php echo $parent['id']; ?>"><span class="glyphicon glyphicon-remove-sign"></span></a>
					</td>
				</tr>
					<?php while($child = mysqli_fetch_assoc($cresult)) : ?>
						<tr class="bg-info">
							<td><?php echo $child['category']; ?></td>
							<td><?php echo $parent['category']; ?></td>
							<td>
								<a class="btn btn-xs btn-default" href="categories.php?edit=<?php echo $child['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
								<a class="btn btn-xs btn-default" href="categories.php?delete=<?php echo $child['id']; ?>"><span class="glyphicon glyphicon-remove-sign"></span></a>
							</td>
						</tr>
					<?php endwhile; ?>
				<?php endwhile; ?>
			</tbody>
		</table>
	</div>	
</div>

<?php
	include 'includes/footer.php';