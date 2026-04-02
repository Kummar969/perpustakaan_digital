document.querySelectorAll(".sidebar a").forEach(link => {
    link.addEventListener("click", function(e) {
        e.preventDefault();
        const url = this.href;
        document.querySelector(".page-content").classList.add("fade-out");
        setTimeout(() => {
            window.location.href = url;
        }, 250);
    });
});