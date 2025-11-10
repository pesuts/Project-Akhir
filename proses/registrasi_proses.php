<?php
session_start();

        include '../koneksi.php';

        $email          = $_POST['email'];
        $password       = $_POST['password'];

        $sql_cek = "SELECT * FROM user WHERE email = '$email'";
        $querry_cek = $connect->query($sql_cek);

        $cek = mysqli_num_rows($querry_cek);

        if ($cek > 0){
                header("Location: ../registrasi.php?message=terdaftar");
        }

        // $rekening    =  "00" . strval(random_int(100000, 999999));

        // $sql         = "INSERT INTO user VALUES('$email', '$password', $rekening)";
        $sql            = "INSERT INTO user (id_user, email, password) VALUES('', '$email', '$password')";
	$query	        = mysqli_query($connect, $sql) or die(mysqli_error($connect));

        $sql2 	        = "SELECT id_user FROM user ORDER BY id_user DESC LIMIT 1";
	$query2	        = mysqli_query($connect, $sql2);
	
	while($data = mysqli_fetch_array($query2)){
		$id 	= $data['id_user'];
	}

	if($query) {
        // $_SESSION['rekening'] = $rekening;
        // $_SESSION['status'] = "login";
        header("location: ../buka_rekening.php?id_user=$id");
	} else {
        header("location: ../registrasi.php?message=failed");
	}
?>