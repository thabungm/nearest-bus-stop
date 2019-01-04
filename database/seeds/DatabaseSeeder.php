<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $busStops = [
            ["name" => "HarbourFront Bus Terminal" , "latitude" => 1.263897, "longitude" => 103.819739],
            ["name" => "Bukit Batok Bus Interchange", "latitude" => 1.349994, "longitude" => 103.751062],
            ["name" =>"Singapore-Johore Express Terminal" , "latitude" =>1.3035363, "longitude" =>103.856733399],
            ["name" => "Interchange Bukit Merah Bus" , "latitude" =>1.2820672, "longitude" => 103.81722109999998],
        ];
        foreach ($busStops as $busStop) {
            DB::table('bus_stops')->insert(
              $busStop
            );
        }
    }
}
