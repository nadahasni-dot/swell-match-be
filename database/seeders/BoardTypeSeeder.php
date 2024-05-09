<?php

namespace Database\Seeders;

use App\Models\BoardType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BoardType::factory()->create(["board_name" => "Longboard"]);
        BoardType::factory()->create(["board_name" => "Funboard"]);
        BoardType::factory()->create(["board_name" => "Shortboard"]);
        BoardType::factory()->create(["board_name" => "Fishboard"]);
        BoardType::factory()->create(["board_name" => "Gunboard"]);
    }
}
