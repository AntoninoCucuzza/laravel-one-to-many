<?php

namespace Database\Seeders;

use App\Models\project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $types = Type::pluck('id');

        for ($i = 0; $i < 10; $i++) {


            $project = new project();

            $project->type_id = $faker->randomElement($types);
            $project->title = $faker->city(); /* da cambiare */
            $project->slug = Str::slug($project->title, '-');
            $project->description = $faker->realText(200);
            $project->thumb = $faker->imageUrl(640, 480, 'animals', true);
            $project->project_link = $faker->url();
            $project->github_link = $faker->url();
            $project->save();
        }
    }
}
