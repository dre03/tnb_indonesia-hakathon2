<?php

namespace Database\Seeders;

use App\Models\PaymentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentStatus = [
            [
                'status' => 'Unpaid'
            ], 
            [
                'status' => 'Paid'
            ],
            [
                'status' => 'Pending'
            ],
            [
                'status' => 'Expird'
            ],
            [
                'status' => 'Cencel'
            ]
        ];

        foreach ($paymentStatus as $key => $val) {
            PaymentStatus::create($val);
        }
    }
}
