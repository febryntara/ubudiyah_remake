@extends('layouts.dashboard')

@section('content')
   <h2>Selamat Datang {{ auth()->user()->name }}</h2>
   @can('guru')
      <div class="grid grid-cols-4 my-4 gap-4 w-[80%]">
         <div class="w-full h-[110px] bg-yellow-400 p-2 box-border">
            <h2 class="text-lg font-semibold">Siswa</h2>
            <p class="text-4xl">{{ $siswa }}</p>
         </div>
         <div class="w-full h-[110px] bg-red-400 p-2 box-border">
            <h2 class="text-lg font-semibold">Mata Pelajaran</h2>
            <p class="text-4xl">{{ $mapel }}</p>
         </div>
         <div class="w-full h-[110px] bg-green-400 p-2 box-border">
            <h2 class="text-lg font-semibold">Guru</h2>
            <p class="text-4xl">{{ $guru }}</p>
         </div>
         <div class="w-full h-[110px] bg-slate-400 p-2 box-border">
            <h2 class="text-lg font-semibold">Kegiatan</h2>
            <p class="text-4xl">{{ $event }}</p>
         </div>
      </div>
   @endcan
   @can('siswa')
      @dump($absensi)
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
