<?php 
require 'fungsiad.php';

$id = $_GET["idcus"];

if(hapuscus($id) > 0 ){
		echo "
			<script>
				alert('data berhasil dihapus');
				document.location.href = 'customer.php';
			</script>
		";
	}
	else{
		echo "
			<script>
				alert('data tidak berhasil dihapus ');
				document.location.href = 'customer.php';
			</script>
		";
	}

 ?>