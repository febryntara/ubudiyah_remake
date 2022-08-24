@extends('layouts.dashboard')
@section('content')
   <form action="{{ route('auth.create_user') }}" method="post">
      @csrf
      <label for="name">
         <span class="capitalize font-semibold">Nama</span>
         <input type="text" name="name" class="block w-full px-2 py-1 border-[1px] border-black" id="name">
         @error('name')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="email">
         <span class="capitalize font-semibold">email</span>
         <input type="email" name="email" class="block w-full px-2 py-1 border-[1px] border-black" id="email">
         @error('email')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="umur">
         <span class="capitalize font-semibold">umur</span>
         <input type="number" name="umur" class="block w-full px-2 py-1 border-[1px] border-black" id="umur">
         @error('umur')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="tempat_lahir">
         <span class="capitalize font-semibold">tempat lahir</span>
         <input type="text" name="tempat_lahir" class="block w-full px-2 py-1 border-[1px] border-black"
            id="tempat_lahir">
         @error('tempat_lahir')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="tanggal_lahir">
         <span class="capitalize font-semibold">tanggal lahir</span>
         <input type="date" name="tanggal_lahir" class="block w-full px-2 py-1 border-[1px] border-black"
            id="tanggal_lahir">
         @error('tanggal_lahir')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="jenis_kelamin">
         <span class="capitalize font-semibold">jenis kelamin</span>
         <select name="jenis_kelamin" class="capitalize w-full border-[1px] border-black px-2 py-1">
            <option value="0">Laki laki</option>
            <option value="1">perempuan</option>
         </select>
         @error('jenis_kelamin')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="role_id">
         <span class="capitalize font-semibold">status pengguna</span>
         <select class="block w-full px-2 py-1 border-[1px] border-black" name="role_id" id="role_id">
            @foreach ($user_roles as $ur => $data)
               <option value="{{ $data->id }}">{{ str_replace('_', ' ', $data->name) }}
               </option>
            @endforeach
         </select>
         @error('role_id')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <label for="password">
         <span class="capitalize font-semibold">password</span>
         <input type="password" name="password" class="block w-full px-2 py-1 border-[1px] border-black" id="password">
         @error('password')
            <div class="text-red-500 text-xs">{{ $message }}</div>
         @enderror
      </label>
      <div class="text-center my-2">
         <button class="primary-dashboard-btn" type="submit">tambah pengguna</button>
      </div>
   </form>
@endsection
