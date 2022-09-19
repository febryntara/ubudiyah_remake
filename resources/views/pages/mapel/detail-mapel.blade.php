@extends('layouts.dashboard')

@section('content')
   <div class="w-full md:w-[50%] bg-white rounded-lg border shadow-md dark:bg-gray-800 dark:border-gray-700">
      <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 bg-gray-50 rounded-t-lg border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
         id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
         <li class="mr-2">
            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about"
               aria-selected="true"
               class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500 hover:text-blue-600 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500">Detail</button>
         </li>
         <li class="mr-2">
            <button id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services"
               aria-selected="false"
               class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700">Ubah</button>
         </li>
      </ul>
      <div id="defaultTabContent">
         <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800 hidden" id="about" role="tabpanel"
            aria-labelledby="about-tab">
            <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">{{ $mapel->nama }}</h2>
            <p class="mb-3 text-gray-500 dark:text-gray-400">{{ $mapel->deskripsi }}</p>
         </div>
         <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services" role="tabpanel"
            aria-labelledby="services-tab">
            <form action="{{ route('auth.mapel.patch', ['mapel' => $mapel]) }}" method="post">
               @csrf
               @method('patch')
               <div class="mb-6">
                  <label for="nama"
                     class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama</label>
                  <input type="text" id="nama" value="{{ old('nama') ?? $mapel->nama }}" name="nama"
                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                     placeholder="john.doe@company.com" required>
                  @error('nama')
                     <div class="text-red-600">{{ $message }}</div>
                  @enderror
               </div>
               <div class="mb-6">
                  <label for="kelas"
                     class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama</label>
                  <input type="number" id="kelas" value="{{ old('kelas') ?? $mapel->kelas }}" name="kelas"
                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                     placeholder="john.doe@company.com" required>
                  @error('kelas')
                     <div class="text-red-600">{{ $message }}</div>
                  @enderror
               </div>

               <label for="deskripsi"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Deskripsi</label>
               <textarea id="deskripsi" rows="4"
                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Your message..." name="deskripsi">{{ old('deskripsi') ?? $mapel->deskripsi }}</textarea>
               @error('deskripsi')
                  <div class="text-red-600">{{ $message }}</div>
               @enderror

               <button type="submit"
                  class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
            </form>
         </div>
      </div>
   </div>
   <br><br>
   <div class="">
      <a href="{{ route('auth.mapel.all') }}"
         class="inline-flex py-2 items-center font-medium text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-700">
         Kembali
         <svg class="ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
               d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
               clip-rule="evenodd"></path>
         </svg>
      </a>
   </div>
@endsection
