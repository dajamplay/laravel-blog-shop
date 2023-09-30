<?php

namespace Database\Seeders;

use App\Models\EventUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventUser::factory()->count(10)->create();
    }
}
