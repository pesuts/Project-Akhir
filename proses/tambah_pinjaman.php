<?php
	include '../koneksi.php';
    include '../session.php';
    $id_user 			  = $_SESSION['id_user']; 
	$jenis_pinjaman		  = $_POST['jenis_pinjaman'];
    $jumlah_uang		  = $_POST['jumlah_uang'];
    $tenor		          = $_POST['tenor'];
    $jenis                = "M";
    $suku_bunga = 0;
    if($jenis_pinjaman == "KUR"){
        $suku_bunga = $jumlah_uang * 0.06;
    }else if($jenis_pinjaman == "KPR"){
        $suku_bunga = $jumlah_uang * 0.08;
    }else{
        $suku_bunga = $jumlah_uang * 0.05;;
    }
    $keterangan		= $_POST['keterangan'];
    $keterangan 	= "Mendapat program pinjaman $jenis_pinjaman senilai Rp. $jumlah_uang ($keterangan)";

	$sql	    = "INSERT INTO `pinjaman`(`jenis_pinjaman`, `jumlah_uang`, `tenor`, `suku_bunga`, `keterangan`, `jenis`, `id_user`) 
        VALUES('$jenis_pinjaman', $jumlah_uang, $tenor, $suku_bunga, '$keterangan', '$jenis', $id_user)";

	$query	    = mysqli_query($connect, $sql) or die(mysqli_error($connect));

    $sql2       = "SELECT id_pinjaman FROM pinjaman ORDER BY id_pinjaman DESC LIMIT 1";
	$query2	    = mysqli_query($connect, $sql2);
	
	while($data = mysqli_fetch_array($query2)){
		$id     = $data['id_pinjaman'];
	}

	if($query && $query2) {
        header("location: mutasi_proses.php?id=$id&kode_transaksi=pinjam");
	} else {
		echo "Input Data Gagal.";
	}
?>