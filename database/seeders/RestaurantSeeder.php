<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Illuminate\Support\Str;

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
            $newRestaurant = new Restaurant();
            $newRestaurant->user_id = $restaurant['user_id'];
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->slug = Str::slug($restaurant['name']);
            $newRestaurant->address = $restaurant["address"];
            $newRestaurant->piva = $restaurant["piva"];
            $newRestaurant->photo = $restaurant["photo"];
            $newRestaurant->save();
        }
    }
}
