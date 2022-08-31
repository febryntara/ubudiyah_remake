@extends('layouts.dashboard')

@section('content')
   <form class="flex gap-2" method="get" action="{{ route('auth.pembayaran-spp.pra-akses') }}">
      <label for="bulan">
         <span>Bulan</span>
         <input type="month" name="bulan" id="bulan">
      </label>
      <label for="kelas">
         <span>Kelas</span>
         <input type="number" name="kelas" id="kelas">
      </label>
      <button class="primary-dashboard-btn text-xs">Tambah Pembayaran SPP</button>
   </form>
   <div>
      <table class="block w-full">
         <thead>
            <tr>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse" rowspan="2">#</th>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse" rowspan="2">Kelas</th>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse" rowspan="2">Bulan</th>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse" colspan="2">Keterangan</th>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse" rowspan="2">Total</th>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse" rowspan="2">&nbsp;</th>
            </tr>
            <tr>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse">Sudah Bayar</th>
               <th class="w-[150px] py-2 border-[1px] border-black border-collapse">Belum Bayar</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($spp as $item => $value)
               <tr class="text-center" valign="top">
                  <td class="py-2 border-[1px] border-black border-collapse">{{ $item + 1 }}</td>
                  <td class="py-2 border-[1px] border-black border-collapse">{{ $value->kelas }}</td>
                  <td class="py-2 border-[1px] border-black border-collapse">
                     {{ date('M - Y', strtotime($value->bulan)) }}</td>
                  <td class="py-2 border-[1px] border-black border-collapse">{{ $value->sudah_bayar }}</td>
                  <td class="py-2 border-[1px] border-black border-collapse">{{ $value->belum_bayar }}</td>
                  <td class="py-2 border-[1px] border-black border-collapse">
                     {{ $value->sudah_bayar + $value->belum_bayar }}</td>
                  <td class="py-2 border-[1px] border-black border-collapse">
                     <a href="{{ route('auth.pembayaran-spp.edit', ['spp' => $value]) }}"
                        class="warning-dashboard-btn text-xs">edit</a>
                     <form class="inline" action="{{ route('auth.pembayaran-spp.delete', ['spp' => $value]) }}"
                        method="post">
                        @csrf
                        @method('delete')
                        <button class="danger-dashboard-btn text-xs"
                           onclick="return confirm('Yakin Menghapus Pembayaran {{ $value->kelas }} di Bulan {{ date('M - Y', strtotime($value->created_at)) }}?')">delete</button>
                     </form>
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
@endsection
