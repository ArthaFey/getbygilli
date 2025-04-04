<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('beritas')->insert([
            'title'=>'Pemandangan Bagus Di Pantai Kuta Bali',
            'kategori'=>'Bali',
            'date'=>'2025-04-04',
            'excerpt'=>'pemandangan yang sangat abgus terpampang nyata di pantai kuta bali yang sangat indah',
            'content'=>'pemandangan yang sangat abgus terpampang nyata di pantai kuta bali yang sangat indah',
            'hit'=>'345',
        ]);
    }
}
