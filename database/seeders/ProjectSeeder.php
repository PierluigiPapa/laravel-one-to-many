<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 10; $i++) {
            $project = new Project();

            $project->title = $faker->sentence(3);
            $project->content = $faker->text(500);
            $project->cover = $faker->image();
            $project->slug = Str::slug($project->title, '-');

            $project->save();
        }
    }
}
