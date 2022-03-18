<?php

namespace Database\Seeders;

use App\Models\Filter;
use App\Models\Project;
use App\Models\Track;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->truncate();

        $filters = Filter::all();

        Project::factory(3)
            ->create()
            ->each(function ($project) use ($filters) {
                $project->tracks()->createMany(
                    Track::factory(5)->make()->toArray()
                )->each(function ($track) use ($filters) {
                    for ($i = 0; $i < random_int(1, 4); $i++) {
                        $track->filters()->toggle($filters[random_int(0, 9)]);
                    }
                });
            });
    }
}
