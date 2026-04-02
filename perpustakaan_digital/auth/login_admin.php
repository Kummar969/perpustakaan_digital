<!DOCTYPE html>
    <html>
        <head>
            <title>Login Admin</title>
            <link rel="stylesheet" href="../assets/css/login_admin_glass.css">
            <link rel="stylesheet" href="../assets/css/solar_system.css">
        </head>
    <body>
        <div class="nebula"></div>
        <div class="stars"></div>
        <div class="solar-system">
        <div class="sun"></div>
        <div class="orbit mercury">
        <div class="planet mercury"></div>
        </div>
    
        <div class="orbit venus">
        <div class="planet venus"></div>
        </div>
    
        <div class="orbit earth">
        <div class="planet earth"></div>
        </div>
    
        <div class="orbit mars">
        <div class="planet mars"></div>
        </div>
    
        <div class="orbit jupiter">
        <div class="planet jupiter"></div>
        </div>
    
        <div class="orbit saturn">
        <div class="planet saturn"></div>
        </div>
    
        <div class="orbit uranus">
        <div class="planet uranus"></div>
        </div>
    
        <div class="orbit neptune">
        <div class="planet neptune"></div>
        </div>
    </div>

    <div class="particles"></div>
    <div class="clock-box">
    <div id="clock"></div>
    <div id="date"></div>
    </div>
    
    <div class="login-box">
        <h2>📚 Login Admin</h2>
            <form action="proses_login_admin.php" method="POST">
            <input type="text" name="username" placeholder="Username Admin" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
            </form>
    <p class="info">Simulasi Sistem Perpustakaan Digital <br> SMKS Sinar Husni <br> design by: acek / pvaldoo_</p>
</div>
    <script src="../assets/js/login_admin.js"></script>
<script>
function createAsteroid(){
    const asteroid = document.createElement("div");
    asteroid.classList.add("asteroid");
    document.body.appendChild(asteroid);
    let startY = Math.random() * window.innerHeight;
    asteroid.style.top = startY + "px";
    asteroid.style.left = "-50px";
    asteroid.style.animation =
        "asteroidMove " + (3 + Math.random()*3) + "s linear";
    setTimeout(()=>{
        asteroid.remove();
    },6000);
}
setInterval(()=>{
    createAsteroid();
},4000);
</script>
</body>
</html>