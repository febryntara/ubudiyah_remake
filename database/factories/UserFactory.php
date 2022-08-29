<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            'email' => str_replace(' ', '', $name) . '@gmail.com',
            'name' => $name,
            'password' => Hash::make('password'),
            'role_id' => '1',
            'umur' => '12',
            'kelas' => mt_rand(1, 6),
            'tanggal_lahir' => Carbon::now(),
            'tempat_lahir' => 'denpasar',
            'jenis_kelamin' => mt_rand(0, 1),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
