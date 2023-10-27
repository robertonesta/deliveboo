<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = config("dishes_db.dishes");
        foreach ($dishes as $dish)
        {
            foreach ($dish['restaurant_id'] as $restaurant_id){

                $newDish = new Dish();
                $newDish->restaurant_id = $restaurant_id;
                $newDish->name = $dish['name'];
                $newDish->photo = $dish['image'];
                $newDish->slug = Str::slug($dish['name']);
                $newDish->description = $dish["description"];
                $newDish->ingredients = $dish["ingredients"];
                $newDish->visible = $dish["available"];
                $newDish->price = $dish["price"];
                $newDish->save();
            }
        }
    }
}

// $plates = config('dataseeder.plates');
// foreach ($plates as $plate)