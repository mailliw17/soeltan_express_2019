<?php 

require_once 'fungsiad.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['noktp'];
	$name = $_POST['nama'];
	$address = $_POST['alamat'];
	$contact = $_POST['email'];
	$jeniskel = $_POST["jeniskel"];
	$nomor = $_POST["nohp"];

	$sql = "UPDATE mini_admin SET name = '$name', email = '$contact', alamat = '$address', jenis_kel= '$jeniskel', no_hp='$nomor' WHERE no_ktp = $id";
	$query = $conn->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the member information";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}