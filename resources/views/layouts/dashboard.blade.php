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
      <div class="fixed top-0 left-0 w-[20vw] bg-blue-400 h-[100vh] p-2">
         <h2 class="pl-3 text-2xl uppercase mb-5">Ubudiyah</h2>
         @can('guru')
            <h4 class="pl-3 text-lg text-gray-400 uppercase mb-2">Guru</h4>
            <ul class="">
               <li>
                  <a class="sidebar-item {{ Request::is('dashboard') ? 'sidebar-item__active' : null }}"
                     href="{{ route('pages.dashboard') }}">Dashboard Guru</a>
               </li>
               <li><a class="sidebar-item {{ Request::is('dashboard/siswa') ? 'sidebar-item__active' : null }}"
                     href="/dashboard/siswa">Siswa</a></li>
               <li><a class="sidebar-item {{ Request::is('dashboard/mapel') ? 'sidebar-item__active' : null }}"
                     href="{{ route('auth.mapel.all') }}">Mata Pelajaran</a></li>
               <li><a class="sidebar-item {{ Request::is('dashboard/manajemen-akun') ? 'sidebar-item__active' : null }}"
                     href="{{ route('auth.manajemen-user') }}">Manajemen Akun</a></li>
               <li><a class="sidebar-item {{ Request::is('dashboard/kegiatan') ? 'sidebar-item__active' : null }}"
                     href="{{ route('auth.schoolEvent.all') }}">Kegiatan Sekolah</a></li>
               <li><a class="sidebar-item {{ Request::is('dashboard/absensi') ? 'sidebar-item__active' : null }}"
                     href="{{ route('auth.absensi.all') }}">Absensi Siswa</a></li>
               <li><a class="sidebar-item {{ Request::is('dashboard/pembayaran-spp') ? 'sidebar-item__active' : null }}"
                     href="{{ route('auth.pembayaran-spp.all') }}">Pembayaran SPP</a></li>
            </ul>
         @endcan
         @can('siswa')
            <ul class="">
               <li>
                  <a class="sidebar-item {{ Request::is('dashboard') ? 'sidebar-item__active' : null }}"
                     href="{{ route('pages.dashboard') }}">Dashboard Siswa</a>
               </li>
               <li>
                  <a class="sidebar-item {{ Request::is('dashboard/data-diri') ? 'sidebar-item__active' : null }}"
                     href="{{ route('pages.data-diri') }}">Data Diri</a>
               </li>
            </ul>
         @endcan
         @can('umum')
            <ul class="">
               <li>
                  <a class="sidebar-item {{ Request::is('dashboard') ? 'sidebar-item__active' : null }}"
                     href="{{ route('pages.dashboard') }}">Dashboard Umum</a>
               </li>
            </ul>
         @endcan
         <ul>
            <li>
               <a class="sidebar-item" href="{{ route('auth.logout') }}">Logout</a>
            </li>
         </ul>
      </div>
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
