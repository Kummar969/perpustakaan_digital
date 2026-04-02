function updateClock(){
    const now = new Date();
    const jam = now.getHours().toString().padStart(2,"0");
    const menit = now.getMinutes().toString().padStart(2,"0");
    const detik = now.getSeconds().toString().padStart(2,"0");
        document.getElementById("clock").innerHTML = jam + ":" + menit + ":" + detik;
    const hari = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
    const bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
    document.getElementById("date").innerHTML = hari[now.getDay()] + ", " + now.getDate() + " " + bulan[now.getMonth()] + " " + now.getFullYear();
}

setInterval(updateClock,1000);
    const particles = document.querySelector(".particles");
        for(let i=0;i<60;i++){
            let span = document.createElement("span");
                span.style.left = Math.random()*100+"%";
                span.style.animationDuration = (10 + Math.random()*10)+"s";
                span.style.opacity = Math.random();
                    particles.appendChild(span);
}