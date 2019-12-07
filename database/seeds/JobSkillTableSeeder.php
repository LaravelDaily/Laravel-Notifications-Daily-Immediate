<?php

use App\Job;
use App\Skill;
use Illuminate\Database\Seeder;

class JobSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = Skill::pluck('id');
        $jobs = Job::all();

        foreach($jobs as $job)
        {
            $job->skills()->sync($skills->random(rand(0,3)));
        }
    }
}
