<?php

use Illuminate\Database\Seeder;

class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designations = [
            ['name' => 'Co-Curricular Organization'],
            ['name' => 'Extra-Curricular Organization'],
            ['name' => 'Faculty'],
            ['name' => 'Student Organization Adviser'],
            ['name' => 'CES Representative'],
            ['name' => 'Department Chair'],
            ['name' => 'School Dean'],
            ['name' => 'CES Director'],
            ['name' => 'VPAA'],
            ['name' => 'Super Administrator']
        ];
        
        DB::table('designations')->insert($designations);
    }
}
