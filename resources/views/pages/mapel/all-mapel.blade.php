@extends('layouts.dashboard')

@section('content')
   <h2 class="text-2xl">Mata Pelajaran</h2>
   <div class="grid gap-2 grid-cols-4">
      <a href="{{ route('auth.mapel.create') }}"
         class="inline-flex items-center w-max py-2 px-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
         Tambah Mata Pelajaran
         <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
               d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
               clip-rule="evenodd"></path>
         </svg>
      </a>
   </div><br>
   <div class="grid gap-2 grid-cols-4">
      @foreach ($mapel as $item => $value)
         <div
            class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
               <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $value->nama }}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $value->deskripsi }}</p>
            <a href="{{ route('auth.mapel.detail', ['mapel' => $value]) }}"
               class="inline-flex items-center py-2 px-1 w-[68px] text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
               Detail
               <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                     d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                     clip-rule="evenodd"></path>
               </svg>
            </a>
            <a href="{{ route('auth.mapel.edit', ['mapel' => $value]) }}"
               class="inline-flex items-center py-2 px-1 w-[68px] text-sm font-medium text-center text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-400 dark:hover:bg-orange-500 dark:focus:ring-orange-600">
               Ubah
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="ml-2 -mr-1 w-4 h-4">
                  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
               </svg>
            </a>
            <form class="inline-flex" action="{{ route('auth.mapel.delete', ['mapel' => $value]) }}" method="post">
               @csrf
               @method('delete')
               <button
                  class="inline-flex items-center py-2 px-1 w-[68px] text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                  Hapus
                  <svg class="ml-2 -mr-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round">
                     <path d="M3 6h18"></path>
                     <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                     <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                     <line x1="10" y1="11" x2="10" y2="17"></line>
                     <line x1="14" y1="11" x2="14" y2="17"></line>
                  </svg>
               </button>
            </form>
         </div>
      @endforeach
   </div>
@endsection
