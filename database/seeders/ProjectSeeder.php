<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            [
            'title' => 'Finding new targets of breast cancer',
            'purpose' => 'Finding new targets of breast cancer is important to create new drugs. In this research, we will evaluate the mechanism of blast cancer and find target proteins to care the disease.',
                ], [
            'title' => 'Determining structures of target proteins for breast cancer',
            'purpose' => 'Determining structures of proteins relating to disease is usefull to create and improve drug candidates. In this research, we will analyze structures of target proteins of blast cancer.',
                ],
            ]);
    }
}
