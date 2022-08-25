<?php

namespace App\Http\Controllers;

use App\Models\SchoolEvent;
use Illuminate\Http\Request;

class SchoolEventController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Kegiatan',
            'acara' => SchoolEvent::latest()->get()
        ];
        return view('pages.kegiatan.allKegiatan', $data);
    }
    public function detail(SchoolEvent $schoolEvent)
    {
        $data = [
            'title' => 'Daftar Kegiatan',
            'acara' => $schoolEvent
        ];
        return view('pages.kegiatan.detailKegiatan', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kegiatan Baru',
        ];
        return view('pages.kegiatan.addKegiatan', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'ketua_panitia' => 'required|string',
            'penanggung_jawab' => 'required|string',
            'jumlah_peserta' => 'required|numeric',
            'tanggal_mulai' => 'date|nullable',
            'tanggal_selesai' => 'date|nullable',
            'waktu_mulai' => 'string|nullable',
            'waktu_selesai' => 'string|nullable',
        ]);

        $bool = SchoolEvent::create($validated);
        if ($bool) {
            return redirect()->route('auth.schoolEvent.all')->with('success', 'Kegiatan Berhasil Dibuat');
        }
        return redirect()->route('auth.schoolEvent.all')->with('error', 'Kegiatan Gagal Dibuat');
    }

    public function edit(SchoolEvent $schoolEvent)
    {
        $data = [
            'title' => 'Perbaharui Kegiatan',
            'acara' => $schoolEvent
        ];
        return view('pages.kegiatan.editKegiatan', $data);
    }

    public function patch(SchoolEvent $schoolEvent, Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'ketua_panitia' => 'required|string',
            'penanggung_jawab' => 'required|string',
            'jumlah_peserta' => 'required|numeric',
            'tanggal_mulai' => 'date|nullable',
            'tanggal_selesai' => 'date|nullable',
            'waktu_mulai' => 'string|nullable',
            'waktu_selesai' => 'string|nullable'
        ]);

        $bool = $schoolEvent->update($validated);
        if ($bool) {
            return back()->with('success', 'Kegiatan Berhasil Diperbaharui');
        }
        return back()->with('error', 'Kegiatan Gagal Diperbaharui');
    }

    public function delete(SchoolEvent $schoolEvent)
    {
        $bool = $schoolEvent->delete();
        if ($bool) {
            return redirect()->route('auth.schoolEvent.all')->with('success', 'Kegiatan Berhasil Dihapus');
        }
        return redirect()->route('auth.schoolEvent.all')->with('error', 'Kegiatan Gagal Dihapus');
    }

    public function statusChange(SchoolEvent $schoolEvent, Request $request)
    {
        $validated = $request->validate([
            'status_kegiatan' => 'required|string'
        ]);
        $bool = $schoolEvent->update($validated);
        if ($bool) {
            return back()->with('success', 'Status Kegiatan Berhasil Diperbaharui');
        }
        return back()->with('error', 'Status Kegiatan Gagal Diperbaharui');
    }
}
