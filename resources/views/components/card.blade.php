<div class="h-60 w-40 bg-slate-300 rounded-xl py-2 hover:scale-110 transition-all delay-75" onclick="showPopup('{{$judul}}','{{$jmlhalaman}}','{{$penerbit}}','{{$kategori}}','{{$tahun}}','{{$penulis}}','{{$desc}}')">
        <div class="grid gap-6">
            <div class="flex justify-center">
                <img src="{{ asset('images/' . $img) }}" class="w-2/4" alt="">
            </div>
            <div>
                <p class="truncate-text">{{ $judul }}</p>
                <p class="text-ellipsis whitespace-nowrap text-green-500">{{ $kategori }}</p>
            </div>
        </div>
    </div>

    <script>
         function showPopup(nama, halaman, penerbit, kategori, tahun, penulis, deskripsi) {
            document.getElementById("popupNama").innerText = "Nama Buku: " + nama;
            document.getElementById("popupHalaman").innerText = "Jumlah Halaman: " + halaman;
            document.getElementById("popupPenerbit").innerText = "Penerbit: " + penerbit;
            document.getElementById("popupKategori").innerText = "Kategori: " + kategori;
            document.getElementById("popupTahun").innerText = "Tahun Terbit: " + tahun;
            document.getElementById("popupPenulis").innerText = "Penulis: " + penulis;
            document.getElementById("popupDeskripsi").innerText = "Deskripsi: " + deskripsi;

            document.getElementById("popupOverlay").style.display = "block";
            document.getElementById("popupDetail").style.display = "block";
        }
    </script>