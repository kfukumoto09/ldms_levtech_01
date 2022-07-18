<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProjectUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_user')->insert([
            [
            'project_id' => 1,
            'user_id' => 1,
            'authorized_by' => 2,
                ], [
            'project_id' => 1,
            'user_id' => 2,
            'authorized_by' => 2,
                ], [
            'project_id' => 2,
            'user_id' => 2,
            'authorized_by' => null,
                ],
            ]);
    }
}
