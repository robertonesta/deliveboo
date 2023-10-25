<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;
use App\Models\Typology;

class RestaurantTypology extends Model
{
    use HasFactory;

    protected $table = 'restaurant_typology';

    public function restaurant() {
        return @this-> hasMany(Restaurant::class);
    }

    public function typology() {
        return @this-> hasMany(Typology::class);
    }
}
