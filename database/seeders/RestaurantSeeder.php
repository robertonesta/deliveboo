<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = config("restaurants_db");
        foreach ($restaurants as $restaurant)
        {
            $newRestaurant = new restaurant();
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->slug = Str::slug($restaurant['name']);
            $newRestaurant->price = $restaurant["price"];
            $newRestaurant->image = $restaurant["image"];
            $newRestaurant->description = $restaurant["description"];
            $newRestaurant->save();
        }
    }
}
