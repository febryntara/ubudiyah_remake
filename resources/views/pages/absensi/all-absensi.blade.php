@extends('layouts.dashboard')
@section('content')
   <form class="mb-2" action="{{ route('auth.absensi.validasi') }}" method="get">
      {{-- @csrf --}}
      <label for="tanggal" class="capitalize"><span>tanggal</span>
         <input class="px-2 py-1 rounded-md" type="date" name="tanggal">
      </label>
      <label for="kelas" class="capitalize"><span>kelas</span>
         <input class="px-2 py-1 rounded-md w-20" type="number" name="kelas">
      </label>
      <button class="primary-dashboard-btn text-xs">buat absen</button>
   </form>

   <div>
      <table class="block w-full">
         <thead>
            <tr>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse" rowspan="2">#</th>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse" rowspan="2">Kelas</th>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse" rowspan="2">Tanggal</th>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse" colspan="4">Keterangan</th>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse" rowspan="2">Total</th>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse" rowspan="2">&nbsp;</th>
            </tr>
            <tr>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse">Hadir</th>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse">Ijin</th>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse">Sakit</th>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse">Alpa</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($absen as $item => $value)
               <tr class="text-center" valign="top">
                  <td class="py-2 border-[1px] border-black border-collapse">{{ $item + 1 }}</td>
                  <td class="py-2 border-[1px] border-black border-collapse">{{ $value->kelas }}</td>
                  <td class="py-2 border-[1px] border-black border-collapse">{{ $value->tanggal }}</td>
                  <td class="py-2 border-[1px] border-black border-collapse">{{ $value->hadir }}</td>
                  <td class="py-2 border-[1px] border-black border-collapse">{{ $value->ijin }}</td>
                  <td class="py-2 border-[1px] border-black border-collapse">{{ $value->sakit }}</td>
                  <td class="py-2 border-[1px] border-black border-collapse">{{ $value->alpa }}</td>
                  <td class="py-2 border-[1px] border-black border-collapse">
                     {{ $value->hadir + $value->ijin + $value->sakit + $value->alpa }}</td>
                  <td class="py-2 border-[1px] border-black border-collapse">
                     <a href="{{ route('auth.absensi.edit', ['absen' => $value]) }}"
                        class="warning-dashboard-btn text-xs">edit</a>
                     <form class="inline" action="{{ route('auth.absensi.delete', ['absen' => $value]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="danger-dashboard-btn text-xs"
                           onclick="return confirm('Yakin Menghapus Absen Kelas {{ $value->kelas }} di Tanggal {{ $value->tanggal }}?')">delete</button>
                     </form>
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
@endsection
