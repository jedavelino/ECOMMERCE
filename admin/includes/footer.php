</div><!-- .container-fluid -->

<!-- Footer -->
<footer class="text-center" id="footer">
	&copy; Copyright 2016 Shaunta's Boutique
</footer>

<script>
	function updateSizes() {
		var sizeString = '';
		for(var i = 1; i <= 12; i++) {
			if(jQuery('#size'+i).val() != '') {
				sizeString += jQuery('#size'+i).val()+':'+jQuery('#qty'+i).val()+','; // example output: small:7,medium:8,
			}
		}
		jQuery('#sizes').val(sizeString);
	}

	function get_child_options() {
		var parentID = jQuery('#parent').val();
		jQuery.ajax({
			url: '/ecommerce/admin/parsers/child_categories.php',
			type: 'post',
			data: {parentID : parentID},
			success: function(data) {
				jQuery('#child').html(data);
			},
			error: function() {
				alert("Something went wrong with the child options!");
			},
		});
	}
	jQuery('select[name="parent"]').change(get_child_options);
</script>

</body>
</html>