
<x-layout> 
<x-slot:title>Dashboard</x-slot:title>  
<div class="bg-white rounded-lg pt-8 pb-16 px-6">
  <x-headpart>Dashboard</x-headpart>
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <dl class=" gap-x-8 gap-y-16 text-center lg:grid-cols-2">
      <div class="mx-auto flex max-w-xs flex-col gap-y-4">
        <dt class="text-base leading-7 text-gray-600 font-medium">Jumlah buku yang dimiliki</dt>
        <dd class="order-first text-3xl font-semibold tracking-tight text-green-900 sm:text-5xl">{{ $total }}</dd>
      </div>
      <div class="w-full border-r border-green-300 my-4"></div>
      <div class="">
        <div class="flex gap-7">
          <div class="mx-auto flex max-w-xs flex-col gap-y-4">
            <dt class="text-base leading-7 text-gray-600 font-medium">Jumlah buku yang masuk bulan ini</dt>
            <dd class="order-first text-3xl font-semibold tracking-tight text-green-900 sm:text-5xl">{{$masuk}}</dd>
          </div>
          <div class="mx-auto flex max-w-xs flex-col gap-y-4">
            <dt class="text-base leading-7 text-gray-600 font-medium">Jumlah buku yang keluar bulan ini</dt>
            <dd class="order-first text-3xl font-semibold tracking-tight text-green-900 sm:text-5xl">{{$keluar}}</dd>
          </div>
        </div>
        <div class="w-full border-t border-green-300 my-4"></div>
        <div class="flex gap-7">
          <div class="mx-auto flex max-w-xs flex-col gap-y-4">
            <dt class="text-base leading-7 text-gray-600 font-medium">Jumlah buku yang dipinjam bulan ini</dt>
            <dd class="order-first text-3xl font-semibold tracking-tight text-green-900 sm:text-5xl">{{ $pinjam }}</dd>
          </div>
          <div class="mx-auto flex max-w-xs flex-col gap-y-4">
            <dt class="text-base leading-7 text-gray-600 font-medium">Jumlah buku yang belum kembali bulan ini</dt>
            <dd class="order-first text-3xl font-semibold tracking-tight text-green-900 sm:text-5xl">{{$belum}}</dd>
          </div>
        </div>
      </div>
    </dl>
  </div>
</div>

</div></x-layout>