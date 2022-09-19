@extends('layouts.dashboard')

@section('content')
   <h2>Selamat Datang {{ auth()->user()->name }}</h2>
   @can('guru')
      <div class="grid grid-cols-4 my-4 gap-4 w-[80%]">

         <a href="javascript::"
            class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <p class="font-normal text-gray-700 dark:text-gray-400">Siswa</p>
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $siswa }}</h5>
         </a>

         <a href="javascript::"
            class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <p class="font-normal text-gray-700 dark:text-gray-400">Mata Pelajaran</p>
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $mapel }}</h5>
         </a>

         <a href="javascript::"
            class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <p class="font-normal text-gray-700 dark:text-gray-400">Guru</p>
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $guru }}</h5>
         </a>
         <a href="javascript::"
            class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <p class="font-normal text-gray-700 dark:text-gray-400">Acara Sekolah</p>
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $event }}</h5>
         </a>
      </div>
   @endcan
   @can('siswa')
      <div class="grid grid-cols-4 my-4 gap-4 w-[80%]">
         <div class="w-full h-[110px] bg-yellow-400 p-2 box-border">
            <h2 class="text-lg font-semibold">Ijin</h2>
            <p class="text-4xl">{{ $absensi->where('absensi', 2)->count() }}</p>
         </div>
         <div class="w-full h-[110px] bg-orange-400 p-2 box-border">
            <h2 class="text-lg font-semibold">Sakit</h2>
            <p class="text-4xl">{{ $absensi->where('absensi', 3)->count() }}</p>
         </div>
         <div class="w-full h-[110px] bg-red-400 p-2 box-border">
            <h2 class="text-lg font-semibold">Alpha</h2>
            <p class="text-4xl">{{ $absensi->where('absensi', 4)->count() }}</p>
         </div>
      </div>
   @endcan
   @can('umum')
      <div class="grid grid-cols-4 my-4 gap-4 w-[80%]">
         <div class="w-full h-[110px] bg-yellow-400 p-2 box-border">
         </div>
      </div>
   @endcan
@endsection
