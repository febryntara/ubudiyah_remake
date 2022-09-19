@extends('layouts.dashboard')

@section('content')
   <div class="mb-2">
      <a href="{{ route('auth.schoolEvent.all') }}"
         class="inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kembali</a>
      <a href="{{ route('auth.schoolEvent.edit', ['schoolEvent' => $acara]) }}"
         class="inline-block focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Edit</a>
      <form class="inline-block" class="inline" action="{{ route('auth.schoolEvent.delete', ['schoolEvent' => $acara]) }}"
         method="post">
         @csrf
         @method('delete')
         <button type="sumbit"
            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
      </form>
   </div>

   <div id="default-carousel" class="relative" data-carousel="static">
      <!-- Carousel wrapper -->
      <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         @foreach ($acara->images as $index => $value)
            <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-20"
               data-carousel-item="">
               <span
                  class="absolute text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 sm:text-3xl dark:text-gray-800">First
                  Slide</span>
               <img src="{{ asset('storage/' . $value->src) }}"
                  class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
         @endforeach
      </div>
      <!-- Slider indicators -->
      <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
         <button type="button" class="w-3 h-3 rounded-full bg-white dark:bg-gray-800" aria-current="true"
            aria-label="Slide 1" data-carousel-slide-to="0"></button>
         <button type="button"
            class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800"
            aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
         <button type="button"
            class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800"
            aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
      </div>
      <!-- Slider controls -->
      <button type="button"
         class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
         data-carousel-prev="">
         <span
            class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
               stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span class="sr-only">Previous</span>
         </span>
      </button>
      <button type="button"
         class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
         data-carousel-next="">
         <span
            class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
               stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="sr-only">Next</span>
         </span>
      </button>
   </div>

   <div>
      <div class="mt-3 mb-6">
         <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Kegiatan</label>
         <input type="text" value="{{ $acara->nama }}" disabled
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required>
      </div>
      <div class="mb-6">
         <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Status Kegiatan</label>
         <input type="text" value="{{ str_replace('_', ' ', $acara->status_kegiatan) }}" disabled
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required>
      </div>
      <div class="mb-6">
         <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ketua Panitia</label>
         <input type="text" value="{{ $acara->ketua_panitia }}" disabled
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required>
      </div>
      <div class="mb-6">
         <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Penanggung Jawab</label>
         <input type="text" value="{{ $acara->penanggung_jawab }}" disabled
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required>
      </div>
      <div class="mb-6">
         <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jumlah Peserta</label>
         <input type="text" value="{{ $acara->jumlah_peserta . ' orang' }}" disabled
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required>
      </div>
      <div class="mb-6">
         <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal Mulai</label>
         <input type="text" value="{{ $acara->waktu_mulai . ' ' . date('d M Y', strtotime($acara->tanggal_mulai)) }}"
            disabled
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required>
      </div>
      <div class="mb-6">
         <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal Selesai</label>
         <input type="text"
            value="{{ $acara->waktu_selesai . ' ' . date('d M Y', strtotime($acara->tanggal_selesai)) }}" disabled
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required>
      </div>
      <div class="mb-6">
         <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Deskripsi Acara</label>
         <textarea type="text" disabled
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required>{{ $acara->deskripsi }}</textarea>
      </div>
   </div>
@endsection
