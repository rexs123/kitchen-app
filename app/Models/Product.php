<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    protected $casts = [
        'ingredients' => 'array',
        'allergens' => 'array',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'product_order');
    }


//    protected function ingredients(): Attribute
//    {
//        return Attribute::make(
//            set: fn ($value) => json_encode($value),
//        );
//    }
//
//    protected function allergens(): Attribute
//    {
//        return Attribute::make(
//            set: fn ($value) => json_encode($value),
//        );
//    }

}
