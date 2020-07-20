<?php 



$conn = mysqli_connect("localhost", "root", "", "soeltanexpress");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[]=$row;
	}
	return $rows;
}

function upload(){

	$namaFile = $_FILES['file_gambar']['name'];
	$ukuranFile = $_FILES['file_gambar']['size'];
	$error = $_FILES['file_gambar']['error'];
	$tmpName = $_FILES['file_gambar']['tmp_name'];

	//cek ada gambar upload aau nggak 
	if($error === 4){
		echo " <script> 
				alert('pilih gambar euy');
				</script>
		";
		return false;
	}

	//cek itu gambar atau bukan wkwkw
	$ekstensiGambarvalid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if(!in_array($ekstensiGambar, $ekstensiGambarvalid)){
				echo " <script> 
				alert('jangan jahad anda');
				</script>
		";
		return false;
	}

	//cek jika ukurannya terlalu besar
	if($ukuranFile > 1000000){
		echo " <script> 
				alert('besar amat gambarnya wkwk');
				</script>
		";
		return false;
	}

	//lolos penngecekan gambarnya siap upload
	move_uploaded_file($tmpName,  '../../custum/img/' .  $namaFile);

	return $namaFile;
}

function ubahma($data){
	global $conn;

	$ktp = $data['noktp'];
	$nama = $data["nama"];
	$email = $data["email"];
	$alamat = $data["alamat"];
	$nomor = $data["no_hp"];


	$query = "UPDATE mini_admin SET
			nama = '$nama',
			email = '$email',
			alamat = '$alamat',
			no_hp ='$nomor'
			WHERE no_ktp=$ktp;
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function updateresi($data){
	global $conn;

	$resi = $data["resi"];


}

function tambahpengiriman($data){
	global $conn;

	$namap = $data['namapengirim'];
	$alamatp = $data["alamatpengirim"];
	$nomorp = $data["nomorpengirim"];
	$namapn = $data["namapenerima"];
	$alamatpn = $data["alamatpenerima"];
	$nomorpn = $data["nomorpenerima"];
	$note = $data["note"];
	$apasih =0;
	$hurup = "abcde";
	$hurupp = str_shuffle($hurup);
	$nomer = "12345";
	$nomerr = str_shuffle($nomer);

	$has = $hurupp.$nomerr;

	$query = "INSERT INTO resi VALUES
			('','$has', '$apasih', '$namap', '$alamatp', '$nomorp', '$namapn', '$alamatpn', '$nomorpn', '$note')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
