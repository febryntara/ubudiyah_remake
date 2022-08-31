<?php

namespace App\Http\Controllers;

use App\Models\DetailBayarSpp;
use App\Models\PembayaranSpp;
use App\Models\User;
use Illuminate\Http\Request;

class PembayaranSppController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Pembayaran SPP Siswa',
            'spp' => PembayaranSpp::latest()->get()
        ];
        return view('pages.pembayaran-spp.all-ps', $data);
    }

    public function detail(PembayaranSpp $spp)
    {
        $data = [
            'title' => 'Detail SPP Kelas ' . $spp->kelas,
            'spp' => $spp,
            'siswa' => User::where('role_id', 1)->where('kelas', $spp->kelas)->latest()->get()
        ];
        return view('pages.pembayaran-spp.detail-ps', $data);
    }

    public function pra_akses(Request $request)
    {
        $validated = $request->validate([
            'bulan' => 'required|string',
            'kelas' => 'required|numeric'
        ]);
        $bulan = explode('-', $validated['bulan']);
        // return $bulan;
        $condition = PembayaranSpp::where('kelas', $validated['kelas'])->whereMonth('created_at', $bulan[1])->whereYear('created_at', $bulan[0])->count();
        // return $condition;
        if ($condition == 0) {
            // return 'OK';
            return redirect()->route('auth.pembayaran-spp.create', ['bulan' => $validated['bulan'], 'kelas' => $validated['kelas']])->with('success', 'Menuju Halaman Pembayaran SPP!');
        }
        return back()->with('error', 'Pembayaran Bulan ' . date('M', strtotime($validated['bulan'])) . ' Sudah Dibuat!');
        // return 'NO';

    }

    public function create(Request $request)
    {
        $bulan = explode('-', $request->bulan);
        if (PembayaranSpp::where('kelas', $request->kelas)->whereMonth('created_at', $bulan[1])->whereYear('created_at', $bulan[0])->exists()) {
            return redirect()->route('auth.pembayaran-spp.all')->with('error', 'Pembayaran Bulan ' . date('M', strtotime($request->bulan)) . ' Sudah Dibuat!');
        }
        $data = [
            'title' => 'Buat Pembayaran SPP',
            'bulan' => $request->bulan,
            'kelas' => $request->kelas,
            'siswa' => User::where('role_id', 1)->where('kelas', $request->kelas)->latest()->get()
        ];
        return view('pages.pembayaran-spp.create-ps', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kelas' => 'required|numeric',
            'siswa.*.id' => 'required|numeric',
            'siswa.*.bayar' => 'required|boolean',
            'bulan' => 'required|string'
        ]);
        $sudah_bayar = 0;
        $belum_bayar = 0;
        $error_conter = 0;
        foreach ($validated['siswa'] as $item => $value) {
            switch ($value['bayar']) {
                case 1:
                    $sudah_bayar++;
                    break;
                default:
                    $belum_bayar++;
                    break;
            }
        }
        $pembayaran = PembayaranSpp::create([
            'kelas' => $validated['kelas'],
            'bulan' => $request->bulan,
            'sudah_bayar' => $sudah_bayar,
            'belum_bayar' => $belum_bayar,
        ]);
        if ($pembayaran) {
            foreach ($validated['siswa'] as $item => $value) {
                $bool = DetailBayarSpp::create([
                    'siswa_id' => $value['id'],
                    'pembayaran_id' => $pembayaran->id,
                    'status_bayar' => $value['bayar']
                ]);
                if (!$bool) {
                    $error_conter++;
                }
            }
            if ($error_conter != 0) {
                return redirect()->route('auth.pembayaran-spp.all')->with('success', 'Pembayaran SPP Berhasil Dibuat Dengan ' . $error_conter . ' Data Error!');
            }
            return redirect()->route('auth.pembayaran-spp.all')->with('success', 'Pembayaran SPP Berhasil Dibuat!');
        }
        return back()->with('error', "Error! Coba Ulang!");
    }

    public function edit(PembayaranSpp $spp)
    {
        $data = [
            'title' => 'Detail SPP Kelas ' . $spp->kelas,
            'spp' => $spp,
            'detail_spp' => DetailBayarSpp::where('pembayaran_id', $spp->id)->get(),
            'siswa' => User::where('role_id', 1)->where('kelas', $spp->kelas)->latest()->get()
        ];
        return view('pages.pembayaran-spp.edit-sp', $data);
    }

    public function patch(Request $request, PembayaranSpp $spp)
    {
        $validated = $request->validate([
            'siswa.*.id' => 'required|numeric',
            'siswa.*.bayar' => 'required|boolean',
        ]);
        $sudah_bayar = 0;
        $belum_bayar = 0;
        $error_conter = 0;
        foreach ($validated['siswa'] as $item => $value) {
            switch ($value['bayar']) {
                case 1:
                    $sudah_bayar++;
                    break;
                default:
                    $belum_bayar++;
                    break;
            }
        }
        $pembayaran = $spp->update([
            'sudah_bayar' => $sudah_bayar,
            'belum_bayar' => $belum_bayar,
        ]);
        if ($pembayaran) {
            foreach ($validated['siswa'] as $item => $value) {
                $bool = DetailBayarSpp::where('pembayaran_id', $spp->id)->where('siswa_id', $value['id'])->update([
                    'status_bayar' => $value['bayar']
                ]);
                if (!$bool) {
                    $error_conter++;
                }
            }
            if ($error_conter != 0) {
                return redirect()->route('auth.pembayaran-spp.all')->with('success', 'Pembayaran SPP Berhasil Diubah Dengan ' . $error_conter . ' Data Error!');
            }
            return redirect()->route('auth.pembayaran-spp.all')->with('success', 'Pembayaran SPP Berhasil Diubah!');
        }
        return back()->with('error', "Error! Coba Ulang!");
    }
    public function delete(PembayaranSpp $spp)
    {
        $bool = DetailBayarSpp::where('pembayaran_id', $spp->id)->delete();
        if ($bool) {
            $bool = $spp->delete();
            if ($bool) {
                return redirect()->route('auth.pembayaran-spp.all')->with('success', 'Data Berhasil Dihapus!');
            }
        }
        return back()->with('error', 'Data Gagal DIhapus, Coba Lagi!');
    }
}
