<?php

namespace Database\Seeders;

use Database\Factories\TaskFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserFactory::factory(10)->create()->each(function ($user) {
            TaskFactory::factory(5)->create(['user_id' => $user->id]);
        });
    }
}
