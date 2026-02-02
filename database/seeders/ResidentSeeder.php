<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('residents')->insert([
            [
                'nama'   => 'Ridwan',
                'alamat' => 'Ancimas 1 no 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama'   => 'Bayu',
                'alamat' => 'Ancimas 1 no 41',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama'   => 'Decan',
                'alamat' => 'Ancimas Raya no 27',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
