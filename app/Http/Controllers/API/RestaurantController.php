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

	// public function typologiesSearch(Request $request ) {
	// 	$typologyId = '1'; 

	// 	$restaurants = Restaurant::whereHas('typologies', function($query) use ($typologyId) {
    // 	$query->where('typology_id', $typologyId);
	// 	})
	// 	// ->join('typologies' , 'restaurants.id', '=', 'typologies.id')	// ->select('name')
	// 	->get();
		
	
	// 	return response()->json([
	// 		'success' => true,
	// 		'restaurants' => $restaurants,
	// 	]);
	// }

	public function typologiesSearch(Request $request) {
		$typologyId = $request->input('typologyId'); // Leggi il valore da Vue.js
	
		$restaurants = Restaurant::whereHas('typologies', function($query) use ($typologyId) {
			$query->where('typology_id', $typologyId);
		})->get();
	
		return response()->json([
			'success' => true,
			'restaurants' => $restaurants,
		]);
	}
	
}



// $restaurantType = DB::table('restaurants')
//         ->join('typologies' , 'restaurants.id', '=', 'typologies.restaurant_id')
//         ->select('restaurants.', 'typologies.')
//         ->get();