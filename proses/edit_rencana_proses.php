<?php
	include '../koneksi.php';
    include '../session.php';
    $id_dream        = $_POST['id_dream'];
    $rencana         = $_POST['rencana'];
    $biaya           = $_POST['biaya'];
    $tabungan_bulan  = $_POST['tabungan_bulan'];
    $keterangan      = $_POST['keterangan'];
    $keterangan 	 = "Membuat perencanaan: $rencana senilai Rp. $jumlah_uang ($keterangan)";
    $dana_terkumpul  = $_POST['dana_terkumpul'];
    $tenor           = ($biaya - $dana_terkumpul) / $tabungan_bulan;
	$sql	= "UPDATE dream SET rencana = '$rencana', jumlah_uang = $biaya, tabungan_bulan = $tabungan_bulan, 
        dana_terkumpul = $dana_terkumpul, tenor = $tenor, keterangan = '$keterangan' WHERE id_dream = $id_dream";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if($query) {
		header("location: ../dream.php");
	} else {
		echo "Input Data Gagal.";
	}
?>