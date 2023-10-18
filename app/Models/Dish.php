<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = ['restaurant_id','name','description','ingredients', 'visible','price'];

    public static function generateSlug($name){
        return Str::slug($name, '-');
    }
    
    public function restaurant() : BelongsTo {
        return $this->belongsTo(Restaurant::class);
    }

    public function order() : BelongsToMany {
        return $this->belongsToMany(Order::class);
    }
}
