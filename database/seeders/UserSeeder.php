<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

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
            [
            'name' => 'Fumio Kishida',
            'email' => 'test1@test.jp',
            'password' => bcrypt('huxG4oLLR@oADE'),
            'user_category_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ], [
            'name' => 'Joe Biden',
            'email' => 'test2@test.jp',
            'password' => bcrypt('huxG4oLLR@oADE'),
            'user_category_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ],
            ]);
    }
}
