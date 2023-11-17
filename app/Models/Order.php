<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable  = ['name', 'lastname', 'address', 'phone','status', 'totalprice'];

    public function dishes() : BelongsToMany {
        return $this->belongsToMany(Dish::class);
    }
}
