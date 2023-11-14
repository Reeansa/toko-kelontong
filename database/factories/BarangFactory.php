<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ 
            'nama_barang' => fake()->word(),
            'harga'       => fake()->randomNumber(),
            'stok'        => fake()->randomNumber(),
            'status'        => Fake()->randomElement( [ 'available', 'not available' ] ),
        ];
    }
}
