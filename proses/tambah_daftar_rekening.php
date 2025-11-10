<?php
	include '../koneksi.php';
	include '../session.php';
	$id_user 		= $_SESSION['id_user']; 
    $nomor_rekening = $_POST['nomor_rekening'];
    $nama 			= $_POST['nama'];
    $bank 			= $_POST['bank'];
	
    $sql	= "INSERT INTO `daftar_rekening`(`nomor_rekening`, `nama`, `bank`, `id_user`) 
        VALUES($nomor_rekening, '$nama', '$bank', $id_user)";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if($query) {
		header("location: ../transaksi.php");
	} else {
		echo "Hapus Data Gagal.";
	}
?>