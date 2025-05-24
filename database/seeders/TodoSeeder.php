<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    public function run(): void
{
   $users = User::all();

    Todo::factory()->count(10)->make()->each(function ($todo) use ($users) {
        $todo->user_id = $users->random()->id;
        $todo->save();
    });
}

}
