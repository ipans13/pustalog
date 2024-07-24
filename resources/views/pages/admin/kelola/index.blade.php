<x-layout>

    <x-slot:title>Kelola Buku</x-slot:title>

    <div class="flex justify-end ">



        <button onclick="showPopup()" class="bg-green-600 p-2 rounded-md text-gray-50 hover:bg-green-700 focus:outline-none font-medium"><i class="bi bi-plus"></i>
            <p class="hidden md:contents">Tambah Buku</p>
        </button>


    </div>

    @if(session('success'))
    <div class="flex justify-center">
        <div class="p-4 mb-4 text-sm text-center w-1/4 text-white rounded-lg bg-green-300 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <span class="font-medium">Success</span> {{session('success')}}
        </div>
    </div>
    @endif

    @if ($errors->any())
    <div class="flex justify-center">
        <div class="p-4 mb-4 text-sm text-center text-red-800 w-2/3  rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    <x-headpart>Daftar Buku</x-headpart>

    <div class="flex justify-center pb-4">
        <div>
            <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Filter Dropdown</label>
            <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button"> Kategori Buku <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg></button>
            <div id="dropdown" class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                    <li>
                        <a href="/kelola/" type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Semua Kategori</a>
                    </li>
                    @foreach ($kategories as $kategori)
                    <li>
                        <a href="/kelola/{{ $kategori->kategori }}" type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $kategori->kategori }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>


        <form class="">
            <div class="relative w-full">
                <input type="search" name="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Mockups, Logos, Design Templates..." required />
                <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
        </form>

    </div>






    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        nama buku
                    </th>
                    <th scope="col" class=" px-6 ">
                        tahun
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        penerbit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ID Referensi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if($bukus->isEmpty())
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Buku tidak ditemukan
                </th>
                @else
                @foreach ($bukus as $buku)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $buku->judul}}
                    </th>
                    <td class="max-w-5 px-6 py-2">
                        {{ $buku->tahun }}
                    <td class="px-6 py-4">
                        {{ $buku->kategori->kategori }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $buku->penerbit }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $buku->id_referensi }}
                    </td>
                    <td class="px-6 py-4 flex">
                        <div class="flex gap-4">

                            <button onclick="editshowPopup('{{ $buku->id }}', '{{ $buku->judul }}', '{{ $buku->kategori->id }}', '{{ $buku->jml_halaman }}', '{{ $buku->tahun }}', '{{ $buku->penerbit }}', '{{ $buku->penulis }}', '{{ $buku->desc }}', '{{ $buku->img }}')" class="font-medium  hover:underline"><i class="bi bi-pencil-square text-orange-700"></i></button>
                            <form action="{{ route('bukus.destroy', $buku->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium  hover:underline"><i class="bi bi-trash text-red-700"></i></button>
                            </form>

                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>


    <div id="editpopupOverlay" class="fixed hidden inset-0 top-0 left-0 h-full w-full bg-black bg-opacity-50 block justify-center items-center z-50 overflow-y-auto">
        <div class=" block sticky px-10 mt-12 top-1/4 left-1/4  bg-white rounded-lg shadow-lg p-6 sm:w-1/3 overflow-y-auto">
            <div class=" flex justify-end">
                <button id="closePopup" onclick="edithidePopup()" class=" text-gray-500 rounded hover:text-red-700">X</button>
            </div>
            <h2 class="text-xl font-bold mb-4">Edit Buku</h2>
            <form id="dynamicForm" method="POST">
                @csrf
                @method('PUT')

                <img id="imgprev" alt="" class="w-32 h-32 object-cover">
                <x-field nama="Judul Buku" id="juduledit" />
                <label for="kategoriedit" class="block hid mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                <select id="kategoriedit" name="kategoriedit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($kategories as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                    @endforeach
                </select>

                <x-field nama="Jumlah Halaman" id="jml_halamanedit" />
                <x-field nama="Penulis Buku" id="penulisedit" />
                <x-field nama="Penerbit" id="penerbitedit" />
                <x-field nama="Tahun Terbit" id="tahunedit" />
                <x-field nama="Ringkasan Buku" id="descedit" />
                <label for="imgedit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar Buku</label>
                <input type="file" id="imgedit" name="imgedit" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">


                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-red-700">Update Buku</button>
            </form>

        </div>
    </div>












    <div id="popupOverlay" class="fixed hidden inset-0 top-0 left-0 h-full w-full bg-black bg-opacity-50 block justify-center items-center z-50 overflow-y-auto">
        <div class=" block sticky px-10 mt-12 top-1/4 left-1/4 bg-white rounded-lg shadow-lg p-6 sm:w-1/3 overflow-y-auto">
            <div class=" flex justify-end">
                <button id="closePopup" onclick="hidePopup()" class=" text-gray-500 rounded hover:text-red-700">X</button>
            </div>
            <h2 class="text-xl font-bold mb-4">Tambah Buku</h2>

            <form action="{{ route('addbooksaction') }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-field nama="Judul Buku" id="judul" />
                <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                <select id="kategori" name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($kategories as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                    @endforeach
                </select>
                <x-field nama="Jumlah Halaman" id="jml_halaman" />
                <x-field nama="Penulis Buku" id="penulis" />
                <x-field nama="Penerbit" id="penerbit" />
                <x-field nama="Tahun Terbit" id="tahun" />
                <x-field nama="Ringkasan Buku" id="desc" />

                <label for="img" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar Buku</label>
                <input type="file" id="img" name="img" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">



                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-red-700">Tambah</button>
            </form>

        </div>
    </div>

    <script>
        function hidePopup() {
            document.getElementById("popupOverlay").style.display = "none";

        }

        function showPopup() {
            document.getElementById("popupOverlay").style.display = "block";
        }

        function edithidePopup() {
            document.getElementById("editpopupOverlay").style.display = "none";

        }

        function editshowPopup(id, judul, kategori, jml_halaman, tahun, penerbit, penulis, desc, img) {

            var imgpath = img ? "{{ asset('images') }}/" + img : '';
            document.getElementById('juduledit').value = judul;
            document.getElementById('jml_halamanedit').value = jml_halaman;
            document.getElementById('kategoriedit').value = kategori;
            document.getElementById('tahunedit').value = tahun;
            document.getElementById('penerbitedit').value = penerbit;
            document.getElementById('penulisedit').value = penulis;
            document.getElementById('descedit').value = desc;
            document.getElementById('imgprev').src = imgpath;
            var form = document.getElementById('dynamicForm');
            var newActionURL = '{{ route("bukus.update", ":id") }}'.replace(':id', id);

            // Set the form's action attribute to the new URL
            form.action = newActionURL;

            document.getElementById("editpopupOverlay").style.display = "block";
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
</x-layout>