<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventUser>
 */
class EventUserFactory extends Factory
{

    public function definition(): array
    {
        $users = User::all();
        $events = Event::all();

        return [
            // TODO Need create unique fields
            'user_id' => $users->random()->id,
            'event_id' => $events->random()->id,
        ];
    }
}
