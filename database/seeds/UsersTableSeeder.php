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

        $faker = Faker\Factory::create();

        for($i = 0; $i < 100; $i++) {
            DB::table('users')->insert([
                'username' => $faker->userName,
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'contact' => $faker->tollFreePhoneNumber,
                'email' => $faker->email,
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now(),

                //Foreign Key
                'department_id' => $faker->numberBetween($min = 1, $max = 40),
                'designation_id' => $faker->numberBetween($min = 1, $max = 11),
                'organization_id' => $faker->numberBetween($min = 1, $max = 53)

            ]);
        }

    }
}
