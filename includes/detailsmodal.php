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