@extends('layouts.dashboard');
@section('content')
   <h2 class="text-2xl">Manajemen Pengguna</h2>
   <div class="grid gap-2 grid-cols-4">
      <a href="{{ route('auth.manajemen-user.register') }}"
         class="inline-flex items-center w-max py-2 px-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
         Tambah Pengguna
         <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
               d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
               clip-rule="evenodd"></path>
         </svg>
      </a>
   </div><br>

   <div class="overflow-x-auto relative">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
         <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
               <th scope="col" class="py-3 px-6">
                  #
               </th>
               <th scope="col" class="py-3 px-6">
                  Nama
               </th>
               <th scope="col" class="py-3 px-6">
                  Email
               </th>
               <th scope="col" class="py-3 px-6">
                  Status
               </th>
               <th scope="col" class="py-3 px-6">
                  Jenis Kelamin
               </th>
               <th scope="col" class="py-3 px-6">
                  Kontak
               </th>
               <th scope="col" class="py-3 px-6">
                  Aksi
               </th>
            </tr>
         </thead>
         <tbody>
            @foreach ($users as $item => $value)
               <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <td class="py-4 px-6">
                     {{ $item + 1 }}
                  </td>
                  <td class="py-4 px-6">
                     {{ $value->name }}
                  </td>
                  <td class="py-4 px-6">
                     {{ $value->email }}
                  </td>
                  <td class="py-4 px-6">
                     {{ $value->userRole->name }}
                  </td>
                  <td class="py-4 px-6">
                     {{ $value->jenis_kelamin == 0 ? 'L' : 'P' }}
                  </td>
                  <td class="py-4 px-6">
                     {{ $value->kontak ?? 'belum diisi' }}
                  </td>
                  <td class="py-4 px-6">
                     <a href="{{ route('auth.manajemen-user.detail', ['user' => $value]) }}"
                        class="inline-flex items-center py-2 px-1 w-[68px] text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Detail
                        <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                           xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                        </svg>
                     </a>
                     <form class="inline-flex mt-1" action="{{ route('auth.manajemen-user.delete', ['user' => $value]) }}"
                        method="post">
                        @csrf
                        @method('delete')
                        <button
                           class="inline-flex items-center py-2 px-1 w-[68px] text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                           Hapus
                           <svg class="ml-2 -mr-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path d="M3 6h18"></path>
                              <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                              <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                              <line x1="10" y1="11" x2="10" y2="17"></line>
                              <line x1="14" y1="11" x2="14" y2="17"></line>
                           </svg>
                        </button>
                     </form>
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>

   {{-- <table class="block w-full">
      <thead>
         <tr>
            <th class="w-[150px] py-2 border-[1px] border-black border-collapse">#</th>
            <th class="w-[150px] py-2 border-[1px] border-black border-collapse">Nama</th>
            <th class="w-[150px] py-2 border-[1px] border-black border-collapse">Email</th>
            <th class="w-[150px] py-2 border-[1px] border-black border-collapse">Status</th>
            <th class="w-[150px] py-2 border-[1px] border-black border-collapse">Jenis Kelamin</th>
            <th class="w-[150px] py-2 border-[1px] border-black border-collapse">Kontak</th>
            <th class="w-[150px] py-2 border-[1px] border-black border-collapse">&nbsp;</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($users as $item => $value)
            <tr class="text-center" valign="top">
               <td class="py-2 border-[1px] border-black border-collapse">{{ $item + 1 }}</td>
               <td class="py-2 border-[1px] border-black border-collapse">{{ $value->name }}</td>
               <td class="py-2 border-[1px] border-black border-collapse">{{ $value->email }}</td>
               <td class="py-2 border-[1px] border-black border-collapse">{{ $value->userRole->name }}</td>
               <td class="py-2 border-[1px] border-black border-collapse">
                  {{ $value->jenis_kelamin == 0 ? 'Laki laki' : 'Perempuan' }}</td>
               <td class="py-2 border-[1px] border-black border-collapse">{{ $value->kontak ?? 'belum diisi' }}</td>
               <td class="py-2 border-[1px] border-black border-collapse">
                  <a href="{{ route('auth.manajemen-user.detail', ['user' => $value]) }}"
                     class="primary-dashboard-btn text-sm my-2">detail</a>
                  <a href="{{ route('auth.manajemen-user.edit', ['user' => $value]) }}"
                     class="warning-dashboard-btn text-sm my-2">edit</a>
                  <form action="{{ route('auth.manajemen-user.delete', ['user' => $value]) }}" method="post">
                     @csrf
                     @method('delete')
                     <button class="danger-dashboard-btn text-sm my-2"
                        onclick="return confirm('yakin menghapus akun {{ $value->name }}?')">delete</button>
                  </form>
               </td>
            </tr>
         @endforeach
      </tbody>
   </table> --}}
@endsection
