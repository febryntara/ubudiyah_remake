@extends('layouts.dashboard')

@section('content')
   <div class="mb-2">
      <a href="{{ route('auth.schoolEvent.create') }}" class="primary-dashboard-btn">tambah kegiatan</a>
   </div>
   <div class="grid grid-cols-4 gap-2">
      @foreach ($acara as $item => $value)
         <div class="p-4 w-full max-w-sm my-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div>
               <img src="{{ asset('storage/' . $value->images->first()->src) }}" alt="">
            </div>
            <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">{{ $value->nama }}</h5>
            <ul role="list" class="my-7 space-y-5">
               <li class="flex space-x-3">
                  <span
                     class="bg-blue-100 text-blue-800 text-sm font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Ketua</span>
                  <span
                     class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">{{ $value->ketua_panitia }}</span>
               </li>
               <li class="flex space-x-3">
                  <span
                     class="bg-blue-100 text-blue-800 text-sm font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Peserta</span>
                  <span
                     class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">{{ $value->jumlah_peserta }}
                     Orang</span>
               </li>
               <li class="flex space-x-3">
                  <span
                     class="bg-blue-100 text-blue-800 text-sm font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Mulai</span>
                  <span
                     class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">{{ $value->tanggal_mulai }}
                  </span>
               </li>
               <li class="flex space-x-3">
                  <span
                     class="bg-blue-100 text-blue-800 text-sm font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Selesai</span>
                  <span
                     class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">{{ $value->tanggal_selesai }}
                  </span>
               </li>
               <a href="{{ route('auth.schoolEvent.detail', ['schoolEvent' => $value]) }}"
                  class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Detail</a>
         </div>

         {{-- <div class="my-{{ autoBg() }} p-2">
            <div>
               <img src="{{ asset('storage/' . $value->images->first()->src) }}" alt="">
            </div>
            <div>
               <h2 class="text-lg font-semibold capitalize">{{ $value->nama }}</h2>
               <hr>
               <p class="">{{ str_replace('_', ' ', $value->status_kegiatan) }}</p>
            </div>
            <div class="grid gap-y-2">
               <div>
                  <h2 class="capitalize">deskripsi kegiatan</h2>
                  <div class="text-sm">{{ $value->deskripsi }}</div>
               </div>
               <div>
                  <h2 class="capitalize">ketua panitia</h2>
                  <div class="text-sm">{{ $value->ketua_panitia }}</div>
               </div>
               <div>
                  <h2 class="capitalize">penanggung jawab</h2>
                  <div class="text-sm">{{ $value->penanggung_jawab }}</div>
               </div>
               <div>
                  <h2 class="capitalize">jumlah peserta</h2>
                  <div class="text-sm">{{ $value->jumlah_peserta }}</div>
               </div>
               <div>
                  <hr>
                  <div>Mulai :{{ $value->waktu_mulai . ' ' . date('d M Y', strtotime($value->tanggal_mulai)) }}</div>
                  <div>Selesai :{{ $value->waktu_selesai . ' ' . date('d M Y', strtotime($value->tanggal_selesai)) }}
                  </div>
               </div>
               <div class="text-center">
                  <a class="primary-dashboard-btn"
                     href="{{ route('auth.schoolEvent.detail', ['schoolEvent' => $value]) }}">detail</a>
               </div>
            </div>
         </div> --}}
      @endforeach
   </div>
@endsection
