@extends('layouts.dashboard');
@section('content')
   <div>
      <a href="{{ route('auth.manajemen-user.register') }}" class="capitalize primary-dashboard-btn">tambahkan pengguna</a>
   </div>
   <table class="block w-full">
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
   </table>
@endsection
