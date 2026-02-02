<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tagihans')->insert([
            [
                'bulan_tagihan' => '2026-02-01',
                'resident_id'   => 1,
                'meteran_awal'  => 120,
                'meteran_akhir' => 135,
                'tagihan_air'   => 15 * 5000, // contoh: 5.000 per m3
                'ipl'           => 160000,
                'abodement'     => 10000,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
