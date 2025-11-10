<?php
    session_start();

    include '../koneksi.php';
    include '../session.php';
    $email      = $_POST['email'];
    $password   = $_POST['password'];

    $sql    = "SELECT * FROM user WHERE email = '$email'";
    $query  = mysqli_query($connect, $sql);
    $cek    = mysqli_num_rows($query);

    if($cek > 0){
        while($data = mysqli_fetch_array($query)){
            if($data['password'] == $password){
                $_SESSION['rekening'] = $data['nomor_rekening'];
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['status'] = "login";
                header("location: ../home.php");
            }
            else{
                header("location: ../login.php?message=password_salah");
            }
        }
    }
    else{
        header("location: ../login.php?message=username_salah");
    }
?>