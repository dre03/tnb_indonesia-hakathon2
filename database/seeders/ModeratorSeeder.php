<?php

namespace Database\Seeders;

use App\Models\Moderator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModeratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $moderators = [
            [
                'name' => 'Rizky Fajar',
                'position' => 'Manager',
                'gender' => 'Laki-laki',
            ],
            [
                'name' => 'Siti Aisyah',
                'position' => 'Koordinator',
                'gender' => 'Perempuan',
            ],
            [
                'name' => 'Budi Santoso',
                'position' => 'Asisten',
                'gender' => 'Laki-laki',
            ],
            [
                'name' => 'Dewi Ayu',
                'position' => 'Kepala Divisi',
                'gender' => 'Perempuan',
            ],
            [
                'name' => 'Hendra Pratama',
                'position' => 'Staff',
                'gender' => 'Laki-laki',
            ],
            [
                'name' => 'Nurul Hidayah',
                'position' => 'Koordinator',
                'gender' => 'Perempuan',
            ],
            [
                'name' => 'Raden Wijaya',
                'position' => 'Direktur',
                'gender' => 'Laki-laki',
            ],
            [
                'name' => 'Sri Mulyani',
                'position' => 'Kepala Divisi',
                'gender' => 'Perempuan',
            ],
            [
                'name' => 'Taufik Hidayat',
                'position' => 'Asisten',
                'gender' => 'Laki-laki',
            ],
            [
                'name' => 'Wulan Sari',
                'position' => 'Staff',
                'gender' => 'Perempuan',
            ],
        ];

        foreach ($moderators as $key => $val) {
            Moderator::create($val);
        }
    }
}
