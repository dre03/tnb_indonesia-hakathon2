<?php

namespace Database\Seeders;

use App\Models\Speaker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $speakers = [
            [
                'name' => 'Bambang Surya',
                'position' => 'Direktur',
                'gender' => 'Laki-Laki',
            ],
            [
                'name' => 'Ani Kartika',
                'position' => 'Manajer',
                'gender' => 'Perempuan',
            ],
            [
                'name' => 'Eko Wijaya',
                'position' => 'Konsultan',
                'gender' => 'Laki-Laki',
            ],
            [
                'name' => 'Siti Rahayu',
                'position' => 'Ahli',
                'gender' => 'Perempuan',
            ],
            [
                'name' => 'Agus Priyono',
                'position' => 'Analisis',
                'gender' => 'Laki-Laki',
            ],
            [
                'name' => 'Dewi Anggraini',
                'position' => 'Designer',
                'gender' => 'Perempuan',
            ],
            [
                'name' => 'Hadi Santoso',
                'position' => 'Pengusaha',
                'gender' => 'Laki-Laki',
            ],
            [
                'name' => 'Rina Widayati',
                'position' => 'Manager',
                'gender' => 'Perempuan',
            ],
            [
                'name' => 'Doni Setiawan',
                'position' => 'Peneliti',
                'gender' => 'Laki-Laki',
            ],
            [
                'name' => 'Maya Putri',
                'position' => 'Ahli',

                'gender' => 'Perempuan',
            ],
        ];
        foreach ($speakers as $key => $val) {
            Speaker::create($val);
        }
    }
}
