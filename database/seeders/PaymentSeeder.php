<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = [
            [
                'amount' => 100000,
                'participant_id' => random_int(1, 10),
                'status_id' => random_int(1, 5),
            ],
            [
                'amount' => 150000,
                'participant_id' => random_int(1, 10),
                'status_id' => random_int(1, 5),
            ],
            [
                'amount' => 120000,
                'participant_id' => random_int(1, 10),
                'status_id' => random_int(1, 5),
            ],
            [
                'amount' => 180000,
                'participant_id' => random_int(1, 10),
                'status_id' => random_int(1, 5),
            ],
            [
                'amount' => 90000,
                'participant_id' => random_int(1, 10),
                'status_id' => random_int(1, 5),
            ],
            [
                'amount' => 75000,
                'participant_id' => random_int(1, 10),
                'status_id' => random_int(1, 5),
            ],
            [
                'amount' => 200000,
                'participant_id' => random_int(1, 10),
                'status_id' => random_int(1, 5),
            ],
            [
                'amount' => 0,
                'participant_id' => random_int(1, 10),
                'status_id' => random_int(1, 5),
            ],
            [
                'amount' => 0,
                'participant_id' => random_int(1, 10),
                'status_id' => random_int(1, 5),
            ],
            [
                'amount' => 125000,
                'participant_id' => random_int(1, 10),
                'status_id' => random_int(1, 5),
            ],
        ];

        foreach ($payments as $key => $val) {
            Payment::create($val);
        }
    }
}
