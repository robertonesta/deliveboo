<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DishOrder extends Model
{
    use HasFactory;

    protected $fillable = ['dish_id', 'order_id', 'quantity'];

    public function dish() : BelongsToMany {
        return $this->belongsToMany(Dish::class);
    }

    public function order() : BelongsToMany {
        return $this->belongsToMany(Order::class);
    }
}
