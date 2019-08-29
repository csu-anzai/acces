<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'Admin',
            'firstname' => 'Ken',
            'lastname' => 'Gorro',
            'contact' => '+639951234567',
            'email' => 'kdgorro@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            //Foreign Key
            'department_id' => '31',
            'designation_id' => '11',
            'organization_id' => '1'
        ]);

        DB::table('users')->insert([
            'username' => 'cocurricular',
            'firstname' => 'Kevin Ken',
            'lastname' => 'Remedio',
            'contact' => '+639951234567',
            'email' => 'remedio@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            //Foreign Key
            'department_id' => '5',
            'designation_id' => '1',
            'organization_id' => '2'
        ]);
     
        DB::table('users')->insert([
            'username' => 'extra',
            'firstname' => 'Cloyd Vincent',
            'lastname' => 'Anis',
            'contact' => '+639123456789',
            'email' => 'cloydanis@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            //Foreign Key
            'department_id' => '22',
            'designation_id' => '2',
            'organization_id' => '2'
        ]);
     
        DB::table('users')->insert([
            'username' => 'faculty',
            'firstname' => 'Bryl',
            'lastname' => 'Lim',
            'contact' => '+639123456789',
            'email' => 'bryllim@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            //Foreign Key
            'department_id' => '11',
            'designation_id' => '3',
            'organization_id' => '2'
        ]);
     
        DB::table('users')->insert([
            'username' => 'rep',
            'firstname' => 'Bong',
            'lastname' => 'Go',
            'contact' => '+639123456789',
            'email' => 'bonggo@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            //Foreign Key
            'department_id' => '19',
            'designation_id' => '5',
            'organization_id' => '2'
        ]);

        DB::table('users')->insert([
            'username' => 'chair',
            'firstname' => 'Christian',
            'lastname' => 'Maderazo',
            'contact' => '+639123456789',
            'email' => 'cmaderazo@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            //Foreign Key
            'department_id' => '9',
            'designation_id' => '6',
            'organization_id' => '2'
        ]);


        DB::table('users')->insert([
            'username' => 'dean',
            'firstname' => 'Delia',
            'lastname' => 'Belleza',
            'contact' => '+639123456789',
            'email' => 'deanbelleza@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            //Foreign Key
            'department_id' => '5',
            'designation_id' => '8',
            'organization_id' => '1'
        ]);

        DB::table('users')->insert([
            'username' => 'cesdirector',
            'firstname' => 'Fr. Roger',
            'lastname' => 'Bag-ao',
            'contact' => '+639123456789',
            'email' => 'rogerbagao@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            //Foreign Key
            'department_id' => '31',
            'designation_id' => '9',
            'organization_id' => '52'
        ]);
    }
}
