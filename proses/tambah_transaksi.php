<?php
	include '../koneksi.php';
	include '../session.php';
	$id_user 			= $_SESSION['id_user']; 
	$jumlah_uang	 	= $_POST['jumlah_uang'];
    $rekening_tujuan 	= $_POST['rekening_tujuan'];
    $keterangan	 		= $_POST['keterangan'];
	$keterangan 		= "Transfer sejumlah Rp. $jumlah_uang ke Rekening $rekening_tujuan ($keterangan)";
	$jenis 			 	= "K";
	// $total			= $jumlah_uang;

	$sql	= "INSERT INTO transaksi(jumlah_uang, rekening_tujuan, keterangan, jenis, id_user) 
		VALUES($jumlah_uang, '$rekening_tujuan', '$keterangan', '$jenis', $id_user)";
	
	$query	= mysqli_query($connect, $sql);

	$sql2 = "SELECT id_transaksi FROM transaksi ORDER BY id_transaksi DESC LIMIT 1";
	$query2	= mysqli_query($connect, $sql2);
	
	
	while($data = mysqli_fetch_array($query2)){
		$id = $data['id_transaksi'];
	}

	if($query && $query2) {
		header("location: mutasi_proses.php?id=$id&kode_transaksi=transfer");
	} else {
		echo "Input Data Gagal.";
	}
?>