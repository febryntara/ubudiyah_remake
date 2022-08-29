<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\DetailAbsensi;
use App\Models\User;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Absensi',
            'absen' => Absensi::latest()->get()
        ];
        return view('pages.absensi.all-absensi', $data);
    }

    public function validasiSebelumAbsen(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kelas' => 'required|numeric|max:12|min:1'
        ]);
        if ($request->tanggal == null || $request->kelas == null) {
            return back()->with('error', 'Tanggal atau Kelas Kosong, Coba Ulang!');
        }
        if (!Absensi::where('tanggal', $validated['tanggal'])->where('kelas', $validated['kelas'])->exists()) {
            return redirect()->route('auth.absensi.create', ['kelas' => $validated['kelas'], 'tanggal' => $validated['tanggal']]);
        }
        return back()->with('error', 'Absen Sudah Dilakukan, Pastikan Kelas dan Tanggal Sudah Benar!');
    }

    public function create(Request $request)
    {
        $data = [
            'title' => 'Buat Absensi Hari Ini',
            'absen_id' => $request->absen_id,
            'kelas' => $request->kelas,
            'tanggal' => $request->tanggal,
            'siswa' => User::where('role_id', 1)->where('kelas', $request->kelas)->latest()->get()
        ];
        return view('pages.absensi.create-absensi', $data);
    }

    public function store(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'kelas' => 'required',
            'absensi_id' => 'numeric|nullable',
            'tanggal' => 'required|date',
            'siswa.*.id' => 'required|numeric',
            'siswa.*.absen' => 'required|numeric'
        ]);
        if (Absensi::where('tanggal', $validated['tanggal'])->where('kelas', $validated['kelas'])->exists()) {
            return redirect()->route('auth.absensi.all')->with('error', 'Absen Tanggal ' . $validated['tanggal'] . ' Sudah Dibuat! Pilih Tanggal Lain!');
        }
        $error_counter = Absensi::absensi_counter($validated, 0, 'create');
        if ($error_counter == 0) {
            return redirect()->route('auth.absensi.all')->with('success', 'Absensi Berhasil Dibuat!');
        } else {
            return redirect()->route('auth.absensi.all')->with('success', 'Absensi Berhasil Dibuat Dengan ' . $error_counter . ' Jumlah Data Error!');
        }
        return back()->with('error', 'Absensi Gagal Dibuat!');
    }

    public function edit(Absensi $absen)
    {
        $data = [
            'title' => 'Ubah Absensi',
            'absen' => $absen,
            'siswa' => User::where('role_id', 1)->where('kelas', $absen->kelas)->latest()->get(),
            'detail_absen' => DetailAbsensi::where('absensi_id', $absen->id)->get()
        ];
        return view('pages.absensi.edit-absensi', $data);
    }

    public function patch(Request $request, Absensi $absen)
    {
        $validated = $request->validate([
            'kelas' => 'required',
            'absensi_id' => 'numeric|nullable',
            'tanggal' => 'required|date',
            'siswa.*.id' => 'required|numeric',
            'siswa.*.absen' => 'required|numeric'
        ]);

        $error_counter = Absensi::absensi_counter($validated, 0, 'update', $absen);
        if ($error_counter == 0) {
            return redirect()->route('auth.absensi.all')->with('success', 'Absensi Berhasil Diubah!');
        } else {
            return redirect()->route('auth.absensi.all')->with('success', 'Absensi Berhasil Diubah Dengan ' . $error_counter . ' Jumlah Data Error!');
        }
        return back()->with('error', 'Absensi Gagal Diubah!');
    }
    public function delete(Absensi $absen)
    {
        $bool = $absen->delete();
        if ($bool) {
            return redirect()->route('auth.absensi.all')->with('success', 'Absensi Berhasil Dihapus!');
        }
        return back()->with('error', 'Absensi Gagal Dihapus!');
    }
}
