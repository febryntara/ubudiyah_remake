@extends('layouts.dashboard')

@section('content')
   <h2>Selamat Datang {{ auth()->user()->name }}</h2>
   <div class="grid grid-cols-4 my-4 gap-4 w-[80%]">
      <div class="w-full h-[110px] bg-yellow-400 p-2 box-border">
         <h2 class="text-lg font-semibold">Siswa</h2>
         <p class="text-4xl">100</p>
      </div>
      <div class="w-full h-[110px] bg-red-400 p-2 box-border">
         <h2 class="text-lg font-semibold">Mata Pelajaran</h2>
         <p class="text-4xl">100</p>
      </div>
      <div class="w-full h-[110px] bg-green-400 p-2 box-border">
         <h2 class="text-lg font-semibold">Guru</h2>
         <p class="text-4xl">100</p>
      </div>
      <div class="w-full h-[110px] bg-slate-400 p-2 box-border">
         <h2 class="text-lg font-semibold">Kegiatan</h2>
         <p class="text-4xl">100</p>
      </div>
   </div>
@endsection
