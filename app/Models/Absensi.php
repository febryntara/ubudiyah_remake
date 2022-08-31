<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function absensi_counter($validated_request, $error_counter_return = 0, $do = 'create', ?Absensi $absensi = null)
    {
        $hadir = 0;
        $ijin = 0;
        $sakit = 0;
        $alpa = 0;
        foreach ($validated_request['siswa'] as $data => $value) {
            switch ($value['absen']) {
                case 1:
                    $hadir++;
                    break;
                case 2:
                    $ijin++;
                    break;
                case 3:
                    $sakit++;
                    break;
                default:
                    $alpa++;
                    break;
            }
        }
        if ($do == 'create') {
            $absen = Absensi::create([
                'kelas' => $validated_request['kelas'],
                'hadir' => $hadir,
                'ijin' => $ijin,
                'sakit' => $sakit,
                'alpa' => $alpa,
                'tanggal' => $validated_request['tanggal']
            ]);
        } else {
            $absen = $absensi->update([
                'kelas' => $validated_request['kelas'],
                'hadir' => $hadir,
                'ijin' => $ijin,
                'sakit' => $sakit,
                'alpa' => $alpa,
                'tanggal' => $validated_request['tanggal']
            ]);
            DetailAbsensi::where('absensi_id', $absensi->id)->delete();
        }
        foreach ($validated_request['siswa'] as $data => $value) {
            if ($do == 'create') {
                $boolean_checker = DetailAbsensi::create([
                    'absensi_id' => $absen->id,
                    'siswa_id' => $value['id'],
                    'tanggal' => $validated_request['tanggal'],
                    'absensi' => $value['absen']
                ]);
            } else {
                $boolean_checker = DetailAbsensi::create([
                    'absensi_id' => $absensi->id,
                    'siswa_id' => $value['id'],
                    'tanggal' => $validated_request['tanggal'],
                    'absensi' => $value['absen']
                ]);
            }
            if (!$boolean_checker) {
                $error_counter_return++;
            }
        }
        return $error_counter_return;
    }
}
