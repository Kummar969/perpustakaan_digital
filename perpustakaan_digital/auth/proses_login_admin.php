<?php
session_start();
include "../config/koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_assoc($query);
if($data){
    $_SESSION['admin_id'] = $data['id'];
    $_SESSION['username'] = $data['username'];
    header("Location: ../dashboard/dashboard.php");
    exit;
}else{
    echo "<script>
        alert('Username atau Password salah!');
        window.location='login_admin.php';
    </script>";
    }
?>