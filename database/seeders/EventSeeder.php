<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'name' => 'Seminar Pemasaran Digital',
                'description' => 'Seminar ini akan membahas strategi pemasaran digital terbaru dan praktik terbaik.',
                'is_published' => 1,
                'location' => 'Gedung Serbaguna Jakarta',
                'date' => '2024-05-20',
                'time' => '09:00',
                'price' => 100000,
                'speaker_id' => random_int(1, 10),
                'moderator_id' => random_int(1, 10),
                'event_category_id' => 1
            ],
            [
                'name' => 'Pelatihan Kewirausahaan',
                'description' => 'Pelatihan ini akan membantu peserta untuk memulai dan mengembangkan bisnis mereka.',
                'is_published' => 1,
                'location' => 'Hotel Santika Surabaya',
                'date' => '2024-06-10',
                'time' => '10:00',
                'speaker_id' => random_int(1, 10),
                'moderator_id' => random_int(1, 10),
                'event_category_id' => 2
            ],
            [
                'name' => 'Workshop Desain Grafis',
                'description' => 'Workshop ini akan mengajarkan teknik-teknik desain grafis yang inovatif.',
                'is_published' => 1,
                'location' => 'Gedung Kreatif Bandung',
                'date' => '2024-07-15',
                'time' => '13:00',
                'speaker_id' => random_int(1, 10),
                'moderator_id' => random_int(1, 10),
                'event_category_id' => 2
            ],
            [
                'name' => 'Konferensi Teknologi Informasi',
                'description' => 'Konferensi ini akan membahas tren terbaru dalam teknologi informasi dan komunikasi.',
                'is_published' => 1,
                'location' => 'Hotel Grand Mahkota Medan',
                'date' => '2024-08-25',
                'time' => '11:00',
                'speaker_id' => random_int(1, 10),
                'moderator_id' => random_int(1, 10),
                'event_category_id' => 2
            ],
            [
                'name' => 'Seminar Pengembangan Diri',
                'description' => 'Seminar ini akan memberikan wawasan tentang pengembangan diri dan keterampilan
        interpersonal.',
                'is_published' => 1,
                'location' => 'Gedung Serbaguna Surabaya',
                'date' => '2024-09-30',
                'time' => '14:00',
                'speaker_id' => random_int(1, 10),
                'moderator_id' => random_int(1, 10),
                'event_category_id' => 2
            ],
            [
                'name' => 'Pelatihan Keuangan Pribadi',
                'description' => 'Pelatihan ini akan memberikan tips dan trik untuk mengelola keuangan pribadi dengan baik.',
                'is_published' => 1,
                'location' => 'Gedung Wisma Nusantara Jakarta',
                'date' => '2024-10-20',
                'time' => '15:00',
                'price' => 75000,
                'speaker_id' => random_int(1, 10),
                'moderator_id' => random_int(1, 10),
                'event_category_id' => 1
            ],
            [
                'name' => 'Kursus Bahasa Inggris',
                'description' => 'Kursus ini akan membantu peserta untuk meningkatkan kemampuan berbahasa Inggris secara
        efektif.',
                'is_published' => 1,
                'location' => 'Kantor Pusat Cambridge English Jakarta',
                'date' => '2024-11-10',
                'time' => '12:00',
                'price' => 200000,
                'speaker_id' => random_int(1, 10),
                'moderator_id' => random_int(1, 10),
                'event_category_id' => 1
            ],
            [
                'name' => 'Webinar Kesehatan Mental',
                'description' => 'Webinar ini akan membahas pentingnya kesehatan mental dan strategi untuk menjaga kesehatan
        mental yang baik.',
                'is_published' => 1,
                'location' => 'Rumah Sakit Jiwa Jogja',
                'date' => '2024-12-05',
                'time' => '08:00',
                'speaker_id' => random_int(1, 10),
                'moderator_id' => random_int(1, 10),
                'event_category_id' => 2
            ],
            [
                'name' => 'Diskusi Literasi Keuangan',
                'description' => 'Diskusi ini akan membahas pentingnya literasi keuangan dan langkah-langkah untuk meningkatkan
        literasi keuangan masyarakat.',
                'is_published' => 1,
                'location' => 'Perpustakaan Nasional Jakarta',
                'date' => '2025-01-15',
                'time' => '16:00',
                'speaker_id' => random_int(1, 10),
                'moderator_id' => random_int(1, 10),
                'event_category_id' => 2
            ],
            [
                'name' => 'Workshop Digital Marketing',
                'description' => 'Workshop ini akan membantu peserta untuk memahami strategi pemasaran digital yang efektif.',
                'is_published' => 1,
                'location' => 'Kampus ITB Bandung',
                'date' => '2025-02-20',
                'time' => '09:30',
                'price' => 125000,
                'speaker_id' => random_int(1, 10),
                'moderator_id' => random_int(1, 10),
                'event_category_id' => 1
            ],
        ];



        foreach ($events as $key => $val) {
            Event::create($val);
        }
    }
}
