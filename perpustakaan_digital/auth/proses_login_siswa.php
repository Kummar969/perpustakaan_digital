<?php
session_start();
include "../config/koneksi.php";
if(isset($_POST['nisn']) && isset($_POST['password'])){
    $nisn = $_POST['nisn'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "
        SELECT * FROM siswa 
        WHERE nisn='$nisn' AND password='$password'
    ");
    $data = mysqli_fetch_assoc($query);
    if ($data) {
        $_SESSION['siswa_id'] = $data['id'];
        $_SESSION['nisn'] = $data['nisn'];
        $_SESSION['nama'] = $data['nama'];
        header("Location: ../siswa/dashboard_siswa.php");
        exit;
    } else {
        echo "<script>
        alert('Login gagal! NISN atau Password salah');
        window.location='../auth/login.php';
        </script>";
    }
}else{
    header("Location: ../auth/login.php");
    exit;
}
?>