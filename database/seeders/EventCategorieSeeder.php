<?php

namespace Database\Seeders;

use App\Models\EventCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eventCategory = [
            [
                'name' => 'Paid'
            ],[
                'name' => 'Free'
            ]
            ];

        foreach($eventCategory as $key => $val){
            EventCategory::create($val);
        }
    }
}
