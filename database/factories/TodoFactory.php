<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'completed' => $this->faker->boolean(30), // 30% selesai
            'user_id' => 1, // default sementara, bisa di-overwrite saat create()
        ];
    }
}
