<?php
include '../koneksi.php';
include '../session.php';
$id_user 		 = $_SESSION['id_user']; 
$rencana         = $_POST['rencana'];
$jumlah_uang     = $_POST['jumlah_uang'];
$tabungan_bulan  = $_POST['tabungan_bulan'];
$keterangan      = $_POST['keterangan'];
$keterangan 	 = "Membuat perencanaan: $rencana senilai Rp. $jumlah_uang ($keterangan)";
$jenis           = "K";
$dana_terkumpul  = $_POST['setoran_awal'];
$tenor           = ($jumlah_uang-$dana_terkumpul)/$tabungan_bulan;

$sql        = "INSERT INTO `dream`(`rencana`, `jumlah_uang`, `tabungan_bulan`, `tenor`, `keterangan`, `dana_terkumpul`, `jenis`, `id_user`)
    VALUES('$rencana', $jumlah_uang, $tabungan_bulan, $tenor, '$keterangan', $dana_terkumpul, '$jenis', $id_user)";

$query      = mysqli_query($connect, $sql);

$sql2       = "SELECT id_dream FROM dream ORDER BY id_dream DESC LIMIT 1";
$query2	    = mysqli_query($connect, $sql2);


while($data = mysqli_fetch_array($query2)){
    $id     = $data['id_dream'];
}

$sql3	    = "INSERT INTO mutasi VALUES('', $id)";
$query3	    = mysqli_query($connect, $sql3);

if($query && $query2) {
    header("location: mutasi_proses.php?id=$id&kode_transaksi=dream");
} else {
    echo "Input Data Gagal.";
}
