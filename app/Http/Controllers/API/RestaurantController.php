<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
class RestaurantController extends Controller
{
    public function index() {
        $restaurants = Restaurant::all();

	    return response()->json([
		    'success' => true,
		    'restaurants' => $restaurants,
	    ]);
    }

	public function typologiesSearch(Request $request) {

        $typologyIds = $request->input('typologyIds'); // Leggi il valore da Vue.js
        //dd($typologyIds);
        $restaurants_query = Restaurant::query();
        foreach($typologyIds as $typologyId) {
            $restaurants_query->whereHas('typologies', function($query) use ($typologyId) {
                $query->where('typology_id', $typologyId);
            });
        }

        $restaurants = $restaurants_query->with('typologies')->get();
        //dd($restaurants);

        return response()->json([
            'success' => true,
            'restaurants' => $restaurants,
        ]);
    }
	

    public function show($slug){
        $restaurant = Restaurant::with('dishes', 'typologies')->where('slug', $slug)->first();

        if ($restaurant) {
            return response()->json([
                'success' => true,
                'restaurant' => $restaurant,
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'restaurant' => 'restaurant not found',
            ]);
            }
    }
}