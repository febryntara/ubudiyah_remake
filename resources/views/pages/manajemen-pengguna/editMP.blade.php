@extends('layouts.dashboard')

@section('content')
   <form class="grid grid-cols-2 gap-y-2 gap-x-3" method="post"
      action="{{ route('auth.manajemen-user.patch', ['user' => $user]) }}">
      @csrf
      @method('patch')
      <div class="col-span-2">
         <a href="{{ route('auth.manajemen-user') }}" class="danger-dashboard-btn">kembali ke awal</a>
         <a href="{{ route('auth.manajemen-user.detail', ['user' => $user]) }}" class="warning-dashboard-btn">kembali ke
            detail</a>
         <button type="submit" class="primary-dashboard-btn">save</button>
      </div>
      <div class="col-span-2">
         <img class="w-[200px] h-[250px] object-cover"
            src="https://i.pinimg.com/474x/97/7f/e7/977fe798cf2c3a037e7aa9af6ce4b9d1.jpg" alt="default profile">
      </div>
      <div class="grid grid-cols-2 gap-y-2 ">
         <div class="capitalize font-semibold">
            <div>Nama</div>
            @error('name')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <input type="text" name="name" class="capitalize w-full" value="{{ $user->name }}">
         <div class="capitalize font-semibold">
            <div>Umur</div>
            @error('umur')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <input type="number" name="umur" class="capitalize w-full" value="{{ $user->umur }}">
         <div class="capitalize font-semibold">
            <div>Status</div>
            @error('role_id')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <select class="capitalize w-full" name="role_id" id="role_id">
            @foreach ($user_roles as $ur => $data)
               <option value="{{ $data->id }}" {{ $user->role_id == $data->id ? 'selected' : null }}>
                  {{ str_replace('_', ' ', $data->name) }}
               </option>
            @endforeach
         </select>
         <div class="capitalize font-semibold">
            <div>Tempat Lahir</div>
            @error('tempat_lahir')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <input type="text" name="tempat_lahir" class="capitalize w-full"
            value="{{ $user->tempat_lahir ?? 'data kosong' }}">
         <div class="capitalize font-semibold">
            <div>tanggal lahir</div>
            @error('tanggal_lahir')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <input type="date" name="tanggal_lahir" class="capitalize w-full"
            value="{{ $user->tanggal_lahir ?? 'data kosong' }}">
         <div class="capitalize font-semibold">
            <div>jenis kelamin</div>
            @error('jenis_kelamin')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <select name="jenis_kelamin" class="capitalize w-full">
            <option value="0" {{ $user->jenis_kelamin == 0 ? 'selected' : null }}>Laki laki</option>
            <option value="1" {{ $user->jenis_kelamin == 1 ? 'selected' : null }}>perempuan</option>
         </select>
      </div>
      <div class="grid grid-cols-2 gap-y-2 ">
         @if ($user->role_id == 1)
            <div class="capitalize font-semibold">
               <div>nis</div>
               @error('nis')
                  <div class="text-red-500 text-xs">{{ $message }}</div>
               @enderror
            </div>
            <input type="number" name="nis" class="capitalize w-full" value="{{ $user->nis ?? 'data kosong' }}">
            <div class="capitalize font-semibold">
               <div>nisn</div>
               @error('nisn')
                  <div class="text-red-500 text-xs">{{ $message }}</div>
               @enderror
            </div>
            <input type="number" name="nisn" class="capitalize w-full" value="{{ $user->nisn ?? 'data kosong' }}">
            <div class="capitalize font-semibold">
               <div>cita cita</div>
               @error('cita_cita')
                  <div class="text-red-500 text-xs">{{ $message }}</div>
               @enderror
            </div>
            <input type="text" name="cita_cita" class="capitalize w-full"
               value="{{ $user->cita_cita ?? 'data kosong' }}">
            <div class="capitalize font-semibold">
               <div>kelas</div>
               @error('kelas')
                  <div class="text-red-500 text-xs">{{ $message }}</div>
               @enderror
            </div>
            <select name="kelas" class="capitalize w-full">
               @for ($i = 1; $i <= 12; $i++)
                  <option value="{{ $i }}" {{ $user->kelas == $i ? 'selected' : null }}>{{ $i }}
                  </option>
               @endfor
            </select>
            <div class="capitalize font-semibold">
               <div>motto hidup</div>
               @error('moto_hidup')
                  <div class="text-red-500 text-xs">{{ $message }}</div>
               @enderror
            </div>
            <input type="text" name="moto_hidup" class="capitalize w-full"
               value="{{ $user->moto_hidup ?? 'data kosong' }}">
         @endif
         @if ($user->role_id == 3)
            <div class="capitalize font-semibold">
               <div>nip</div>
               @error('nip')
                  <div class="text-red-500 text-xs">{{ $message }}</div>
               @enderror
            </div>
            <input type="number" name="nip" class="capitalize w-full" value="{{ $user->nip ?? 'data kosong' }}">
            <div class="capitalize font-semibold">
               <div>nik</div>
               @error('nik')
                  <div class="text-red-500 text-xs">{{ $message }}</div>
               @enderror
            </div>
            <input type="number" name="nik" class="capitalize w-full" value="{{ $user->nik ?? 'data kosong' }}">
            <div class="capitalize font-semibold">
               <div>Mapel yang diampu</div>
               @error('mapel_id')
                  <div class="text-red-500 text-xs">{{ $message }}</div>
               @enderror
            </div>
            <input type="text" name="mapel_id" class="capitalize w-full"
               value="{{ $user->mapel_id ?? 'data kosong' }}">
            <div class="capitalize font-semibold">
               <div>motto hidup</div>
               @error('moto_hidup')
                  <div class="text-red-500 text-xs">{{ $message }}</div>
               @enderror
            </div>
            <input type="text" name="moto_hidup" class="capitalize w-full"
               value="{{ $user->moto_hidup ?? 'data kosong' }}">
         @endif
      </div>
      <div class="grid grid-cols-2 gap-y-2">
         <div class="capitalize font-semibold">
            <div>email</div>
            @error('email')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <input type="email" name="email" class="capitalize w-full" value="{{ $user->email ?? 'data kosong' }}">
         <div class="capitalize font-semibold">
            <div>nik</div>
            @error('nik')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <input type="text" name="nik" class="capitalize w-full" value="{{ $user->nik ?? 'data kosong' }}">
         <div class="capitalize font-semibold">
            <div>agama</div>
            @error('agama')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror <div>agama</div>
         </div>
         <input type="text" name="agama" class="capitalize w-full" value="{{ $user->agama ?? 'data kosong' }}">
         <div class="capitalize font-semibold">
            <div>status kawin</div>
            @error('status_kawin')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <select name="status_kawin" class="capitalize w-full">
            <option value="0" {{ $user->status_kawin == 0 ? 'selected' : null }}>belum kawin</option>
            <option value="1" {{ $user->status_kawin == 1 ? 'selected' : null }}>sudah kawin</option>
         </select>
         <div class="capitalize font-semibold">
            <div>kelurahan</div>
            @error('kelurahan')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <input type="text" name="kelurahan" class="capitalize w-full"
            value="{{ $user->kelurahan ?? 'data kosong' }}">
         <div class="capitalize font-semibold">
            <div>alamat</div>
            @error('alamat')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <input type="text" name="alamat" class="capitalize w-full" value="{{ $user->alamat ?? 'data kosong' }}">
         <div class="capitalize font-semibold">
            <div>kontak</div>
            @error('kontak')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <input type="text" name="kontak" class="capitalize w-full" value="{{ $user->kontak ?? 'data kosong' }}">
      </div>
      <div class="grid grid-cols-2 gap-y-2">
         <div class="capitalize font-semibold">
            <div>status akun</div>
            @error('status_akun')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <select name="status_akun" class="capitalize w-full">
            <option value="tidak_aktif" {{ $user->status_akun == 0 ? 'selected' : null }}>tidak aktif</option>
            <option value="aktif" {{ $user->status_akun == 1 ? 'selected' : null }}>aktif</option>
         </select>
      </div>
   </form>
@endsection
