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
            'designation_id' => '10',
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
        
    }
}
