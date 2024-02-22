<?php

namespace Database\Factories;
use App\Models\Siswa;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    protected $model = Siswa::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'kelas' => $this->faker->randomElement(['10', '11', '12']),
            // Add more fields as needed
        ];
    }
}
