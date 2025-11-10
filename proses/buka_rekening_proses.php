<?php
        session_start();

        include '../koneksi.php';
        
        $id_user        = $_POST['id_user'];
        $rekening       = "000" . strval(random_int(10000, 99999));
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
        
        $sql            = "INSERT INTO rekening VALUES('$rekening', '$nama_depan', '$nama_blkg', '$tempat_L', '$tanggal_L', 
                '$jenis_id', '$nomor_id', '$alamat', '$kode_pos', '$penghasilan', '$pekerjaan', 
                '$no_telp1', '$no_telp2')";
        $query	        = mysqli_query($connect, $sql);
        
        $sql2           = "UPDATE user SET nomor_rekening = '$rekening' WHERE id_user = $id_user";
        $query2	        = mysqli_query($connect, $sql2);
        
        if($query) {
                $_SESSION['rekening'] = $rekening;
                $_SESSION['id_user'] = $id_user;
                header("location: ../login.php");
        } else {
        header("location: ../register.php?message=failed");
        }
?>