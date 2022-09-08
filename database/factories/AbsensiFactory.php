<?php

namespace Database\Factories;

use App\Models\Absensi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absensi>
 */
class AbsensiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $kelas = mt_rand(1, 6);
        $siswa_kelas = User::where('role_id', 1)->where('kelas', $kelas)->get()->count();
        return [
            'kelas' => mt_rand(1, 6),
            'hadir' => mt_rand(1, mt_rand(1, 10)),
            'ijin' => mt_rand(1, mt_rand(1, 10)),
            'sakit' => mt_rand(1, mt_rand(1, 10)),
            'alpa' => mt_rand(1, mt_rand(1, 10)),
            'tanggal' => date('Y-m-d', strtotime(Carbon::now()->addDay(mt_rand(1, $siswa_kelas))))
        ];
    }
}
