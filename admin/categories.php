<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/ecommerce/core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';

	$errors = array();
	$category = '';
	$post_parent = '';

	// Edit
	if(isset($_GET['edit']) && !empty($_GET['edit'])) {
		$edit_id = (int)$_GET['edit'];
		$edit_id = sanitize($edit_id);
		$edit_result = $db->query("SELECT * FROM categories WHERE id = '{$edit_id}'");
		$edit_category = mysqli_fetch_assoc($edit_result);
	}

	// Delete
	if(isset($_GET['delete']) && !empty($_GET['delete'])) {
		$delete_id = (int)$_GET['delete'];
		$delete_id = sanitize($delete_id);

		/* Deleting a parent and its children to avoid orphaned categories in the database. */
		$result = $db->query("SELECT * FROM categories WHERE id = '{$delete_id}'");
		$category = mysqli_fetch_assoc($result);
		if($category['parent'] == 0) {
			$db->query("DELETE FROM categories WHERE parent = '{$delete_id}'");
			header("Location: categories.php");
		}

		/* Deleting a child only. */
		$db->query("DELETE FROM categories WHERE id = '{$delete_id}'");
		header("Location: categories.php");
	}

	// Add/Edit
	if(isset($_POST) && !empty($_POST)) {
		$post_parent = sanitize($_POST['parent']);
		$category = sanitize($_POST['category']);
		$sqlform = "SELECT * FROM categories WHERE category = '{$category}' AND parent = '{$post_parent}'";
		if(isset($_GET['edit'])) {
			$id = $edit_category['id'];
			$sqlform = "SELECT * FROM categories WHERE category = '{$category}' AND parent = '{$post_parent}' AND id != '{$id}'";
		}

		$fresult = $db->query($sqlform);
		$count = mysqli_num_rows($fresult);
		
		/* Check if category input is blank. */
		if($category == '') {
			$errors[] .= 'The category cannot be left blank.';
		}

		/* Check if category inputted has already exist in database. */
		if($count > 0) {
			$errors[] .= $category.' already exists. Please choose a new category.';
		}

		/* Display errors or add/update database. */
		if(!empty($errors)) {
			/* Display errors. */
			$display = display_errors($errors);
?>
		<script>
			jQuery('document').ready(function() {
				jQuery('#errors').html('<?php echo $display; ?>');
			});
		</script>
<?php
		} else {
			/* Add/update database. */
			$updatesql = "INSERT INTO categories (category, parent) VALUES ('{$category}', '{$post_parent}')";
			if(isset($_GET['edit'])) {
				$updatesql = "UPDATE categories SET category = '{$category}', parent = '{$post_parent}' WHERE id = '{$edit_id}'";
			}
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
		<form class="form" action="categories.php<?php echo ((isset($_GET['edit']))?'?edit='.$edit_id : ''); ?>" method="post">
			<legend><?php echo ((isset($_GET['edit']))?'Edit' : 'Add A'); ?> Category</legend>
			<div id="errors"></div>
			
			<?php
				$category_value = '';
				$parent_value = 0;
				if(isset($_GET['edit'])) {
					$category_value = $edit_category['category'];
					$parent_value = $edit_category['parent'];
				} else {
					/* If post is set during edit. */
					if(isset($_POST)) {
						$category_value = $category; /* $category is from line 37 */
						$parent_value = $post_parent; /* $post_parent is from line 36 */
					}
				}
			?>

			<div class="form-group">
				<label for="parent">Parent</label>
				<select class="form-control" name="parent" id="parent">
					<option value="0"<?php echo (($parent_value == 0)?' selected="selected"' : ''); ?>>Parent</option>
					<?php $result = $db->query("SELECT * FROM categories WHERE parent = 0"); ?>
					<?php while($parent = mysqli_fetch_assoc($result)) : ?>
					<option value="<?php echo $parent['id']; ?>"<?php echo (($parent_value == $parent['id'])?' selected="selected"' : ''); ?>><?php echo $parent['category']; ?></option>
					<?php endwhile; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="category">Category</label>
				<input class="form-control" type="text" name="category" id="category" value="<?php echo $category_value; ?>">
			</div>
			<div class="form-group">
				<input class="btn btn-success" type="submit" value="<?php echo ((isset($_GET['edit']))?'Edit' : 'Add'); ?> Category">
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