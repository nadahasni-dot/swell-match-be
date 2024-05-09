<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::factory()->create([
            "country_code" => "ID",
            "country_name" => "Indonesia"
        ]);

        Country::factory()->create([
            "country_code" => "DE",
            "country_name" => "Germany"
        ]);

        Country::factory()->create([
            "country_code" => "JP",
            "country_name" => "Japan"
        ]);
    }
}
