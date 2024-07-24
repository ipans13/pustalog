<div id="popupOverlay" class="fixed hidden inset-0 top-0 left-0 h-full w-full bg-black bg-opacity-50 block justify-center items-center z-50 overflow-y-auto">
    <div class=" block sticky px-10 mt-12 top-1/4 left-1/4 -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg shadow-lg p-6 sm:w-1/3 overflow-y-auto">
    <div class=" flex justify-end">
               <button id="closePopup" onclick="hidePopup()" class=" text-gray-500 rounded hover:text-red-700">X</button>
               </div>      
    <h2 class="text-xl font-bold mb-4">Tambah Buku</h2>
           
       <form action="{{ route('addbooksaction') }}" method="post">
       @csrf
       <x-field nama="Judul Buku" id="judul"/>
       <x-field nama="Kategori Buku" id="kategori"/>
       <x-field nama="Jumlah Halaman" id="jml_halaman"/>
       <x-field nama="Penulis Buku" id="penulis"/>
       <x-field nama="Penerbit" id="penerbit"/>
       <x-field nama="Tahun Terbit" id="tahun"/>
       <x-field nama="Ringkasan Buku" id="desc"/>



<button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-red-700">Tambah</button>
</form>

<script>
    
</script>