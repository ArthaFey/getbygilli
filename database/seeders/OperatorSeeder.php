<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('operators')->insert([
            'title'=>'Pemandangan Bagus Di Pantai Kuta Bali',
            'quantity'=>'2',
            'knocks'=>'3',
            'rating'=>'5',
            'content'=>'gftfguhgfrsdt',
            'map1'=>'gvvbk',
            'map2'=>'34ghvu5',
            'gambar'=>'gambar',
        ]);
    }
}
