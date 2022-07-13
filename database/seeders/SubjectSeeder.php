<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'title' => 'Cultring MCF-7 cells',
                ], [
            'project_id' => 1,
            'title' => 'Evaluating the effect of X inhibitor for MCF-7 cells',
                ], [
            'project_id' => 2,
            'title' => 'Prepring grids of estrogen receptor (ER)',
                ], [
            'project_id' => 2,
            'title' => 'Measuring ER using cryo-TEM',
                ],
            ]);
    }
}
