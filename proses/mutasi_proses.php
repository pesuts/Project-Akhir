<?php

include "../koneksi.php";
include '../session.php';
$id_user = $_SESSION['id_user']; 
$id      = $_GET['id'];
$kode_transaksi = $_GET['kode_transaksi'];
if ($kode_transaksi == "transfer") {
    $ambil = "transaksi";
    $kode_id = "id_transaksi";
} else if ($kode_transaksi == "pinjam") {
    $ambil = "pinjaman";
    $kode_id = "id_pinjaman";
} else if ($kode_transaksi == "investasi") {
    $ambil = "investasi";
    $kode_id = "id_investasi";
} else if ($kode_transaksi == "dream") {
    $ambil = "dream";
    $kode_id = "id_dream";
}

$sql    = "SELECT * FROM $ambil WHERE $kode_id = $id";
$query    = mysqli_query($connect, $sql);

while ($data = mysqli_fetch_array($query)) {
    $tanggal = $data['tanggal'];
    $jumlah_uang = $data['jumlah_uang'];
    $keterangan = $data['keterangan'];
    $jenis = $data['jenis'];
}

$sql2    = "INSERT INTO mutasi(tanggal, keterangan, jenis, jumlah_uang, id_user) 
		VALUES('$tanggal', '$keterangan', '$jenis', '$jumlah_uang', $id_user)";

$query2   = mysqli_query($connect, $sql2);

if ($kode_transaksi == "transfer") {
    header("location: ../transaksi.php");
} else if ($kode_transaksi == "pinjam") {
    header("location: ../pinjaman.php");
} else if ($kode_transaksi == "investasi") {
    header("location: ../investasi.php");
} else if ($kode_transaksi == "dream") {
    header("location: ../dream.php");
}
