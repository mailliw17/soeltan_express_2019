<?php 
require 'fungsiad.php';

$id = $_GET["no_ktp"];

if(hapusmini($id) > 0 ){
		echo "
			<script>
				alert('data berhasil dihapus');
				document.location.href = 'miniadmin.php';
			</script>
		";
	}
	else{
		echo "
			<script>
				alert('data tidak berhasil dihapus ');
				document.location.href = 'miniadmin.php';
			</script>
		";
	}

 ?>