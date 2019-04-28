<script type="text/javascript">
	$(document).ready(function () {
		$('.sidebar-menu').tree()
	})

	$(document).ready(function(){
		$('.data').DataTable();
	});

	$('.tombol').DataTable( {
		dom: 'Bfrtip',
		buttons: [
		'copy', 'csv', 'excel', 'pdf', 'print'
		]
	} );
	$('.select2').select2()

	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' /* optional */
		});
	});
</script>

</body>
</html>

