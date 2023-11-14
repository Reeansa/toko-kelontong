<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->createMany( [ 
            [ 
                'name'     => 'tes admin',
                'email'    => 'admin@gmail.com',
                'role'     => 'admin',
                'password' => 'admin123',
            ],
            [ 
                'name'     => 'tes user',
                'email'    => 'user@gmail.com',
                'role'     => 'user',
                'password' => 'user123',
            ],
            [ 
                'name'     => 'tes akun nonaktif',
                'email'    => 'nonaktif@gmail.com',
                'role'     => 'user',
                'status'   => 'non-active',
                'password' => 'nonaktif123',
            ],
        ] );
        $this->call( BarangSeeder::class);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
