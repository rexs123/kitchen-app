<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    protected $casts = [
        'allergies' => 'json',
        'ingredients' => 'json',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

}
