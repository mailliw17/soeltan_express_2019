<?php 


$conn = mysqli_connect("localhost", "root", "", "soelthan_eksspress");

function registrasi($data){
	global $conn;

	$email = $data["email"];
	$pass = mysqli_real_escape_string($conn, $data["pass"]);
	$pass2 = mysqli_real_escape_string($conn, $data["pass2"]);
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$notelp = htmlspecialchars($data["notelp"]);
	$username = htmlspecialchars($data["username"]);

	//udah ada blom emailnya 
	$result = mysqli_query($conn, "SELECT email FROM customer WHERE email = '$email'");
	if(mysqli_fetch_assoc($result)){
		echo "<script>	
		alert('maaf email udah ada');
		</script>";
		return false;
	}

	$result = mysqli_query($conn, "SELECT username FROM customer WHERE username = '$username'");
	if(mysqli_fetch_assoc($result)){
		echo "<script>	
		alert('maaf username udah ada');
		</script>";
		return false;
	}

	//cek konfirmasi
	if($pass !== $pass2){
		echo "<script>	
		alert('maaf konfirmasi password salah');
		</script>";
		return false;

	}

	//enkripsi pass doloe pake pass_hash tapi mau update bedeng
	$pass = MD5($pass);

	//tambahkan user baru ke data base
	mysqli_query($conn, "INSERT INTO customer VALUES('','$nama', '$username', '$pass', '$email', '$alamat', '$notelp')");

	return mysqli_affected_rows($conn);
}
