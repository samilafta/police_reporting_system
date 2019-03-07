<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RegionCitySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $regions = [
            'Greater Accra',
            'Ashanti',
            'Western',
            'Central',
            'Volta',
            'Brong Ahafo',
            'Upper East',
            'Upper West',
            'Eastern',
            'Northern'

        ];


             foreach ($regions as $region) {
                \App\RegionMaster::create(['region_desc' => $region]);
             }


        // Cities

        $city1 = ['region_id' => 1, 'city_desc' => 'Accra'];
        $city2 = ['region_id' => 2, 'city_desc' => 'Kumasi'];
        $city3 = ['region_id' => 3, 'city_desc' => 'Takoradi'];
        $city4 = ['region_id' => 4, 'city_desc' => 'Cape Coast'];
        $city5 = ['region_id' => 5, 'city_desc' => 'Ho'];
        $city6 = ['region_id' => 6, 'city_desc' => 'Sunyani'];
        $city7 = ['region_id' => 7, 'city_desc' => 'Bolgatanga'];
        $city8 = ['region_id' => 8, 'city_desc' => 'Wa'];
        $city9 = ['region_id' => 9, 'city_desc' => 'Koforidua'];
        $city10 = ['region_id' => 10, 'city_desc' => 'Tamale'];

        \App\CityMaster::create($city1);
        \App\CityMaster::create($city2);
        \App\CityMaster::create($city3);
        \App\CityMaster::create($city4);
        \App\CityMaster::create($city5);
        \App\CityMaster::create($city6);
        \App\CityMaster::create($city7);
        \App\CityMaster::create($city8);
        \App\CityMaster::create($city9);
        \App\CityMaster::create($city10);

    }
}
