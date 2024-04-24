<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ParticipantStatusSeeder::class,
            paymentStatusSeeder::class,
            EventCategorieSeeder::class,
            SpeakerSeeder::class,
            ModeratorSeeder::class,
            EventSeeder::class,
            ParticipantSeeder::class,
            PaymentSeeder::class
        ]);
    }
}
