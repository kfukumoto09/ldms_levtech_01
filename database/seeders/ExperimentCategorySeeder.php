<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperimentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('experiment_categories')->insert([
            [
            'name' => 'Cell culturing',
            'template' => 'Place cells on a flesh dish.\n
                            Incubate them overnight at 37oC.',
                ], [
            'name' => 'Grid preparation', 
            'template' => 'Apply 2 uL of sample.\n 
                            Place the grids into a container.\n
                            Store the container in liquid N2.',
                    ],
            ]);
            
    }
}
