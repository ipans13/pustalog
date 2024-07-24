<x-layout>
    <x-slot:title>Peminjaman dan pengembalian buku</x-slot:title>
    <div class="py-4">
        <x-headpart>Peminjaman Buku</x-headpart>
        @if(session('success'))
        <div class="flex justify-center">
            <div class="p-4 mb-4 text-sm text-center w-1/4 text-white rounded-lg bg-green-300 dark:bg-gray-800 dark:text-blue-400" role="alert">
                <span class="font-medium">Success</span> {{session('success')}}
            </div>
        </div>
        @endif
        <form action="{{ route('actionpinjam') }}" method="post">
            @csrf
            <x-field nama="Nama Peminjam" id="peminjam" />
            <x-field nama="ID Referensi Buku" id="id_referensi" />
            <label for="floatingInput" class="font-semibold uppercase">Token Pengembalian</label>
            <input type="text" id="id_token" name="id_token" disabled value="{{ $token }}" class="block text-gray-500 bg-gray-200 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <input type="hidden" id="token" name="token" value="{{ $token }}">
            <div class="flex justify-end px-8 py-4">
                <button type="submit" class="py-2 px-4 rounded-xl bg-green-400 text-white font-medium hover:bg-green-600">Submit</button>
            </div>
        </form>
    </div>
    <div class="py-4">

        <x-headpart>Pegembalian Buku</x-headpart>
        @if(session('successkembali'))
        <div class="flex justify-center">
            <div class="p-4 mb-4 text-sm text-center w-1/4 text-white rounded-lg bg-green-300 dark:bg-gray-800 dark:text-blue-400" role="alert">
                <span class="font-medium">Success</span> {{session('successkembali')}}
            </div>
        </div>
        @endif
        <form action="{{ route('actionkembali') }}" method="post">
            @csrf
            @method('PUT')
            <label for="floatingInput" class="font-semibold uppercase">Token Pengembalian</label>
            <input type="text" id="token" name="token" class="block  w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Masukan Token Pengembalian....">

            <div class="flex justify-end px-8 py-4">
                <button type="submit" class="py-2 px-4 rounded-xl bg-green-400 text-white font-medium hover:bg-green-600">Submit</button>
            </div>
        </form>
    </div>
    </div>
</x-layout>