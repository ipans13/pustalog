<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="bg-slate-20">
 <div class="container mx-auto ">
  <div class="px-6 pt-6 pb-10">
    <div class="flex text-center justify-between ">
      <p class="text-green-500 font-black text-3xl">PUSTALOG</p>
    <form class="">        
    <div class="relative w-full">
        <input type="search" name="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-50 border-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Cari Buku......" required />
    <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
    <span class="sr-only">Search</span>
</button>
</div>
</form>
    </div>
    
    <div class=" text-center pt-6 bg-slate-100 my-4 rounded-xl">
     <div class="border-b-[0.18rem] border-blue-400 mx-8 pb-2">
       <p class="uppercase text-blue-500 font-semibold ">Daftar Buku</p>
     </div>
     
     <div class="flex justify-end px-7 pt-4">
        <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Filter Dropdown</label>
    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">  Kategori Buku <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg></button>
<div id="dropdown" class="absolute mt-12 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
    <li>
            <a href="/" type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Semua Kategori</a>
        </li>
        @foreach ($kategories as $kategori)
        <li>
            <a href="/{{ $kategori->kategori }}" type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $kategori->kategori }}</a>
        </li>
        @endforeach
</ul>
</div>
</div>

     <div class="flex justify-center text-center py-6">
     @if($bukus->isEmpty())
            
                   <p>
                       Buku tidak ditemukan
                       </p> 
    @endif
       <div class="gap-10 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-5">
        @foreach($bukus as $buku)
         <x-card judul="{{ $buku->judul }}" kategori="{{ $buku->kategori->kategori }}" penerbit="{{ $buku->penerbit }}" penulis="{{ $buku->penulis }}" idreferensi="{{ $buku->id_referensi }}" jmlhalaman="{{ $buku->jml_halaman }}" tahun="{{ $buku->tahun }}" desc="{{ $buku->desc }}" img="{{ $buku->img }}"/>
         @endforeach
         </div>
     </div>
    </div>
  </div>
 </div>
 <div id="popupOverlay" class="fixed hidden inset-0 top-0 left-0 h-full w-full bg-black bg-opacity-50 block justify-center items-center z-50 overflow-y-auto">
    <div  id="popupDetail" class=" block sticky px-10 mt-12 top-1/4 left-1/4 bg-white rounded-lg shadow-lg p-6 sm:w-1/3 overflow-y-auto">
    <div class="flex justify-end">
        <button id="closePopup" onclick="hidePopup()" class=" text-red-800 font-bold rounded hover:text-red-700">X</button>
        </div>
    <div class="popup-content">
            <h2 id="popupNama"></h2>
            <p id="popupHalaman"></p>
            <p id="popupPenerbit"></p>
            <p id="popupKategori"></p>
            <p id="popupTahun"></p>
            <p id="popupPenulis"></p>
            <p id="popupDeskripsi"></p>
               
               </div>      
           
    </div>
    <script>
    
        function hidePopup() {
            document.getElementById("popupOverlay").style.display = "none";
            document.getElementById("popupDetail").style.display = "none";
        }

document.addEventListener('DOMContentLoaded', (event) => {
    const dropdownButton = document.getElementById('dropdown-button');
    const dropdown = document.getElementById('dropdown');

    dropdownButton.addEventListener('click', () => {
        dropdown.classList.toggle('hidden');
    });

    document.addEventListener('click', (e) => {
        if (!dropdownButton.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });
});

</script>

</body>