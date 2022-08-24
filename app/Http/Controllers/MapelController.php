<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Mata Pelajaran',
            'mapel' => Mapel::latest()->get()
        ];

        return view('pages.mapel.all-mapel', $data);
    }
    public function detail(Mapel $mapel)
    {
        $data = [
            'title' => 'Detail Mata Pelajaran',
            'mapel' => $mapel
        ];
        return view('pages.mapel.detail-mapel', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Mata Pelajaran Baru'
        ];

        return view('pages.mapel.create-mapel', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required:string',
            'kelas' => 'required|numeric',
            'deskripsi' => 'required|string'
        ]);

        $bool = Mapel::create($validated);
        if ($bool) {
            return back()->with('success', 'Mata Pelajaran Berhasil Ditambah');
        }
        return back()->with('error', 'Mata Pelajaran Gagal Ditambah');
    }

    public function update(Mapel $mapel)
    {
        $data = [
            'title' => 'Perbaharui Mata Pelajaran',
            'mapel' => $mapel
        ];
        return view('pages.mapel.edit-mapel', $data);
    }

    public function patch(Mapel $mapel, Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'kelas' => 'required|numeric',
            'deskripsi' => 'required|string'
        ]);

        $bool = $mapel->update($validated);
        if ($bool) {
            return back()->with('success', 'Mata Pelajaran Berhasil Diubah');
        }
        return back()->with('error', 'Mata Pelajaran Gagal Diubah');
    }

    public function delete(Mapel $mapel)
    {
        $bool = $mapel->delete();
        if ($bool) {
            return back()->with('success', 'Mata Pelajaran Berhasil Dihapus');
        }
        return back()->with('error', 'Mata Pelajaran Gagal Dihapus');
    }
}
