<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;


class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // data faker indonesia
         $faker = Faker::create('id_ID');
 
         // membuat data dummy sebanyak 10 record
         for($x = 1; $x <= 10; $x++){
  
             // insert data dummy pegawai dengan faker
             DB::table('mahasiswa')->insert([
                // 'nim'=>$faker->unique()->randomNumber,
                 'nama' => $faker->name,
                 'img_url' =>  $faker->imageUrl($width = 200, $height = 200),
                 'alamat' => $faker->address
             ]);
  
         }
  
    }
}
