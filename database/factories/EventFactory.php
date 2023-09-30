<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    public function definition(): array
    {
        $users = User::all();

        return [
            'title' => fake()->realText(30),
            'content' => fake()->realText(250),
            'published_at' => fake()->dateTimeThisMonth(),
            'user_id' => $users->random()->id,
        ];
    }
}
