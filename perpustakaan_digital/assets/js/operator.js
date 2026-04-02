        const editButtons = document.querySelectorAll(".openEditModal");
        const editModal = document.getElementById("editModal");
            editButtons.forEach(btn => {
                btn.addEventListener("click", () => {
                    editModal.style.display = "flex";
                        document.getElementById("editId").value = btn.dataset.id;
                        document.getElementById("editJudul").value = btn.dataset.judul;
                        document.getElementById("editPenulis").value = btn.dataset.penulis;
                        document.getElementById("editKategori").value = btn.dataset.kategori;
                        document.getElementById("editHalaman").value = btn.dataset.halaman;
                        document.getElementById("editStok").value = btn.dataset.stok;
                        document.getElementById("editTahun").value = btn.dataset.tahun;
                        document.getElementById("editPenerbit").value = btn.dataset.penerbit;
                        document.getElementById("editDeskripsi").value = btn.dataset.deskripsi;
                        document.getElementById("previewCover").src ="../uploads/cover/" + btn.dataset.cover; }); });
                        document.querySelector(".closeEdit").onclick = () => {
                        editModal.style.display = "none"; };
    
                        window.onclick = function(e) {
                            if(e.target == editModal){
                            editModal.style.display = "none"; }};

        const searchInput = document.getElementById("searchInput");
        const hasil = document.getElementById("hasilPencarian");
            searchInput.addEventListener("keyup", function(){
        let keyword = this.value;
            fetch("search_buku.php?cari=" + keyword)
            .then(response => response.text())
            .then(data => {
        hasil.innerHTML = data; }); });