<?php

namespace App\Http\Controllers;

use App\Models\SchoolEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'gambar.*' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:2500',
        ]);
        $bool = SchoolEvent::create($validated);
        if ($bool) {
            foreach ($request->file('gambar') as $item => $value) {
                $img_src = $value->store('dynamic_images');
                $bool->images()->create([
                    'src' => $img_src
                ]);
            }
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
            'waktu_selesai' => 'string|nullable',
            'gambar.*' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:2500',
        ]);
        // dd($schoolEvent->images);
        $bool = $schoolEvent->update($validated);
        // return $schoolEvent->images->count();
        if ($bool) {
            if (!is_null($request->file('gambar'))) {
                if ($schoolEvent->images->count() > count($request->file('gambar'))) {
                    foreach ($schoolEvent->images as $key => $value) {
                        Storage::delete($value->src);
                    }
                    $schoolEvent->images()->delete();
                }
                foreach ($request->file('gambar') as $item => $value) {
                    if ($item < $schoolEvent->images->count()) {
                        Storage::delete($schoolEvent->images[$item]->src);
                    }
                    $is_delete = isset($schoolEvent->images[$item]) ? $schoolEvent->images[$item]->delete() : true;
                    if ($is_delete) {
                        $img_src = $value->store('dynamic_images');
                        $schoolEvent->images()->create([
                            'src' => $img_src
                        ]);
                    }
                }
            }
            return back()->with('success', 'Kegiatan Berhasil Diperbaharui');
        }
        return back()->with('error', 'Kegiatan Gagal Diperbaharui');
    }

    public function delete(SchoolEvent $schoolEvent)
    {
        foreach ($schoolEvent->images as $key => $value) {
            Storage::delete($value->src);
        }
        $schoolEvent->images()->delete();
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