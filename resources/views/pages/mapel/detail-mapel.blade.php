@extends('layouts.dashboard')

@section('content')
   <h2>{{ $mapel->nama }}</h2>
   <h2>{{ $mapel->kelas }}</h2>
   <h2>{{ $mapel->deskripsi }}</h2>

   <a href="{{ route('auth.mapel.all') }}" class="primary-dashboard-btn text-sm">kembali</a>
@endsection
