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
    public function run()
    {
        $types = [
            ['type' => 'Deluxe', 'count' => 5],
            ['type' => 'VIP', 'count' => 2],
            ['type' => 'General', 'count' => 3],
        ];
    
        foreach ($types as $t) {
            for ($i = 1; $i <= $t['count']; $i++) {
                Room::create([
                    'room_type' => $t['type'],
                    'room_number' => strtoupper(substr($t['type'], 0, 1)) . $i,
                    'is_occupied' => false,
                ]);
            }
        }
    }
    
}
