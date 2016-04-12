<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 10;
        for ($i = 0; $i < $limit; $i++){
        	DB::table('users')->insert([ //,
        		'name' => $faker->name,
                'username'=> $faker->userName,
        		'email'=> $faker->email,
            	'password'=>$faker->password,
                'created_at'=>$faker->dateTime(),
                'updated_at'=>$faker->dateTime(),
        	]);
        }

    }
}
