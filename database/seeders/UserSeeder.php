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
            'name' => 'Player #1',
            'email' => 'test1@test.jp',
            'password' => bcrypt('huxG4oLLR@oADE'),
            'user_category_id' => 1,
            'authorizer_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ], [
            'name' => 'Manager #1',
            'email' => 'test2@test.jp',
            'password' => bcrypt('huxG4oLLR@oADE'),
            'user_category_id' => 2,
            'authorizer_id' => 3,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ], [
            'name' => 'SYSETM MASTER',
            'email' => 'test3@test.jp',
            'password' => bcrypt('huxG4oLLR@oADE'),
            'user_category_id' => 3,
            'authorizer_id' => null,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ], [
            'name' => 'Player #2',
            'email' => 'test4@test.jp',
            'password' => bcrypt('huxG4oLLR@oADE'),
            'user_category_id' => 1,
            'authorizer_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ], 
            ]);
    }
}
