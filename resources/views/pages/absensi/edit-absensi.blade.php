@extends('layouts.dashboard')

@section('content')
   <form action="{{ route('auth.absensi.patch', ['absen' => $absen]) }}" method="post">
      @csrf
      @method('patch')
      <label for="tanggal" class="block"><span class="block">tanggal</span>
         <input value="{{ old('tanggal') ?? $absen->tanggal }}" class="block w-full px-2 py-1 rounded-md" type="text"
            name="tanggal">
      </label>
      <label for="kelas" class="block"><span class="block">kelas</span>
         <input value="{{ old('tanggal') ?? $absen->kelas }}" class="block w-full px-2 py-1 rounded-md" type="number"
            name="kelas">
      </label>
      @foreach ($siswa as $data => $value)
         <input type="hidden" name="siswa[{{ $data }}][id]" value="{{ $value->id }}">
         <div class="grid grid-cols-2">
            <div>{{ $value->name }}</div>
            <div class="grid grid-cols-4">
               <label for="hadir-{{ $data }}">
                  <input type="radio" id="hadir-{{ $data }}" name="siswa[{{ $data }}][absen]"
                     value="1"
                     {{ ($detail_absen->where('siswa_id', $value->id)->first()->absensi ?? null) == 1 ? 'checked' : null }}>
                  <span class="capitalize">hadir</span>
               </label>
               <label for="ijin-{{ $data }}">
                  <input type="radio" id="ijin-{{ $data }}" name="siswa[{{ $data }}][absen]"
                     value="2"
                     {{ ($detail_absen->where('siswa_id', $value->id)->first()->absensi ?? null) == 2 ? 'checked' : null }}>
                  <span class="capitalize">ijin</span>
               </label>
               <label for="sakit-{{ $data }}">
                  <input type="radio" id="sakit-{{ $data }}" name="siswa[{{ $data }}][absen]"
                     value="3"
                     {{ ($detail_absen->where('siswa_id', $value->id)->first()->absensi ?? null) == 3 ? 'checked' : null }}>
                  <span class="capitalize">sakit</span>
               </label>
               <label for="alpa-{{ $data }}">
                  <input type="radio" id="alpa-{{ $data }}" name="siswa[{{ $data }}][absen]"
                     value="4"
                     {{ ($detail_absen->where('siswa_id', $value->id)->first()->absensi ?? null) == 4 ? 'checked' : null }}>
                  <span class="capitalize">alpa</span>
               </label>
            </div>
         </div>
      @endforeach
      <button class="primary-dashboard-btn">update absensi</button>
   </form>
@endsection
