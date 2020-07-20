<?php 

require_once 'db_connect.php';

$output = array('success' => false, 'messages' => array());

$idkategori = $_GET['idkategori'];

$sql = "DELETE FROM kategori WHERE idkategori = '$idkategori'";
$query = $connect->query($sql);
if($query === TRUE) {
	$output['success'] = true;
	$output['messages'] = 'Successfully removed';
	header("location:kategori.php");
} else {
	$output['success'] = false;
	$output['messages'] = 'Error while removing the member information';
}

// close database connection
$connect->close();

echo json_encode($output);