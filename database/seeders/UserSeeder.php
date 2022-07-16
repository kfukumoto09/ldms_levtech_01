<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            [
            'name' => 'default user',
            'email' => 'test@test.jp',
            'password' => '$2y$10$MbvE2VIvrSyiLQm.R6k.RO//rKMsCUbP0dVAOVOCo5Mp/7wQlLgny',
            //'auth_level' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ],
            ]);
    }
}
