<?php

use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = [
            ['name' => 'School of Architecture, Fine Arts and Design'],
            ['name' => 'School of Arts and Sciences'],
            ['name' => 'School of Education'],
            ['name' => 'School of Health Care Professions'],
            ['name' => 'School of Law and Governance'],
            ['name' => 'School of Business and Economics'],
            ['name' => 'School of Engineering'],
            ['name' => 'Extra-Curricular'],
            ['name' => 'CES Office'],
            ['name' => 'Support Unit']
        ];
        
        DB::table('schools')->insert($schools);
    }
}
