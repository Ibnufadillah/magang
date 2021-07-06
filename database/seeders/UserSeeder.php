<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x = 1; $x <= 20; $x++){
  
            // insert data dummy pegawai dengan faker
            DB::table('users')->insert([
               // 'nip'=>$faker->unique()->randomNumber,
                'email' => sprintf('MHS%03d', $x),
                'password' => Hash::make('mhs'),
                'level' => '3',
                'mahasiswa_id' => $x
            ]);
 
        }
        for($x = 1; $x <= 5; $x++){
  
            // insert data dummy pegawai dengan faker
            DB::table('users')->insert([
               // 'nip'=>$faker->unique()->randomNumber,
                'email' => sprintf('D%03d', $x),
                'password' => Hash::make('dosen'),
                'level' => '2',
                'dosen_id' => $x

            ]);
 
        }
        DB::table('users')->insert([
            'email' => 'admin',
            'password' => Hash::make('admin'),
            'level' => '1'
        ]);
    }
}
