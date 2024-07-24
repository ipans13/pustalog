<x-layout> 
<x-slot:title>Laporan</x-slot:title>  

<div>
        <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Filter Dropdown</label>
    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button"> Pilih Bulan Lainnya<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg></button>
<div id="dropdown" class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
        @foreach($pilihan as $bulans)
        <li>
            <a href="/laporan/{{$bulans['no_bulan']}}/{{$bulans['year']}}" type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $bulans['bulan']." ". $bulans['year']}}</a>
        </li>
        @endforeach
</div>

<x-headpart>Laporan Buku Masuk dan Keluar</x-headpart>   



<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama Buku
                </th>
                <th scope="col" class=" px-6 ">
                    penerbit
                </th>
                <th scope="col" class="px-6 py-3">
                    status
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal
                </th>
        </thead>
        <tbody>
        @foreach ($laporans as $laporan)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $laporan->judul}}
                </th>
                <td class="max-w-5 px-6 py-2">
                {{ $laporan->penerbit }}
                <td class="px-6 py-4 {{ $laporan->status == 'Masuk' ? 'text-green-600' : 'text-red-600' }}">
                {{ $laporan->status }}
                </td>
                <td class="px-6 py-4">

                {{ $laporan->created_at }}
                </td>
            </tr>
            @endforeach
            {{ $laporans->links() }}
        </tbody>
    </table>


</div>
<div class="flex justify-end px-8 py-4">
    @foreach ($laporanbulan as $laporan)
    <a href="/laporan/{{$laporan['bulan']}}/{{$laporan['tahun']}}/laporanpdf">
     @endforeach   
    <button class="py-2 px-4 rounded-xl bg-green-400 text-white font-medium hover:bg-green-600">Cetak Laporan</button>
        </a> 
    </div> 
<div class="py-6"></div>
<x-headpart>Laporan Peminjaman Buku</x-headpart>   

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama Buku
                </th>
                <th scope="col" class=" px-6 ">
                    ID_Buku
                </th>
                <th scope="col" class="px-6 py-3">
                    Waktu Peminjaman
                </th>
                <th scope="col" class="px-6 py-3">
                    Waktu Pengembalian
                </th>
        </thead>
        <tbody>
        @foreach ($meminjams as $meminjam)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $meminjam->nama}}
                </th>
                <td class="max-w-5 px-6 py-2">
                {{ $meminjam->id_referensi }}
                <td class="px-6 py-4">
                {{ $meminjam->waktu_pinjam }}
                </td>
                <td class="px-6 py-4  {{ $meminjam->waktu_kembali == NULL ? 'text-red-500' : 'text-green-500' }}">

                {{ $meminjam->waktu_kembali == NULL ? 'Belum ada pengembalian' : $meminjam->waktu_kembali }}
                </td>
            </tr>
            @endforeach
            {{ $meminjams->links() }}

        </tbody>
    </table>
</div>
<div class="flex justify-end px-8 py-4">
    @foreach ($laporanbulan as $laporan)
    <a href="/laporan/{{$laporan['bulan']}}/{{$laporan['tahun']}}/laporanpinjampdf">
     @endforeach   
    <button class="py-2 px-4 rounded-xl bg-green-400 text-white font-medium hover:bg-green-600">Cetak Laporan</button>
        </a> 
    </div> 

<script>
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
</x-layout>