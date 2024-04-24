<?php

namespace Database\Seeders;

use App\Models\ParticipantStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $participanStatus = [
        [
        'status' => 'Ditolak'
        ],
        [
        'status' => 'Menunggu'
        ],
        [
        'status' => 'Disetujui'
        ],
        ];

        foreach ($participanStatus as $key => $val) {
        ParticipantStatus::create($val);
        }
    }
}
