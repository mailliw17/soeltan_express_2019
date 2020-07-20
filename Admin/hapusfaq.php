<?php 
require 'fungsiad.php';

$id = $_GET["id"];

if(hapusfaq($id) > 0 ){
		echo "
			<script>
				alert('data berhasil dihapus');
				document.location.href = 'faq.php';
			</script>
		";
	}
	else{
		echo "
			<script>
				alert('data tidak berhasil dihapus ');
				document.location.href = 'faq.php';
			</script>
		";
	}

 ?>