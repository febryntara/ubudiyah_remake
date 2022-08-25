@extends('layouts.dashboard')

@section('content')
   <div class="mb-2">
      <a href="{{ route('auth.schoolEvent.all') }}" class="primary-dashboard-btn">kembali</a>
      <a href="{{ route('auth.schoolEvent.edit', ['schoolEvent' => $acara]) }}" class="warning-dashboard-btn">edit</a>
      <form class="inline" action="{{ route('auth.schoolEvent.delete', ['schoolEvent' => $acara]) }}" method="post">
         @csrf
         @method('delete')
         <button class="danger-dashboard-btn" onclick="return confirm('yakin menghapus {{ $acara->nama }}?')">hapus</button>
      </form>
   </div>
   <div>
      <h2>{{ $acara->nama }}</h2>
      <div class="grid grid-cols-2 gap-y-2">
         <div>status kegiatan</div>
         <div>: {{ str_replace('_', ' ', $acara->status_kegiatan) }}</div>
         <div>ketua panitia</div>
         <div>: {{ str_replace('_', ' ', $acara->ketua_panitia) }}</div>
         <div>penanggung jawab</div>
         <div>: {{ str_replace('_', ' ', $acara->penanggung_jawab) }}</div>
         <div>jumlah peserta</div>
         <div>: {{ str_replace('_', ' ', $acara->jumlah_peserta) }} orang</div>
         <div>deskripsi</div>
         <div>: {{ str_replace('_', ' ', $acara->deskripsi) }}</div>
         <div>mulai</div>
         <div>: {{ $acara->waktu_mulai . ' ' . date('d M Y', strtotime($acara->tanggal_mulai)) }}</div>
         <div>selesai</div>
         <div>: {{ $acara->waktu_selesai . ' ' . date('d M Y', strtotime($acara->tanggal_selesai)) }}</div>
      </div>
   </div>
@endsection
