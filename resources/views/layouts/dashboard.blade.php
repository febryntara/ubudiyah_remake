<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>{{ $title }}</title>
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
</head>

<body>
   <div class="w-[100vw] pl-[20vw] relative">
      <ul class="fixed top-0 left-0 w-[20vw] bg-blue-400 h-[100vh] p-2">
         <h2 class="pl-3 text-2xl uppercase mb-5">///-----///</h2>
         <li>
            <a class="sidebar-item {{ Request::is('dashboard') ? 'sidebar-item__active' : null }}"
               href="{{ route('pages.dashboard') }}">Dashboard</a>
         </li>
         <li><a class="sidebar-item {{ Request::is('dashboard/siswa') ? 'sidebar-item__active' : null }}"
               href="/dashboard/siswa">Siswa</a></li>
         <li><a class="sidebar-item {{ Request::is('dashboard/mapel') ? 'sidebar-item__active' : null }}"
               href="{{ route('auth.mapel.all') }}">Mata Pelajaran</a></li>
         <li><a class="sidebar-item {{ Request::is('dashboard/manajemen-akun') ? 'sidebar-item__active' : null }}"
               href="{{ route('auth.manajemen-user') }}">Manajemen Akun</a></li>
         <li><a class="sidebar-item {{ Request::is('dashboard/kegiatan') ? 'sidebar-item__active' : null }}"
               href="{{ route('auth.schoolEvent.all') }}">Kegiatan Sekolah</a></li>
      </ul>
      <div class="p-2 w-full">
         @yield('content')
      </div>
   </div>

   @if (session()->has('success'))
      <div id="alert-dialog" class="alert-element">
         <div class="w-[20vw] h-[15vh] bg-white rounded-sm p-2 text-center">
            <div class="text-green-500 font-semibold capitalize">success!</div>
            <div class="mt-4">{{ session('success') }}</div>
         </div>
      </div>
   @endif
   @if (session()->has('error'))
      <div id="alert-dialog" class="alert-element">
         <div class="w-[20vw] h-[15vh] bg-white rounded-sm p-2 text-center">
            <div class="text-red-500 font-semibold capitalize">error!</div>
            <div class="mt-4">{{ session('error') }}</div>
         </div>
      </div>
   @endif

   <script>
      $('#alert-dialog').ready(function() {
         setTimeout(function() {
            $('#alert-dialog').fadeOut('fast');
         }, 1500);
      });
   </script>
</body>

</html>
