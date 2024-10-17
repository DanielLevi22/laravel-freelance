<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Proposal;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()
            ->count(200)
            ->create();


            User::query()
            ->inRandomOrder()
            ->limit(10)
            ->get()
            ->each(function (User $user) {
                // Cria um projeto atribuído ao usuário atual
                $project = Project::factory()->create(['created_by' => $user->id]);

                // Cria uma quantidade aleatória de propostas (de 1 a 120) para o projeto
                Proposal::factory()
                    ->count(random_int(1, 120))
                    ->create(['project_id' => $project->id]); // Correção aqui
            });


    }

}
