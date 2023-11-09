<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'description' => fake()->text(50),
            'priority' => fake()->text(10),
            'status' => fake()->name,
            'deadline' => fake()->dateTimeThisYear,
            'user_id' => User::inRandomOrder()->value('id')
        ];
    }
}
