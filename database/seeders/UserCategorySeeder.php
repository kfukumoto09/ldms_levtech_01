<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'name' => 'Guest',
                ], [
            'name' => 'General user', 
                    ],
            'name' => 'Manager',
                ], [
            'name' => 'Administrator', 
                    ],
            ]);
    }
}
