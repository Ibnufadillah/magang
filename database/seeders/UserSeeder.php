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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$Vqn35beeJjnkfyxtPqTjn.Ta56vG96AddvVOaU1ATZX8SaHKn0wvi',
            'level' => '1'
        ]);
        DB::table('users')->insert(
            [
                'name' => 'dosen',
                'email' => 'dosen@dosen.com',
                'password' => '$2y$10$0EhIzQ/2rh6Qyg9W6tLhN.RVYqntF6nycAzufyYBp9rMXr7G8Bwgm',
                'level' => '2'
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'mhs',
                'email' => 'mhs@mhs.com',
                'password' => '$2y$10$seXWgRX6e7NLNMcJQEoZsOfMbQ1GG6ZnlubF9lAmcohDj131asSw6',
                'level' => '3'
            ]
        );
    }
}
