<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\support\facades\DB;
use Illuminate\Database\Seeder;

class project_boat extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('testimonis')->insert([
            'nama' => 'satria wintara',
            'foto'=>'komodo',
            'ulasan' => 'apk ini sangat membantu untuk mencarikan destinasi wisata',
            'rate'=>'5',

        ]);
        DB::table('testimonis')->insert([
            'nama' => 'satria wintara',
            'foto'=>'komodo',
            'ulasan' => 'apk ini sangat membantu untuk mencarikan destinasi wisata',
            'rate'=>'5',

        ]);
    }
}
