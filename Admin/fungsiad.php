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

function tambahmini($data){
	global $conn;
	$no_ktp = htmlspecialchars($data["no_ktp"]);
	$username = htmlspecialchars($data["username"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$password = htmlspecialchars($data["password"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	$jenis_kel = htmlspecialchars($data["jenis_kel"]);


	$result = mysqli_query($conn, "SELECT no_ktp FROM mini_admin WHERE no_ktp = '$no_ktp'");
	if(mysqli_fetch_assoc($result)){
		echo "<script>	
		alert('No_KTP udah ada bang');
		</script>";
		return false;
	}

	$result = mysqli_query($conn, "SELECT username FROM mini_admin WHERE username = '$username'");
	if(mysqli_fetch_assoc($result)){
		echo "<script>	
		alert('user udah ada bang');
		</script>";
		return false;
	}

	$result = mysqli_query($conn, "SELECT email FROM mini_admin WHERE email = '$email'");
	if(mysqli_fetch_assoc($result)){
		echo "<script>	
		alert('email udah ada bang');
		</script>";
		return false;
	}


	$query = "INSERT INTO mini_admin
				VALUES
				('$no_ktp','$nama','$username','$email','$password','$alamat', '$jenis_kel ','$no_hp')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function tambahfaq($data){
	global $conn;
	$pertanyaan = htmlspecialchars($data["pertanyaan"]);
	$jawaban = htmlspecialchars($data["jawaban"]);

	$result = mysqli_query($conn, "SELECT pertanyaan FROM faq WHERE pertanyaan = '$pertanyaan'");
	if(mysqli_fetch_assoc($result)){
		echo "<script>	
		alert('pertanyaan udah ada bang');
		</script>";
		return false;
	}

	$query = "INSERT INTO faq
				VALUES
				('', '$pertanyaan', '$jawaban')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function tambahSK($data){
	global $conn;
		$nama = htmlspecialchars($data["nama"]);
		$dat = htmlspecialchars($data["idkategori"]);


	$result = mysqli_query($conn, "SELECT nama FROM sub_kategori WHERE nama = '$nama'");
	if(mysqli_fetch_assoc($result)){
		echo "<script>	
		alert('nama kategori udah ada bang');
		</script>";
		return false;
	}

	$query = "INSERT INTO sub_kategori
				VALUES
				('', '$nama','$dat')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function tambahgmbr($data){
	global $conn;
	global $wkwkw;
	$gambar = upload();
	if(!$gambar){
		return false;
	}

	$query = "INSERT INTO konten 
				VALUES
				('', '$gambar')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

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
	if($ukuranFile > 10000000){
		echo " <script> 
				alert('besar amat gambarnya wkwk');
				</script>
		";
		return false;
	}

	//lolos penngecekan gambarnya siap upload
	move_uploaded_file($tmpName,  '../customer/img/hero-slider/' .  $namaFile);

	return $namaFile;
}

function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM kategori WHERE idkategori = $id");
	return mysqli_affected_rows($conn);
}

function hapusmini($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM mini_admin WHERE no_ktp = $id");
	return mysqli_affected_rows($conn);
}

function hapusfaq($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM faq WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function hapuscus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM customer WHERE idcus = $id");
	return mysqli_affected_rows($conn);
}


function ubahcus($data){
	global $conn;

	$id = $data["idcus"];
	$user = htmlspecialchars($data["username"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$password = htmlspecialchars($data["password"]);
	$nomor = htmlspecialchars($data["no_hp"]);

	$query = "UPDATE customer SET
				username = '$user',
				nama = '$nama',
				email = '$email',
				alamat = '$alamat',
				password = '$password',
				no_hp = '$nomor'
				WHERE idcus = $id
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function ubahmini($data){
	global $conn;

	$id = $data["no_ktp"];
	$user = htmlspecialchars($data["username"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$password = htmlspecialchars($data["password"]);
	$nomor = htmlspecialchars($data["no_hp"]);

	$query = "UPDATE mini_admin SET
				username = '$user',
				nama = '$nama',
				email = '$email',
				alamat = '$alamat',
				password = '$password',
				no_hp = '$nomor'
				WHERE no_ktp=$id
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function ubahfaq($data){
	global $conn;

	$id = $data["id"];
	$pertanyaan = htmlspecialchars($data["pertanyaan"]);
	$jawaban = htmlspecialchars($data["jawaban"]);


	$query = "UPDATE faq SET
				pertanyaan = '$pertanyaan',
				jawaban = '$jawaban'
				WHERE id=$id
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function ubahabout($data){
	global $conn;

	$id = 1;
	$about = htmlspecialchars($data["about"]);


	$query = "UPDATE about SET
				about = '$about'
				WHERE id=$id
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function ubahpr($data, $ed){
	global $conn;
	global $wkwkw;
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
	$idsub_kategori = htmlspecialchars($data["idsub_kategori"]);
	$idpegawai = $ed;
	$harga = htmlspecialchars($data["harga"]);
	$deskripsiB = htmlspecialchars($data["deskripsiB"]);
	$gambarlama = htmlspecialchars($data["gambarlama"]);



	// apakah user pencet upoad gambar baru
	if($_FILES['gambar']['error'] === 4){
		$gambar = $gambarlama;
	}
	else{
		$gambar = upload();
	}

	$query = "UPDATE produk SET
				nama = '$nama',
				deskripsi = '$deskripsi',
				idsub_kategori = '$idsub_kategori',
				idpegawai = '$idpegawai',
				harga = '$harga',
				deskripsiB = '$deskripsiB',
				file_gambar = '$gambar'
				WHERE idproduk=$id
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function ubahus($data){
	global $conn;

	$ktp = $data["no_ktp"];
	$username = $data["username"];
	$nama = $data["nama"];
	$password = $data["password"];


			$query = "UPDATE admin SET
				username = '$username',
				nama = '$nama',
				password = '$password'
				WHERE no_ktp = $ktp
				";
	mysqli_query($conn, $query);


	return mysqli_affected_rows($conn);
}


?>