<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperimentCategoryLabNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('experiment_category_lab_note')->insert([
            [
            'experiment_category_id' => 1,
            'lab_note_id' => 1,
                ], [
            'experiment_category_id' => 2,
            'lab_note_id' => 3,
                ],
            ]);
    }
}
