<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantTypology extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurant_typology')->insert([
            0 => [
                'restaurant_id' => 1,
                'typology_id' => 1,
            ],
            1 => [
                'restaurant_id' => 1,
                'typology_id' => 2,
            ],
            2 => [
                'restaurant_id' => 1,
                'typology_id' => 12,
            ],
            3 => [
                'restaurant_id' => 2,
                'typology_id' => 1,
            ],
            4 => [
                'restaurant_id' => 2,
                'typology_id' => 2,
            ],
            5 => [
                'restaurant_id' => 2,
                'typology_id' => 13,
            ],
            6 => [
                'restaurant_id' => 3,
                'typology_id' => 1,
            ],
            7 => [
                'restaurant_id' => 3,
                'typology_id' => 8,
            ],
            8 => [
                'restaurant_id' => 3,
                'typology_id' => 11,
            ],
            9 => [
                'restaurant_id' => 4,
                'typology_id' => 1,
            ],
            10 => [
                'restaurant_id' => 4,
                'typology_id' => 2,
            ],
            11 => [
                'restaurant_id' => 4,
                'typology_id' => 8,
            ],
            12 => [
                'restaurant_id' => 5,
                'typology_id' => 1,
            ],
            13 => [
                'restaurant_id' => 5,
                'typology_id' => 6,
            ],
            14 => [
                'restaurant_id' => 5,
                'typology_id' => 7,
            ],
            15 => [
                'restaurant_id' => 5,
                'typology_id' => 11,
            ],
            16 => [
                'restaurant_id' => 5,
                'typology_id' => 12,
            ],
            17 => [
                'restaurant_id' => 6,
                'typology_id' => 1,
            ],
            18 => [
                'restaurant_id' => 6,
                'typology_id' => 9,
            ],
            19 => [
                'restaurant_id' => 6,
                'typology_id' => 8,
            ],
            20 => [
                'restaurant_id' => 6,
                'typology_id' => 11,
            ],
            21 => [
                'restaurant_id' => 6,
                'typology_id' => 6,
            ],
            22 => [
                'restaurant_id' => 6,
                'typology_id' => 7,
            ],
            23 => [
                'restaurant_id' => 7,
                'typology_id' => 7,
            ],
            24 => [
                'restaurant_id' => 7,
                'typology_id' => 4,
            ],
            25 => [
                'restaurant_id' => 7,
                'typology_id' => 10,
            ],
            26 => [
                'restaurant_id' => 7,
                'typology_id' => 11,
            ],
            27 => [
                'restaurant_id' => 8,
                'typology_id' => 1,
            ],
            28 => [
                'restaurant_id' => 8,
                'typology_id' => 2,
            ],
            29 => [
                'restaurant_id' => 9,
                'typology_id' => 6,
            ],
            30 => [
                'restaurant_id' => 9,
                'typology_id' => 9,
            ],
            31 => [
                'restaurant_id' => 10,
                'typology_id' => 1,
            ],
            32 => [
                'restaurant_id' => 10,
                'typology_id' => 9,
            ],
            33 => [
                'restaurant_id' => 10,
                'typology_id' => 12,
            ],
            34 => [
                'restaurant_id' => 11,
                'typology_id' => 11,
            ],
            35 => [
                'restaurant_id' => 11,
                'typology_id' => 12,
            ],
            36 => [
                'restaurant_id' => 11,
                'typology_id' => 7,
            ],
            37 => [
                'restaurant_id' => 12,
                'typology_id' => 1,
            ],
            38 => [
                'restaurant_id' => 12,
                'typology_id' => 6,
            ],
            39 => [
                'restaurant_id' => 13,
                'typology_id' => 13,
            ],
            40 => [
                'restaurant_id' => 13,
                'typology_id' => 14,
            ],
            41 => [
                'restaurant_id' => 14,
                'typology_id' => 1,
            ],
            42 => [
                'restaurant_id' => 14,
                'typology_id' => 5,
            ],
            43 => [
                'restaurant_id' => 15,
                'typology_id' => 14,
            ],
            44 => [
                'restaurant_id' => 15,
                'typology_id' => 5,
            ],
            45 => [
                'restaurant_id' => 15,
                'typology_id' => 9,
            ],


        ]);
    }
}
