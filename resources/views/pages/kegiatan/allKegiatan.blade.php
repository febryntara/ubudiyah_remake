@extends('layouts.dashboard')

@section('content')
   <div class="grid grid-cols-4 gap-2">
      @foreach ($acara as $item => $value)
         <div class="">
            <div>
               <h2 class="text-lg font-semibold">{{ $value->nama }}</h2>
               <hr>
               <p class="">{{ $value->status_kegiatan }}</p>
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
                  <div>Selesai :{{ $value->waktu_selesai . ' ' . date('d M Y', strtotime($value->tanggal_selesai)) }}</div>
               </div>
            </div>
         </div>
      @endforeach
   </div>
@endsection
