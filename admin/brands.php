<?php
	require_once '../core/init.php';
	include 'includes/head.php';
	include 'includes/navigation.php';
	$results = $db->query("SELECT * FROM brand ORDER BY brand");
?>
<h2 class="text-center">Brands</h2>
<table class="table table-bordered table-striped table-auto">
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