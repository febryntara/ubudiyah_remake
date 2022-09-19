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
      {{-- <aside class="fixed top-0 left-0 w-[20vw] p-2 h-[100vh] bg-blue-500" aria-label="Sidebar">
         <div class="overflow-y-auto py-4 px-3 rounded dark:bg-gray-800">
            <ul class="space-y-2">
               @can('guru')
                  <li>
                     <a href="{{ route('pages.dashboard') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                           class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                           fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                           <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                     </a>
                  </li>
                  <li>
                     <a href="dashboard/siswa"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                           class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                           fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                           <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Daftar Siswa</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{ route('auth.mapel.all') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                           class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                           fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                           <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Mata Pelajaran</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{ route('auth.schoolEvent.all') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                           class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                           fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                           <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Kegiatan Sekolah</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{ route('auth.absensi.all') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                           class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                           fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                           <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Absensi Siswa</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{ route('auth.pembayaran-spp.all') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                           class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                           fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                           <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Pembayaran SPP</span>
                     </a>
                  </li>
               @endcan
               @can('siswa')
                  <li>
                     <a href="{{ route('pages.dashboard') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                           class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                           fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                           <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{ route('pages.data-diri') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                           class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                           fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                           <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Data Diri</span>
                     </a>
                  </li>
               @endcan
               @can('umum')
                  <li>
                     <a href="{{ route('pages.dashboard') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                           class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                           fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                           <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                     </a>
                  </li>
               @endcan
            </ul>
         </div>
      </aside> --}}

      <div class="fixed top-0 left-0 w-[20vw] bg-blue-600 h-[100vh] p-2">
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
      <div id="popup-modal" tabindex="-1"
         class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
         <div
            class="relative top-[50%] left-[50%] -translate-x-[50%] -translate-y-[50%] p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
               <button type="button"
                  class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                  data-modal-toggle="popup-modal">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                  </svg>
                  <span class="sr-only">Close modal</span>
               </button>
               <div class="p-6 text-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round" class="mx-auto mb-4 w-14 h-14 text-green-500 dark:text-gray-200">
                     <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                     <polyline points="22 4 12 14.01 9 11.01"></polyline>
                  </svg>
                  <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{ session('success') }}</h3>
               </div>
            </div>
         </div>
      </div>
   @endif
   @if (session()->has('error'))
      <div id="popup-modal" tabindex="-1"
         class="overflow-y-auto overflow-x-hidden fixed z-50 md:inset-0 h-modal md:h-full">
         <div
            class="relative top-[50%] left-[50%] -translate-x-[50%] -translate-y-[50%] p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
               <button type="button"
                  class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                  data-modal-toggle="popup-modal">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                  </svg>
                  <span class="sr-only">Close modal</span>
               </button>
               <div class="p-6 text-center">
                  <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-red-500 dark:text-gray-200" fill="none"
                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{ session('error') }}</h3>
               </div>
            </div>
         </div>
      </div>
   @endif

   <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
   <script>
      $('#popup-modal').ready(function() {
         setTimeout(function() {
            $('#popup-modal').fadeOut('fast');
         }, 1500);
      });
   </script>
</body>

</html>
