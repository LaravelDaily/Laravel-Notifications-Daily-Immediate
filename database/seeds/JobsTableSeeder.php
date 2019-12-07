<?php

use App\Job;
use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1,10) as $index)
        {
            Job::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'contact_email' => $faker->companyEmail 
            ]);
        }
    }
}
