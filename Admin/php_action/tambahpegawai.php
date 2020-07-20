<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$idpegawai = $_POST['idpegawai'];
	$username = $_POST['username'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$level = $_POST['level'];
	$alamat = $_POST['alamat'];

	$sql = "INSERT INTO pegawai VALUES ('', '$username', '$nama_lengkap', '$email', '$password', '$level', '$alamat')";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";
		echo "<script>
			alert('Data pegawai Berhasil ditambahkan');
		</script>";
		header('Location: ../pegawai.php');
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the member information";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}