@extends('layouts.dashboard')

@section('content')
   @dump($errors)
   <div class="mb-2">
      <a href="{{ route('auth.schoolEvent.all') }}" class="danger-dashboard-btn">kembali ke awal</a>
      <a href="{{ route('auth.schoolEvent.detail', ['schoolEvent' => $acara]) }}" class="warning-dashboard-btn">kembali</a>
   </div>
   <form action="{{ route('auth.schoolEvent.patch', ['schoolEvent' => $acara]) }}" method="post"
      enctype="multipart/form-data">
      @csrf
      @method('patch')
      <label for="nama">
         <span class="capitalize font-semibold">Nama Kegiatan</span>
         <input value="{{ old('nama') ?? $acara->nama }}" type="text" name="nama"
            class="block w-full px-2 py-1 border-[1px] border-black" id="nama">
         @error('nama')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="deskripsi">
         <span class="capitalize font-semibold">deskripsi</span>
         <input value="{{ old('deskripsi') ?? $acara->deskripsi }}" type="text" name="deskripsi"
            class="block w-full px-2 py-1 border-[1px] border-black" id="deskripsi">
         @error('deskripsi')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="ketua_panitia">
         <span class="capitalize font-semibold">ketua panitia</span>
         <input value="{{ old('ketua_panitia') ?? $acara->ketua_panitia }}" type="text" name="ketua_panitia"
            class="block w-full px-2 py-1 border-[1px] border-black" id="ketua_panitia">
         @error('ketua_panitia')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="penanggung_jawab">
         <span class="capitalize font-semibold">penanggung jawab</span>
         <input value="{{ old('penanggung_jawab') ?? $acara->penanggung_jawab }}" type="text" name="penanggung_jawab"
            class="block w-full px-2 py-1 border-[1px] border-black" id="penanggung_jawab">
         @error('penanggung_jawab')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="jumlah_peserta">
         <span class="capitalize font-semibold">jumlah peserta</span>
         <input value="{{ old('jumlah_peserta') ?? $acara->jumlah_peserta }}" type="number" name="jumlah_peserta"
            class="block w-full px-2 py-1 border-[1px] border-black" id="jumlah_peserta">
         @error('jumlah_peserta')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="tanggal_mulai">
         <span class="capitalize font-semibold">tanggal mulai</span>
         <input value="{{ old('tanggal_mulai') ?? $acara->tanggal_mulai }}" type="date" name="tanggal_mulai"
            class="block w-full px-2 py-1 border-[1px] border-black" id="tanggal_mulai">
         @error('tanggal_mulai')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="waktu_mulai">
         <span class="capitalize font-semibold">waktu mulai</span>
         <input value="{{ old('waktu_mulai') ?? $acara->waktu_mulai }}" type="time" name="waktu_mulai"
            class="block w-full px-2 py-1 border-[1px] border-black" id="waktu_mulai">
         @error('waktu_mulai')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="tanggal_selesai">
         <span class="capitalize font-semibold">tanggal selesai</span>
         <input value="{{ old('tanggal_selesai') ?? $acara->tanggal_selesai }}" type="date" name="tanggal_selesai"
            class="block w-full px-2 py-1 border-[1px] border-black" id="tanggal_selesai">
         @error('tanggal_selesai')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="waktu_selesai">
         <span class="capitalize font-semibold">waktu selesai</span>
         <input value="{{ old('waktu_selesai') ?? $acara->waktu_selesai }}" type="time" name="waktu_selesai"
            class="block w-full px-2 py-1 border-[1px] border-black" id="waktu_selesai">
         @error('waktu_selesai')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="gambar">
         <span class="capitalize font-semibold">Tambah Gambar</span>
         <input type="file" name="gambar[]" class="block w-full px-2 py-1 border-[1px] border-black" id="gambar"
            multiple>
         @error('gambar')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <div class="text-center my-2">
         <button class="primary-dashboard-btn" type="submit">ubah kegiatan</button>
      </div>
   </form>
@endsection
