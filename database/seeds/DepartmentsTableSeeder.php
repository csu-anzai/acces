<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['name' => 'Architecture', 'school_id' => '1'],
            ['name' => 'Fine Arts', 'school_id' => '1'],
            ['name' => 'Languages and Literature', 'school_id' => '2'],
            ['name' => 'Philosophy and Religious Studies', 'school_id' => '2'],
            ['name' => 'Psychology', 'school_id' => '2'],
            ['name' => 'Anthropology, Sociology and History', 'school_id' => '2'],
            ['name' => 'Biology', 'school_id' => '2'],
            ['name' => 'Chemistry', 'school_id' => '2'],
            ['name' => 'Computer and Information Sciences', 'school_id' => '2'],
            ['name' => 'Mathematics', 'school_id' => '2'],
            ['name' => 'Physics', 'school_id' => '2'],
            ['name' => 'Teacher Education', 'school_id' => '3'],
            ['name' => 'Science and Mathematics', 'school_id' => '3'],
            ['name' => 'Physical Education', 'school_id' => '3'],
            ['name' => 'Nursing', 'school_id' => '4'],
            ['name' => 'Pharmacy', 'school_id' => '4'],
            ['name' => 'Nutrition and Dietics', 'school_id' => '4'],
            ['name' => 'Law', 'school_id' => '5'],
            ['name' => 'Political Science', 'school_id' => '5'],
            ['name' => 'Accountancy', 'school_id' => '6'],
            ['name' => 'Business Administration', 'school_id' => '6'],
            ['name' => 'Economics', 'school_id' => '6'],
            ['name' => 'Hospitality Management', 'school_id' => '6'],
            ['name' => 'Chemical Engineering', 'school_id' => '7'],
            ['name' => 'Civil Engineering', 'school_id' => '7'],
            ['name' => 'Computer Engineering', 'school_id' => '7'],
            ['name' => 'Electronics and Communications Engineering', 'school_id' => '7'],
            ['name' => 'Industrial Engineering', 'school_id' => '7'],
            ['name' => 'Mechanical Engineering', 'school_id' => '7'],
            ['name' => 'Extra Curricular', 'school_id' => '8'] 
        ];

        DB::table('departments')->insert($departments);
    }
}
