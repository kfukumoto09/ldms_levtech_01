<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class LabNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lab_notes')->insert([
            [
            'subject_id' => 1,
            'preparation' => 'test preparation',
            'methods' => 'test methods',
            'performed_on' => date('Y-m-d'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ], [
            'subject_id' => 1,
            'preparation' => 'This preparation was written for debug. 
<LB medium> 
Bacto yeast extract 5 g 
Bacto tryptone 10 g 
NaCl 10 g 
5 N NaOH ~ 2mL 
ddH2O 
dilute to 1 L total.',
            'methods' => 'This method was written for debug. 
Single colony * 
LB medium 5 mL 
50 mg/mL ampicillin 5 uL 
Culture for 8 h at 37oC with rotation.',
            'performed_on' => date('Y-m-d'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ], [
            'subject_id' => 2,
            'preparation' => null,
            'methods' => 'Cells 2 uL 
X nM inhibitor 0.5 uL 
Y buffer 7.5 uL 
total 10 uL. 
Incubate for 2 h on ice.',
            'performed_on' => date('Y-m-d'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
                ],
            ]);
    }
}
