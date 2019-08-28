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
            'contact' => 'Admin',
            'email' => 'admin@acces.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            //Foreign Key
            'department_id' => '1',
            'designation_id' => '11',
            'organization_id' => '1'
        ]);

        DB::table('users')->insert([
            'username' => 'cocurricular',
            'firstname' => 'Mariana',
            'lastname' => 'Matthews',
            'contact' => '09123456789',
            'email' => 'mariana@acces.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            //Foreign Key
            'department_id' => '1',
            'designation_id' => '1',
            'organization_id' => '2'
        ]);
     
        DB::table('users')->insert([
            'username' => 'extra',
            'firstname' => 'Bryl',
            'lastname' => 'Lim',
            'contact' => '09123456789',
            'email' => 'bryllim@acces.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            //Foreign Key
            'department_id' => '1',
            'designation_id' => '2',
            'organization_id' => '2'
        ]);
     
        DB::table('users')->insert([
            'username' => 'faculty',
            'firstname' => 'Bryl',
            'lastname' => 'Lim',
            'contact' => '09123456789',
            'email' => 'asdsafwew@acces.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            //Foreign Key
            'department_id' => '1',
            'designation_id' => '3',
            'organization_id' => '2'
        ]);
     
        DB::table('users')->insert([
            'username' => 'rep',
            'firstname' => 'Bryl',
            'lastname' => 'Lim',
            'contact' => '09123456789',
            'email' => 'nfndnnw@acces.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            //Foreign Key
            'department_id' => '1',
            'designation_id' => '5',
            'organization_id' => '2'
        ]);

        DB::table('users')->insert([
            'username' => 'chair',
            'firstname' => 'Bryl',
            'lastname' => 'Lim',
            'contact' => '09123456789',
            'email' => 'sfsdssww@acces.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            //Foreign Key
            'department_id' => '1',
            'designation_id' => '6',
            'organization_id' => '2'
        ]);


        DB::table('users')->insert([
            'username' => 'dean',
            'firstname' => 'Ye Hoo',
            'lastname' => 'Lee',
            'contact' => '09123456789',
            'email' => 'chlogan@acces.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            //Foreign Key
            'department_id' => '1',
            'designation_id' => '8',
            'organization_id' => '1'
        ]);

        DB::table('users')->insert([
            'username' => 'cesdirector',
            'firstname' => 'Ye Hoo',
            'lastname' => 'Lee',
            'contact' => '09123456789',
            'email' => 'ceslogan@acces.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            //Foreign Key
            'department_id' => '1',
            'designation_id' => '9',
            'organization_id' => '1'
        ]);
    }
}
