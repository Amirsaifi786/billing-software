<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run()
    {



        $file_path='database/seeders/cities.sql';

        DB::unprepared(file_get_contents($file_path));
    }
}
