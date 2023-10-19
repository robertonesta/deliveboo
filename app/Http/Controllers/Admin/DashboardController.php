<?php

namespace App\Http\Controllers\Admin;
use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $user = Auth::user(); 
        $user_id = $user->id; 
    
        // Ora puoi usare $user_id nella tua query
        $restaurants = Restaurant::where('user_id', $user_id)->paginate(5);
        return view('admin.dashboard', compact('restaurants'));
    }
}