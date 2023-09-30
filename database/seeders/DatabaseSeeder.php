<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory()->count(10)->create();

        Event::factory()->count(30)->hasAttached($users, [
            "created_at" => now(),
            "updated_at" => now(),
        ])->create();

//        $this->call([
//            UserSeeder::class,
//            EventSeeder::class,
//            EventUserSeeder::class
//        ]);

    }
}
