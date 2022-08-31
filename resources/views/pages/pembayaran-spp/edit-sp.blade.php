@extends('layouts.dashboard')

@section('content')
   <form action="{{ route('auth.pembayaran-spp.patch', ['spp' => $spp]) }}" method="post">
      @csrf
      @method('patch')
      <div>{{ date('Y - m', strtotime($spp->created_at)) }}</div>
      <div>{{ $spp->kelas }}</div>
      @foreach ($siswa as $data => $value)
         <input type="hidden" name="siswa[{{ $data }}][id]" value="{{ $value->id }}">
         <div class="grid grid-cols-2">
            <div>{{ $value->name }}</div>
            <div class="grid grid-cols-4">
               <label for="sudah-bayar-{{ $data }}">
                  <input type="radio" id="sudah-bayar-{{ $data }}" name="siswa[{{ $data }}][bayar]"
                     value="1"
                     {{ ($detail_spp->where('siswa_id', $value->id)->first()->status_bayar ?? null) == 1 ? 'checked' : null }}>
                  <span class="capitalize">Sudah Bayar</span>
               </label>
               <label for="belum-bayar-{{ $data }}">
                  <input type="radio" id="belum-bayar-{{ $data }}" name="siswa[{{ $data }}][bayar]"
                     value="0"
                     {{ ($detail_spp->where('siswa_id', $value->id)->first()->status_bayar ?? null) == 0 ? 'checked' : null }}>
                  <span class="capitalize">Belum Bayar</span>
               </label>
            </div>
         </div>
      @endforeach
      <button class="primary-dashboard-btn">update pembayaran spp</button>
   </form>
@endsection
