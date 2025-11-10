<?php
	include '../koneksi.php';
	include '../session.php';
	$id_user 			= $_SESSION['id_user']; 
	$jenis_investasi    = $_POST['jenis_investasi'];
    $jumlah_uang		= $_POST['jumlah_uang'];
    $jangka_waktu		= $_POST['lama_investasi'];
    $keterangan		    = $_POST['keterangan'];
	$keterangan 		= "Melakukan investasi $jenis_investasi senilai Rp. $jumlah_uang dalam jangka $jangka_waktu ($keterangan)";
    $jenis              = "K";

	$sql		= "INSERT INTO `investasi`(`jenis_investasi`, `jumlah_uang`, `jangka_waktu`, `keterangan`, `jenis`, `id_user`) 
        VALUES('$jenis_investasi', $jumlah_uang, $jangka_waktu, '$keterangan', '$jenis', $id_user)";

	$query		= mysqli_query($connect, $sql);

    $sql2 	= "SELECT id_investasi FROM investasi ORDER BY id_investasi DESC LIMIT 1";
	$query2		= mysqli_query($connect, $sql2);
	
	while($data = mysqli_fetch_array($query2)){
		$id 	= $data['id_investasi'];
	}

	if($query && $query2) {
        header("location: mutasi_proses.php?id=$id&kode_transaksi=investasi");
	} else {
		echo "Input Data Gagal.";
	}
?>