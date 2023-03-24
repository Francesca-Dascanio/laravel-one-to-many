<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use  App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recupero dati in config
        $projects = config('projects');


        // Inserisco dati in DB
        foreach ($projects as $project) {
            $singleProject = new Project();
            $singleProject->title = $project['title'];
            $singleProject->slug = $project['slug'];
            $singleProject->year = $project['year'];
            $singleProject->description = $project['description'];
            $singleProject->image = $project['image'];
            $singleProject->save();
        }
    }
}
