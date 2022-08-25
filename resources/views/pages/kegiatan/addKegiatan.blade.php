@extends('layouts.dashboard')

@section('content')
   <form action="{{ route('auth.schoolEvent.store') }}" method="post">
      @csrf
      <label for="nama">
         <span class="capitalize font-semibold">Nama Kegiatan</span>
         <input type="text" name="nama" class="block w-full px-2 py-1 border-[1px] border-black" id="nama">
         @error('nama')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="deskripsi">
         <span class="capitalize font-semibold">deskripsi</span>
         <input type="text" name="deskripsi" class="block w-full px-2 py-1 border-[1px] border-black" id="deskripsi">
         @error('deskripsi')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="ketua_panitia">
         <span class="capitalize font-semibold">ketua panitia</span>
         <input type="text" name="ketua_panitia" class="block w-full px-2 py-1 border-[1px] border-black"
            id="ketua_panitia">
         @error('ketua_panitia')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="penanggung_jawab">
         <span class="capitalize font-semibold">penanggung jawab</span>
         <input type="text" name="penanggung_jawab" class="block w-full px-2 py-1 border-[1px] border-black"
            id="penanggung_jawab">
         @error('penanggung_jawab')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="jumlah_peserta">
         <span class="capitalize font-semibold">jumlah peserta</span>
         <input type="number" name="jumlah_peserta" class="block w-full px-2 py-1 border-[1px] border-black"
            id="jumlah_peserta">
         @error('jumlah_peserta')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="tanggal_mulai">
         <span class="capitalize font-semibold">tanggal mulai</span>
         <input type="date" name="tanggal_mulai" class="block w-full px-2 py-1 border-[1px] border-black"
            id="tanggal_mulai">
         @error('tanggal_mulai')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="waktu_mulai">
         <span class="capitalize font-semibold">waktu mulai</span>
         <input type="time" name="waktu_mulai" class="block w-full px-2 py-1 border-[1px] border-black"
            id="waktu_mulai">
         @error('waktu_mulai')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="tanggal_selesai">
         <span class="capitalize font-semibold">tanggal selesai</span>
         <input type="date" name="tanggal_selesai" class="block w-full px-2 py-1 border-[1px] border-black"
            id="tanggal_selesai">
         @error('tanggal_selesai')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="waktu_selesai">
         <span class="capitalize font-semibold">waktu selesai</span>
         <input type="time" name="waktu_selesai" class="block w-full px-2 py-1 border-[1px] border-black"
            id="waktu_selesai">
         @error('waktu_selesai')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <div class="text-center my-2">
         <button class="primary-dashboard-btn" type="submit">tambah kegiatan</button>
      </div>
   </form>
@endsection
