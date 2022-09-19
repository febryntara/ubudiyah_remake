@extends('layouts.dashboard')

@section('content')
   {{-- {{ Request::is('dashboard/manajemen-akun*') ? 'OKE' : 'LOL' }} --}}
   <form class="grid grid-cols-2 gap-y-2 gap-x-3" method="post"
      action="{{ Request::is('dashboard/manajemen-akun*') ? route('auth.manajemen-user.patch', ['user' => $user]) : route('pages.data-diri.patch', ['user' => $user]) }}">
      @csrf
      @method('patch')
      <div class="col-span-2">
         <a href="{{ route('auth.manajemen-user') }}"
            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Kembali
            Ke Awal</a>
         <a href="{{ route('auth.manajemen-user.detail', ['user' => $user]) }}"
            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Kembali</a>
         <button type="sumbit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>
      </div>
      <div class="col-span-2 ">
         <img class="w-[200px] h-[250px] object-cover"
            src="{{ isset($user->image->src) ? asset('storage/' . $user->image->src) : 'https://i.pinimg.com/474x/97/7f/e7/977fe798cf2c3a037e7aa9af6ce4b9d1.jpg' }}"
            alt="default profile">
         <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload
            Gambar</label>
         <input name="image"
            class="block w-[200px] text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="file_input_help" id="file_input" type="file">
         <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or JPEG .</p>

      </div>
      <div class="">
         <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama</label>
            <input type="text" id="name" value="{{ old('name') ?? $user->name }}"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="nama" required name="name">
            @error('name')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <div>
            <label for="umur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Umur</label>
            <input type="number" id="umur" value="{{ old('umur') ?? $user->umur }}"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="nama" required name="umur">
            @error('umur')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <div>
            <label for="role_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Status</label>
            <select id="role_id" name="role_id"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
               @foreach ($user_roles as $ur => $data)
                  <option value="{{ old('role_id') ?? $data->id }}" {{ $user->role_id == $data->id ? 'selected' : null }}>
                     {{ str_replace('_', ' ', $data->name) }}
                  </option>
               @endforeach
            </select>
            @error('role_id')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <div>
            <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tempat
               Lahir</label>
            <input type="text" id="tempat_lahir" value="{{ old('tempat_lahir') ?? $user->tempat_lahir }}"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="nama" required name="tempat_lahir">
            @error('tempat_lahir')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <div>
            <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal
               Lahir</label>
            <input type="date" id="tanggal_lahir" value="{{ old('tanggal_lahir') ?? $user->tanggal_lahir }}"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="nama" required name="tanggal_lahir">
            @error('tanggal_lahir')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <div>
            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jenis
               Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
               <option value="0" {{ $user->jenis_kelamin == 0 ? 'selected' : null }}>Laki laki</option>
               <option value="1" {{ $user->jenis_kelamin == 1 ? 'selected' : null }}>perempuan</option>
            </select>
            @error('jenis_kelamin')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
      </div>
      <div class="">
         @if ($user->role_id == 1)
            <div>
               <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nis</label>
               <input type="text" id="nis" value="{{ old('nis') ?? $user->nis }}"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="nama" required name="nis">
               @error('nis')
                  <div class="text-red-500 text-xs">{{ $message }}</div>
               @enderror
            </div>
            <div>
               <label for="nisn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nisn</label>
               <input type="text" id="nisn" value="{{ old('nisn') ?? $user->nisn }}"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="nama" required name="nisn">
               @error('nisn')
                  <div class="text-red-500 text-xs">{{ $message }}</div>
               @enderror
            </div>
            <div>
               <label for="cita_cita"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cita-cita</label>
               <input type="text" id="cita_cita" value="{{ old('cita_cita') ?? $user->cita_cita }}"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="nama" required name="cita_cita">
               @error('cita_cita')
                  <div class="text-red-500 text-xs">{{ $message }}</div>
               @enderror
            </div>
            <div>
               <label for="kelas"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kelas</label>
               <select id="kelas" name="kelas"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  @for ($i = 1; $i <= 12; $i++)
                     <option value="{{ $i }}" {{ $user->kelas == $i ? 'selected' : null }}>
                        {{ $i }}
                     </option>
                  @endfor
               </select>
               @error('kelas')
                  <div class="text-red-500 text-xs">{{ $message }}</div>
               @enderror
            </div>
            <div>
               <label for="moto_hidup" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Moto
                  Hidup</label>
               <input type="text" id="moto_hidup" value="{{ old('moto_hidup') ?? $user->moto_hidup }}"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="nama" required name="moto_hidup">
               @error('moto_hidup')
                  <div class="text-red-500 text-xs">{{ $message }}</div>
               @enderror
            </div>
         @endif
         @if ($user->role_id == 3)
            <div>
               <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nip</label>
               <input type="text" id="nip" value="{{ old('nip') ?? $user->nip }}"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="nama" required name="nip">
               @error('nip')
                  <div class="text-red-500 text-xs">{{ $message }}</div>
               @enderror
            </div>
            <div>
               <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nik</label>
               <input type="text" id="nik" value="{{ old('nik') ?? $user->nik }}"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="nama" required name="nik">
               @error('nik')
                  <div class="text-red-500 text-xs">{{ $message }}</div>
               @enderror
            </div>
            <div>
               <label for="mapel_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mapel yang
                  Diampu</label>
               <select id="kelas" name="kelas"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  @foreach ($mapel as $index => $value)
                     <option value="{{ $value->id }}" {{ $user->mapel->id == $value->id ? 'selected' : null }}>
                        {{ $value->nama }}
                     </option>
                  @endforeach
               </select>
               @error('mapel_id')
                  <div class="text-red-500 text-xs">{{ $message }}</div>
               @enderror
            </div>
         @endif
      </div>
      <div class="">
         <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Demail</label>
            <input type="email" id="email" value="{{ old('email') ?? $user->email }}"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="Email" required name="email">
            @error('email')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <div>
            <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nik</label>
            <input type="text" id="nik" value="{{ old('nik') ?? $user->nik }}"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="nik" required name="nik">
            @error('nik')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <div>
            <label for="agama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Agama</label>
            <select id="agama" name="agama"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
               <option value="hindu" {{ $user->agama == 'hindu' ? 'selected' : null }}>Hindu</option>
               <option value="kristen" {{ $user->agama == 'kristen' ? 'selected' : null }}>Kristen</option>
               <option value="buddha" {{ $user->agama == 'buddha' ? 'selected' : null }}>Buddha</option>
               <option value="khatolik" {{ $user->agama == 'khatolik' ? 'selected' : null }}>Khatolik</option>
               <option value="konghucu" {{ $user->agama == 'konghucu' ? 'selected' : null }}>Konghucu</option>
               <option value="islam" {{ $user->agama == 'islam' ? 'selected' : null }}>Islam</option>
            </select>
            @error('agama')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <div>
            <label for="status_kawin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Status
               Kawin</label>
            <select id="status_kawin" name="status_kawin"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
               <option value="0" {{ $user->status_kawin == 0 ? 'selected' : null }}>Tidak Kawin</option>
               <option value="1" {{ $user->status_kawin == 1 ? 'selected' : null }}>kawin</option>
            </select>
            @error('status_kawin')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <div>
            <label for="kelurahan"
               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kelurahan</label>
            <input type="text" id="kelurahan" value="{{ old('kelurahan') ?? $user->kelurahan }}"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="kelurahan" required name="kelurahan">
            @error('kelurahan')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <div>
            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alamat</label>
            <input type="text" id="alamat" value="{{ old('alamat') ?? $user->alamat }}"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="alamat" required name="alamat">
            @error('alamat')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
         <div>
            <label for="kontak" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kontak</label>
            <input type="text" id="kontak" value="{{ old('kontak') ?? $user->kontak }}"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="kontak" required name="kontak">
            @error('kontak')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
      </div>
      <div class="grid grid-cols-2 gap-y-2">
         <div>
            <label for="status_akun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Status
               Akun</label>
            <select id="status_akun" name="status_akun"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
               <option value="tidak_aktif" {{ $user->status_akun == 'tidak_aktif' ? 'selected' : null }}>Tidak Aktif
               </option>
               <option value="aktif" {{ $user->status_akun == 'aktif' ? 'selected' : null }}>Aktif</option>
            </select>
            @error('status_akun')
               <div class="text-red-500 text-xs">{{ $message }}</div>
            @enderror
         </div>
      </div>
   </form>
@endsection
