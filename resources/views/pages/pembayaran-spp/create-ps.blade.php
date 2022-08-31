@extends('layouts.dashboard')

@section('content')
   <form action="{{ route('auth.pembayaran-spp.store') }}" method="post">
      @csrf
      <label for="bulan" class="block"><span class="block">bulan</span>
         <input value="{{ $bulan }}" class="block w-full px-2 py-1 rounded-md" type="text" name="bulan">
      </label>
      <label for="kelas" class="block"><span class="block">kelas</span>
         <input value="{{ $kelas }}" class="block w-full px-2 py-1 rounded-md" type="number" name="kelas">
      </label>
      @foreach ($siswa as $data => $value)
         <input type="hidden" name="siswa[{{ $data }}][id]" value="{{ $value->id }}">
         <div class="grid grid-cols-2">
            <div>{{ $value->name }}</div>
            <div class="grid grid-cols-4">
               <label for="sudah_bayar-{{ $data }}">
                  <input type="radio" id="sudah_bayar-{{ $data }}" name="siswa[{{ $data }}][bayar]"
                     value="1">
                  <span class="capitalize">Sudah Bayar</span>
               </label>
               <label for="belum_bayar-{{ $data }}">
                  <input type="radio" id="belum_bayar-{{ $data }}" name="siswa[{{ $data }}][bayar]"
                     value="0">
                  <span class="capitalize">Belum Bayar</span>
               </label>
            </div>
         </div>
      @endforeach
      <button class="primary-dashboard-btn">buat pembayaran</button>
   </form>
@endsection
