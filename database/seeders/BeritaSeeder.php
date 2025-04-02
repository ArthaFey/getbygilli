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
            'nama'=>'I Made Satria Wintara',
            'jeniskelamin'=>'cowo',
            'notelepon'=>'0881034567654',
        ]);
    }
}
