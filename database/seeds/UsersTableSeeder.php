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
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'organization' => 'Admin',
            'contact' => 'Admin',
            'email' => 'admin@acces.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),

            //Foreign Key
            'department_id' => '1',
            'designation_id' => '1'
        ]);
    }
}
