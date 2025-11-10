<?php
	include '../koneksi.php';
	include '../session.php';
    $id_dream = $_GET['id'];
	
    $sql	= "DELETE FROM dream WHERE id_dream = '$id_dream'";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if($query) {
		header("location: ../dream.php");
	} else {
		echo "Hapus Data Gagal.";
	}
?>