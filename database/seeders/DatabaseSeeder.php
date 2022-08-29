<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create([
            'name' => 'siswa'
        ]);
        UserRole::create([
            'name' => 'umum'
        ]);
        UserRole::create([
            'name' => 'guru'
        ]);

        User::create([
            'email' => 'admin@gmail.com',
            'name' => 'administrator',
            'password' => Hash::make('adminadmin'),
            'role_id' => '3',
            'umur' => '120',
            'tanggal_lahir' => Carbon::now(),
            'tempat_lahir' => 'denpasar',
            'jenis_kelamin' => '0',
        ]);
        User::factory(40)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
