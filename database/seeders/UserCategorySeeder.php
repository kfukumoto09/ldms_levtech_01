<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class UserCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_categories')->insert([
            [
            // 'name' => 'Guest',
            //     ], [
            'name' => 'Player', 
                ], [
            'name' => 'Manager',
                ], [
            'name' => 'Administrator', 
                ],
            ]);
    }
}
