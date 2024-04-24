<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Bambang Surya',
                'email' => 'bambang@example.com',
                'phone_number' => '081234567890',
                'username' => 'bambangsurya',
                'password' => Hash::make('bambang123'),
                'brith_date' => '1990-05-15',
                'brith_place' => 'Jakarta',
                'gender' => 'Laki-Laki',
                'address' => 'Jl. Sudirman No. 123',
                'role_id' => 1
            ],
            [
                'name' => 'Ani Kartika',
                'email' => 'ani@example.com',
                'phone_number' => '085678901234',
                'username' => 'anikartika',
                'password' => Hash::make('ani123'),
                'brith_date' => '1988-10-20',
                'brith_place' => 'Bandung',
                'gender' => 'Perempuan',
                'address' => 'Jl. Pahlawan No. 45',
                'role_id' => 2
            ],
            [
                'name' => 'Eko Wijaya',
                'email' => 'eko@example.com',
                'phone_number' => '087654321098',
                'username' => 'ekowijaya',
                'password' => Hash::make('eko789'),
                'brith_date' => '1995-02-28',
                'brith_place' => 'Surabaya',
                'gender' => 'Laki-Laki',
                'address' => 'Jl. Merdeka No. 10',
                'role_id' => 2
            ],
            [
                'name' => 'Siti Rahayu',
                'email' => 'siti@example.com',
                'phone_number' => '081112223344',
                'username' => 'sitirahayu',
                'password' => Hash::make('siti0123'),
                'brith_date' => '1993-12-10',
                'brith_place' => 'Yogyakarta',
                'gender' => 'Perempuan',
                'address' => 'Jl. Diponegoro No. 25',
                'role_id' => 2
            ],
            [
                'name' => 'Agus Priyono',
                'email' => 'agus@example.com',
                'phone_number' => '081345678900',
                'username' => 'aguspriyono',
                'password' => Hash::make('agus1234'),
                'brith_date' => '1987-06-05',
                'brith_place' => 'Semarang',
                'gender' => 'Laki-Laki',
                'address' => 'Jl. Gajah Mada No. 8',
                'role_id' => 2
            ],
            [
                'name' => 'Dewi Anggraini',
                'email' => 'dewi@example.com',
                'phone_number' => '081234567890',
                'username' => 'dewianggraini',
                'password' => Hash::make('dewi456'),
                'brith_date' => '1991-03-20',
                'brith_place' => 'Jakarta',
                'gender' => 'Perempuan',
                'address' => 'Jl. Kebon Sirih No. 15',
                'role_id' => 2
            ],
            [
                'name' => 'Hadi Santoso',
                'email' => 'hadi@example.com',
                'phone_number' => '085678901234',
                'username' => 'hadisantoso',
                'password' => Hash::make('hadi789'),
                'brith_date' => '1989-08-18',
                'brith_place' => 'Bandung',
                'gender' => 'Laki-Laki',
                'address' => 'Jl. Cendrawasih No. 30',
                'role_id' => 2
            ],
            [
                'name' => 'Rina Widayati',
                'email' => 'rina@example.com',
                'phone_number' => '087654321098',
                'username' => 'rinawidayati',
                'password' => Hash::make('rina567'),
                'brith_date' => '1996-04-25',
                'brith_place' => 'Surabaya',
                'gender' => 'Perempuan',
                'address' => 'Jl. Surya Sumantri No. 5',
                'role_id' => 2
            ],
            [
                'name' => 'Doni Setiawan',
                'email' => 'doni@example.com',
                'phone_number' => '081112223344',
                'username' => 'donisetiawan',
                'password' => Hash::make('doni789'),
                'brith_date' => '1994-11-15',
                'brith_place' => 'Yogyakarta',
                'gender' => 'Laki-Laki',
                'address' => 'Jl. Dipati Ukur No. 20',
                'role_id' => 2
            ],
            [
                'name' => 'Maya Putri',
                'email' => 'maya@example.com',
                'phone_number' => '081345678900',
                'username' => 'mayaputri',
                'password' => Hash::make('maya123'),
                'brith_date' => '1992-07-10',
                'brith_place' => 'Semarang',
                'gender' => 'Perempuan',
                'address' => 'Jl. Pahlawan No. 10',
                'role_id' => 2
            ],
        ];

        foreach($users as $key => $val){
            User::create($val);
        }
    }
}
