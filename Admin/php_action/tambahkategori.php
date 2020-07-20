<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$idkategori = $_POST['idkategori'];
	$nama = $_POST['nama'];

	$sql = "INSERT INTO kategori VALUES ('', '$nama')";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";
		echo "<script>
			alert('Data pegawai Berhasil ditambahkan');
		</script>";
		header('Location: ../kategori.php');
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the member information";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}