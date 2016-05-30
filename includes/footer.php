	</div><!-- /.container -->


	<!-- Footer -->
	<footer class="text-center" id="footer">
		&copy; Copyright 2016 Shaunta's Boutique
	</footer>

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

		function detailsmodal(id) {
			var data = {"id" : id};
			// send data to detailsmodal.php
			jQuery.ajax({
				url		: '/ecommerce/includes/detailsmodal.php',
				method	: "post",
				data	: data,
				success	: function(data){
					jQuery('body').append(data);
					jQuery('#details-modal').modal('toggle');
				},
				error	: function(){
					alert("Something went wrong!");
				}
			});
		}
	</script>
</body>
</html>