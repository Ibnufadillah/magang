<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatKulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mata_kuliah')->insert([
            'nama'=>'Pemograman Web',
            'sks'=>'3',
            'dosen_id'=>'7'
        ]);
        DB::table('mata_kuliah')->insert([
            'nama'=>'Basis Data',
            'sks'=>'3',
            'dosen_id'=>'3'
        ]);
        DB::table('mata_kuliah')->insert([
            'nama'=>'Matematika Diskrit',
            'sks'=>'3',
            'dosen_id'=>'7'
        ]);
        DB::table('mata_kuliah')->insert([
            'nama'=>'Algoritma',
            'sks'=>'3',
            'dosen_id'=>'3'
        ]);
        DB::table('mata_kuliah')->insert([
            'nama'=>'PBO',
            'sks'=>'3',
            'dosen_id'=>'7'
        ]);
        DB::table('mata_kuliah')->insert([
            'nama'=>'Budidaya Lele',
            'sks'=>'3',
            'dosen_id'=>'8'
        ]);
    }
}
