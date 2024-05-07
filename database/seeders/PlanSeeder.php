<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::query()->create([
            'name' => 'Freemium',
            'description' => 'Descrição do plano Freemium',
            'price_monthly' => 0,
            'price_yearly' => 0,
        ]);

        Plan::query()->create([
            'name' => 'Bronze',
            'description' => 'Descrição do plano Bronze',
            'price_monthly' => 10,
            'price_yearly' => 100,
        ]);

        Plan::query()->create([
            'name' => 'Silver',
            'description' => 'Descrição do plano Silver',
            'price_monthly' => 20,
            'price_yearly' => 200,
        ]);

        Plan::query()->create([
            'name' => 'Gold',
            'description' => 'Descrição do plano Gold',
            'price_monthly' => 50,
            'price_yearly' => 500,
        ]);
    }
}
