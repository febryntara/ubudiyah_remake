@extends('layouts.dashboard')

@section('content')
   <form action="{{ route('auth.mapel.patch', ['mapel' => $mapel]) }}" method="post">
      @csrf
      @method('patch')
      <label for="nama" class="block"><span class="block">nama</span>
         <input class="block w-full px-2 py-1 rounded-md" type="text" value="{{ old('nama') ?? $mapel->nama }}"
            name="nama">
         @error('nama')
            <div class="text-red-600">{{ $message }}</div>
         @enderror
      </label>
      <label for="kelas" class="block"><span class="block">kelas</span>
         <input class="block w-full px-2 py-1 rounded-md" type="number" value="{{ old('kelas') ?? $mapel->kelas }}"
            name="kelas">
         @error('kelas')
            <div class="text-red-600">{{ $message }}</div>
         @enderror
      </label>
      <label for="deskripsi" class="block"><span class="block">deskripsi</span>
         <input class="block w-full px-2 py-1 rounded-md" type="text"
            value="{{ old('deskripsi') ?? $mapel->deskripsi }}" name="deskripsi">
         @error('deskripsi')
            <div class="text-red-600">{{ $message }}</div>
         @enderror
      </label>
      <button class="px-2 py-1 bg-blue-500 rounded-md text-white text-center w-20 justify-self-center">Ubah Mata
         Pelajaran</button>
   </form>
@endsection
