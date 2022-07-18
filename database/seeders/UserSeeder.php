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
            'login_id' => 'kishida',
            'email' => 'test1@test.jp',
            'password' => bcrypt('huxG4oLLR@oADE'),
            'user_category_id' => 1,
            'authorized_by' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ], [
            'name' => 'Joe Biden',
            'login_id' => 'biden',
            'email' => 'test2@test.jp',
            'password' => bcrypt('huxG4oLLR@oADE'),
            'user_category_id' => 2,
            'authorized_by' => null,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ], [
            'name' => 'Paulos',
            'login_id' => 'paulos',
            'email' => 'test3@test.jp',
            'password' => bcrypt('huxG4oLLR@oADE'),
            'user_category_id' => 3,
            'authorized_by' => null,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ], [
            'name' => 'Yoon Seok-youl',
            'login_id' => 'yoon',
            'email' => 'test4@test.jp',
            'password' => bcrypt('huxG4oLLR@oADE'),
            'user_category_id' => 1,
            'authorized_by' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ], 
            ]);
    }
}
