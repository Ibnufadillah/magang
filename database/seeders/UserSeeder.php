<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x = 1; $x <= 10; $x++){
  
            // insert data dummy pegawai dengan faker
            DB::table('users')->insert([
               // 'nip'=>$faker->unique()->randomNumber,
                'email' => sprintf('MHS%03d', $x),
                'password' => '$2y$10$seXWgRX6e7NLNMcJQEoZsOfMbQ1GG6ZnlubF9lAmcohDj131asSw6',
                'level' => '3',
                'mahasiswa_id' => $x
            ]);
 
        }
        for($x = 1; $x <= 10; $x++){
  
            // insert data dummy pegawai dengan faker
            DB::table('users')->insert([
               // 'nip'=>$faker->unique()->randomNumber,
                'email' => sprintf('D%03d', $x),
                'password' => '$2y$10$8dl5QriIs33lVAQ3DxY.6.nmxi5o78XpDZNF188OGf/HLCwMh5RS2',
                'level' => '2',
                'dosen_id' => $x

            ]);
 
        }
        DB::table('users')->insert([
            'email' => 'admin',
            'password' => '$2y$10$Vqn35beeJjnkfyxtPqTjn.Ta56vG96AddvVOaU1ATZX8SaHKn0wvi',
            'level' => '1'
        ]);
    }
}
