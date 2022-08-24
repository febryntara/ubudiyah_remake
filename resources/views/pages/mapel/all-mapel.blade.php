@extends('layouts.dashboard')

@section('content')
   <h2 class="text-2xl">Mata Pelajaran</h2>
   <div class="grid gap-2 grid-cols-4">
      <a href="{{ route('auth.mapel.create') }}">tambah Mata Pelajaran</a>
   </div>
   <div class="grid gap-2 grid-cols-4">
      @foreach ($mapel as $item => $value)
         <div class="bg-slate-400 p-2">
            <h2 class="text-lg font-semibold">{{ $value->nama }}</h2>
            <p class="text-sm">{{ $value->deskripsi }}</p>
            <div class="grid grid-cols-3 my-2 gap-2">
               <a href="{{ route('auth.mapel.detail', ['mapel' => $value]) }}"
                  class="primary-dashboard-btn text-xs">detail</a>
               <a href="{{ route('auth.mapel.edit', ['mapel' => $value]) }}" class="warning-dashboard-btn text-xs">ubah</a>
               <form action="{{ route('auth.mapel.delete', ['mapel' => $value]) }}" method="post">
                  @csrf
                  @method('delete')
                  <button onclick="return confirm('yakin ingin menghapus?')"
                     class="danger-dashboard-btn text-xs">hapus</button>
               </form>
            </div>
         </div>
      @endforeach
   </div>
@endsection
