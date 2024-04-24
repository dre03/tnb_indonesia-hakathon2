<?php

namespace Database\Seeders;

use App\Models\Participant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $participants = [];

        for ($i = 0; $i < 10; $i++) {
            $participants[] = [
                'user_id' => random_int(1, 10),
                'event_id' => random_int(1, 10),
                'status_id' => random_int(1, 3),
            ];
        }

        foreach ($participants as $participant) {
            Participant::create($participant);
        }
    }
}
