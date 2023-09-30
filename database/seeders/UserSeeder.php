<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
//        User::factory()
//            ->has(Event::factory()->count(5))
//            ->count(20)
//            ->create();

        User::factory()->count(20)->create();
    }
}
