<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            [
                'name' => 'Standard Room 101',
                'type' => 'Standard',
                'price' => 350000,
                'description' => 'Kamar standard dengan fasilitas lengkap, tempat tidur single, AC, TV, dan kamar mandi dalam.',
                'is_available' => true
            ],
            [
                'name' => 'Standard Room 102',
                'type' => 'Standard',
                'price' => 350000,
                'description' => 'Kamar standard dengan fasilitas lengkap, tempat tidur single, AC, TV, dan kamar mandi dalam.',
                'is_available' => true
            ],
            [
                'name' => 'Deluxe Room 201',
                'type' => 'Deluxe',
                'price' => 550000,
                'description' => 'Kamar deluxe dengan tempat tidur double, AC, TV LED, mini bar, dan pemandangan kota.',
                'is_available' => true
            ],
            [
                'name' => 'Deluxe Room 202',
                'type' => 'Deluxe',
                'price' => 550000,
                'description' => 'Kamar deluxe dengan tempat tidur double, AC, TV LED, mini bar, dan pemandangan kota.',
                'is_available' => true
            ],
            [
                'name' => 'Deluxe Room 203',
                'type' => 'Deluxe',
                'price' => 580000,
                'description' => 'Kamar deluxe dengan tempat tidur queen, AC, TV LED, mini bar, dan pemandangan kolam renang.',
                'is_available' => true
            ],
            [
                'name' => 'Suite Room 301',
                'type' => 'Suite',
                'price' => 850000,
                'description' => 'Kamar suite dengan ruang tamu terpisah, tempat tidur king, AC, TV LED 42", mini bar, dan balkon pribadi.',
                'is_available' => true
            ],
            [
                'name' => 'Suite Room 302',
                'type' => 'Suite',
                'price' => 850000,
                'description' => 'Kamar suite dengan ruang tamu terpisah, tempat tidur king, AC, TV LED 42", mini bar, dan balkon pribadi.',
                'is_available' => true
            ],
            [
                'name' => 'Family Room 401',
                'type' => 'Family',
                'price' => 750000,
                'description' => 'Kamar keluarga dengan 2 tempat tidur double, ruang bermain anak, AC, TV LED, dan area duduk.',
                'is_available' => true
            ],
            [
                'name' => 'Family Room 402',
                'type' => 'Family',
                'price' => 750000,
                'description' => 'Kamar keluarga dengan 2 tempat tidur double, ruang bermain anak, AC, TV LED, dan area duduk.',
                'is_available' => true
            ],
            [
                'name' => 'Presidential Suite 501',
                'type' => 'Presidential',
                'price' => 1500000,
                'description' => 'Suite mewah dengan 2 kamar tidur, ruang tamu, ruang makan, dapur kecil, jacuzzi, dan pemandangan panorama.',
                'is_available' => true
            ],
            [
                'name' => 'Superior Room 505',
                'type' => 'Superior',
                'price' => 1000000,
                'description' => 'Rumah mewah dengan 3 kamar tidur, ruang tamu, ruang makan, dapur kecil, jacuzzi, dan pemandangan panorama, kolam berenang.',
                'is_available' => true
            ],
            
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
