<?php

namespace App\Http\Controllers\API;

use App\Models\Typology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypologiesController extends Controller
{
    public function index() {
        $typologies = Typology::all();

	    return response()->json([
		    'success' => true,
		    'typologies' => $typologies,
	    ]);
    }
}
