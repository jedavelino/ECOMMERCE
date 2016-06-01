<?php
	require_once '../core/init.php';
	$id = $_POST['id'];
	$id = (int)$id;
	$result = $db->query("SELECT * FROM products WHERE id = '$id'");
	$product = mysqli_fetch_assoc($result);
	$brand_id = $product['brand'];
	$brand_query = $db->query("SELECT brand FROM brand WHERE id = '$brand_id'");
	$brand = mysqli_fetch_assoc($brand_query);
	$sizestring = $product['sizes'];
	$sizestring = rtrim($sizestring, ',');
	$size_array = explode(',', $sizestring);
?>

<!-- Details Modal -->
<?php ob_start(); ?>
<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onclick="closeModal()" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title text-center" id="myModalLabel"><?php echo $product['title']; ?></h4>
			</div>

			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<div class="center-block">
								<img class="details img-responsive" src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>">
							</div>
						</div>

						<div class="col-sm-6">
							<h4>Details</h4>
							<p><?php echo nl2br($product['description']); ?></p>
							<hr>
							<p>Price: $<?php echo $product['price']; ?></p>
							<p>Brand: <?php echo $brand['brand']; ?></p>

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
												<?php foreach($size_array as $string) {
													$string_array = explode(':', $string);
													$size = $string_array[0];
													$quantity = $string_array[1];
													echo '<option value="'.$size.'">'.$size.' ('.$quantity.' Available)</option>';
												} ?>
											</select>
										</div>
									</div>

								</div>
							</form>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</div><!-- /.modal-body -->

			<div class="modal-footer">
				<button type="button" class="btn btn-default" onclick="closeModal()">Close</button>
				<button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
			</div>
		</div>
	</div>
</div><!-- /.modal -->
<script>
	function closeModal() {
		jQuery('#details-modal').modal('hide');
		setTimeout(function(){
			jQuery('#details-modal').remove();
			jQuery('.modal-backdrop').remove();
		},500);
	}
</script>
<?php echo ob_get_clean();