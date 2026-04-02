<?php
session_start();
include "../config/koneksi.php";
if(isset($_POST['nisn']) && isset($_POST['password'])){
    $nisn = mysqli_real_escape_string($conn, $_POST['nisn']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $query = mysqli_query($conn,"
    SELECT * FROM siswa 
    WHERE nisn='$nisn' AND password='$password'
    ");
    if(mysqli_num_rows($query) > 0){
        echo "Login berhasil";
    } else {
        echo "NISN atau password salah";
    }
}
?>
<!DOCTYPE html>
  <html lang="id">
    <head>
    <title>Login Perpustakaan</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/login_siswa_baru.css">
</head>

<body>
    <style>
#particles-js{
    position:fixed;
    width:100%;
    height:100%;
    top:0;
    left:0;
    z-index:-1;
    background:#6a86a9;
}
</style>

  <div id="particles-js"></div>
    <div class="clock">
    <div id="time"></div>
    <div id="date"></div>
  </div>

  <div class="login-box">
    <h1>SELAMAT DATANG DI<br>PERPUSTAKAAN SMKS SINAR HUSNI</h1>
      <form action="proses_login_siswa.php" method="POST">
        <div class="input-group">
          <span class="icon">👤</span>
          <input type="text" name="nisn" placeholder="Masukkan NISN/NIS anda..." required>
        </div>

        <div class="input-group password-group">
          <span class="icon">🔒</span>
          <input type="password" name="password" id="password" placeholder="Masukkan Password anda..." required>
          <span class="toggle-password" onclick="togglePassword()">👁</span>
        </div>
      
        <button type="submit" class="btn-login" id="loginBtn"> LOGIN </button>
  </form>
      <div class="note"> *Note : NISN dan password bisa didapatkan dari pihak sekolah </div>
  </div>

<script>
function updateClock(){
  const now = new Date();
let jam = now.getHours().toString().padStart(2,'0');
let menit = now.getMinutes().toString().padStart(2,'0');
let detik = now.getSeconds().toString().padStart(2,'0');
document.getElementById("time").innerHTML =
jam+":"+menit+":"+detik;
const hari = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
const bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
let h = hari[now.getDay()];
let t = now.getDate();
let b = bulan[now.getMonth()];
let th = now.getFullYear();
document.getElementById("date").innerHTML =
h+", "+t+" "+b+" "+th;
}
setInterval(updateClock,1000);
updateClock();
function togglePassword(){
const password = document.getElementById("password");
if(password.type === "password"){
password.type = "text";
}else{
password.type = "password";
}
}
</script>
<script src="https://cdn.jsdelivr.net/npm/particles.js"></script>
<script>
particlesJS("particles-js", {
  particles: {
    number: {
      value: 70
    },
    color: {
      value: "#ffffff"
    },
    shape: {
      type: "circle"
    },
    opacity: {
      value: 0.4
    },
    size: {
      value: 3
    },
    move: {
      enable: true,
      speed: 1
    }
  },
  interactivity: {
    events: {
      onhover: {
        enable: true,
        mode: "repulse"
      }
    }
  }
});
</script>
</body>
</html>