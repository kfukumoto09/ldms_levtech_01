<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class SubjectSeeder extends Seeder
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
            'project_id' => 1,
            'sub_number' => 1,
            'title' => 'Culturing MCF-7 cells',
            'objective' => '-------',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ], [
            'project_id' => 1,
            'sub_number' => 2,
            'title' => 'Evaluating the effect of X inhibitor for MCF-7 cells',
            'objective' => '-------',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ], [
            'project_id' => 2,
            'sub_number' => 1,
            'title' => 'Prepring grids of estrogen receptor (ER)',
            'objective' => '-------',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ], [
            'project_id' => 2,
            'sub_number' => 2,
            'title' => 'Measuring ER using cryo-TEM',
            'objective' => '-------',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ],
            ]);
    }
}
