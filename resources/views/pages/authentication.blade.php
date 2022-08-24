@extends('layouts.main')

@section('content')
   <div class="w-[100vw] h-[100vh] grid justify-center items-center">
      @if (session()->has('error'))
         {{ session('error') }}
      @endif
      <form class="grid gap-y-2 w-[300px] rounded-md p-4 bg-slate-200"
         action="{{ Request::is('register') ? route('auth.create_user') : route('auth.loginAttempt') }}" method="post">
         @csrf
         <label for="email" class="block"><span class="block">Email</span>
            <input class="block w-full px-2 py-1 rounded-md" type="email" name="email">
            @error('email')
               <div class="text-red-600">{{ $message }}</div>
            @enderror
         </label>
         @if (Request::is('register'))
            <label for="name" class="block"><span class="block capitalize">nama</span>
               <input class="block w-full px-2 py-1 rounded-md" type="text" name="name">
               @error('name')
                  <div class="text-red-600">{{ $message }}</div>
               @enderror
            </label>
            <label for="umur" class="block"><span class="block capitalize">umur</span>
               <input class="block w-full px-2 py-1 rounded-md" type="number" name="umur">
               @error('umur')
                  <div class="text-red-600">{{ $message }}</div>
               @enderror
            </label>
            <label for="tempat_lahir" class="block"><span class="block capitalize">tempat lahir</span>
               <input class="block w-full px-2 py-1 rounded-md" type="text" name="tempat_lahir">
               @error('tempat_lahir')
                  <div class="text-red-600">{{ $message }}</div>
               @enderror
            </label>
            <label for="tanggal_lahir" class="block"><span class="block capitalize">tanggal lahir</span>
               <input class="block w-full px-2 py-1 rounded-md" type="date" name="tanggal_lahir">
               @error('tanggal_lahir')
                  <div class="text-red-600">{{ $message }}</div>
               @enderror
            </label>
            <label for="jenis_kelamin" class="block"><span class="block capitalize">jenis kelamin</span>
               <select class="block w-full px-2 py-1 rounded-md" name="jenis_kelamin" id="jenis_kelamin">
                  <option value="0">laki-laki</option>
                  <option value="1">perempuan</option>
               </select>
               @error('jenis_kelamin')
                  <div class="text-red-600">{{ $message }}</div>
               @enderror
            </label>
            <label for="role_id" class="block"><span class="block capitalize">Daftar Sebagai</span>
               <select class="block w-full px-2 py-1 rounded-md" name="role_id" id="role_id">
                  @foreach ($user_roles as $ur => $data)
                     <option value="{{ $data->id }}">{{ str_replace('_', ' ', $data->name) }}
                     </option>
                  @endforeach
               </select>
               @error('role_id')
                  <div class="text-red-600">{{ $message }}</div>
               @enderror
            </label>
         @endif
         <label for="password" class="block"><span class="block">Password</span>
            <input class="block w-full px-2 py-1 rounded-md" type="password" name="password">
            @error('password')
               <div class="text-red-600">{{ $message }}</div>
            @enderror
         </label>
         <button
            class="px-2 py-1 bg-blue-500 rounded-md text-white text-center w-20 justify-self-center">{{ Request::is('register') ? 'Daftar' : 'Masuk' }}</button>
         @if (Request::is('register'))
            <span class="text-center">Sudah terdaftar? <a href="{{ route('auth.loginForm') }}" class="font-semibold">Login
                  Sekarang!</a></span>
         @else
            <span class="text-center">Belum terdaftar? <a href="{{ route('auth.registerForm') }}"
                  class="font-semibold">Daftar
                  Disini!</a></span>
         @endif
      </form>
   </div>
@endsection
