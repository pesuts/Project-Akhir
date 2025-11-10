<?php
	include '../koneksi.php';
    include '../session.php';

    $rekening       = $_SESSION['rekening'];
    $nama_depan     = $_POST['nama_depan'];
    $nama_blkg      = $_POST['nama_blkg'];
    $tempat_L       = $_POST['tempat_L'];
    $tanggal_L      = $_POST['tanggal_L'];
    $jenis_id       = $_POST['jenis_id'];
    $nomor_id       = $_POST['nomor_id'];
    $alamat         = $_POST['alamat'];
    $kode_pos       = $_POST['kode_pos'];
    $penghasilan    = $_POST['penghasilan'];
    $pekerjaan      = $_POST['pekerjaan'];
    $no_telp1       = $_POST['no_telp1'];
    $no_telp2       = $_POST['no_telp2'];

	$sql	= "UPDATE rekening SET nama_depan = '$nama_depan', nama_blkg = '$nama_blkg', tempat_L = '$tempat_L', 
        tanggal_L = '$tanggal_L', jenis_id = '$jenis_id', nomor_id = '$nomor_id', alamat = '$alamat', 
        kode_pos = '$kode_pos', penghasilan = '$penghasilan', pekerjaan = '$pekerjaan', no_telp1 = '$no_telp1', 
        no_telp2 = '$no_telp2' WHERE nomor_rekening = '$rekening'";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if($query) {
		header("location: ../home.php");
	} else {
		echo "Input Data Gagal.";
	}
?>