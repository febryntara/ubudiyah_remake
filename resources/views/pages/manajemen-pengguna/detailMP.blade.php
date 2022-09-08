@extends('layouts.dashboard')

@section('content')
   <div class="grid grid-cols-2 gap-y-2">
      <div class="col-span-2">
         @can('guru')
            <a href="{{ route('auth.manajemen-user') }}" class="primary-dashboard-btn">kembali</a>
            <a href="{{ route('auth.manajemen-user.edit', ['user' => $user]) }}" class="warning-dashboard-btn">edit</a>
            <form class="inline" action="{{ route('auth.manajemen-user.delete', ['user' => $user]) }}" method="post">
               @csrf
               @method('delete')
               <button class="danger-dashboard-btn text-sm my-2">delete</button>
            </form>
         @else
            <a href="{{ route('pages.data-diri.ubah') }}" class="warning-dashboard-btn">edit</a>
         @endcan
      </div>
      <div class="col-span-2">
         <img class="w-[200px] h-[250px] object-cover"
            src="https://i.pinimg.com/474x/97/7f/e7/977fe798cf2c3a037e7aa9af6ce4b9d1.jpg" alt="default profile">
      </div>
      <div class="grid grid-cols-2 gap-y-2 ">
         <div class="capitalize font-semibold">Nama</div>
         <div class="capitalize">: {{ $user->name }}</div>
         <div class="capitalize font-semibold">Umur</div>
         <div class="capitalize">: {{ $user->umur }} tahun</div>
         <div class="capitalize font-semibold">Status</div>
         <div class="capitalize">: {{ $user->userRole->name }}</div>
         <div class="capitalize font-semibold">Tempat Lahir</div>
         <div class="capitalize">: {{ $user->tempat_lahir ?? 'data kosong' }}</div>
         <div class="capitalize font-semibold">tanggal lahir</div>
         <div class="capitalize">: {{ $user->tanggal_lahir ?? 'data kosong' }}</div>
         <div class="capitalize font-semibold">jenis kelamin</div>
         <div class="capitalize">: {{ $user->jenis_kelamin == 0 ? 'Laki laki' : 'Perempuan' }}</div>
      </div>
      <div class="grid grid-cols-2 gap-y-2 ">
         @if ($user->role_id == 1)
            <div class="capitalize font-semibold">nis</div>
            <div class="capitalize">: {{ $user->nis ?? 'data kosong' }}</div>
            <div class="capitalize font-semibold">nisn</div>
            <div class="capitalize">: {{ $user->nisn ?? 'data kosong' }}</div>
            <div class="capitalize font-semibold">cita cita</div>
            <div class="capitalize">: {{ $user->cita_cita ?? 'data kosong' }}</div>
            <div class="capitalize font-semibold">kelas</div>
            <div class="capitalize">: {{ $user->kelas ?? 'data kosong' }}</div>
            <div class="capitalize font-semibold">motto hidup</div>
            <div class="capitalize">: {{ $user->moto_hidup ?? 'data kosong' }}</div>
         @endif
         @if ($user->role_id == 3)
            <div class="capitalize font-semibold">nip</div>
            <div class="capitalize">: {{ $user->nip ?? 'data kosong' }}</div>
            <div class="capitalize font-semibold">nik</div>
            <div class="capitalize">: {{ $user->nik ?? 'data kosong' }}</div>
            <div class="capitalize font-semibold">Mapel yang diampu</div>
            <div class="capitalize">: {{ $user->mapel_id ?? 'data kosong' }}</div>
            <div class="capitalize font-semibold">motto hidup</div>
            <div class="capitalize">: {{ $user->moto_hidup ?? 'data kosong' }}</div>
         @endif
      </div>
      <div class="grid grid-cols-2 gap-y-2">
         <div class="capitalize font-semibold">email</div>
         <div class="capitalize">: {{ $user->email ?? 'data kosong' }}</div>
         <div class="capitalize font-semibold">nik</div>
         <div class="capitalize">: {{ $user->nik ?? 'data kosong' }}</div>
         <div class="capitalize font-semibold">agama</div>
         <div class="capitalize">: {{ $user->agama ?? 'data kosong' }}</div>
         <div class="capitalize font-semibold">status kawin</div>
         <div class="capitalize">: {{ $user->status_kawin ?? 'data kosong' }}</div>
         <div class="capitalize font-semibold">kelurahan</div>
         <div class="capitalize">: {{ $user->kelurahan ?? 'data kosong' }}</div>
         <div class="capitalize font-semibold">alamat</div>
         <div class="capitalize">: {{ $user->alamat ?? 'data kosong' }}</div>
         <div class="capitalize font-semibold">kontak</div>
         <div class="capitalize">: {{ $user->kontak ?? 'data kosong' }}</div>
      </div>
      <div class="grid grid-cols-2 gap-y-2">
         <div class="capitalize font-semibold">status akun</div>
         <div class="capitalize">: {{ str_replace('_', ' ', $user->status_akun) ?? 'data kosong' }}</div>
      </div>
   </div>
@endsection
