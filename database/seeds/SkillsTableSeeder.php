<?php

use App\Skill;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            [
                'id' => 1,
                'name' => 'Laravel',
            ],
            [
                'id' => 2,
                'name' => 'Symfony',
            ],
            [
                'id' => 3,
                'name' => 'Vue.js',
            ],
            [
                'id' => 4,
                'name' => 'Angular.js',
            ],
            [
                'id' => 5,
                'name' => 'React.js',
            ]
        ];

        Skill::insert($skills);
    }
}
