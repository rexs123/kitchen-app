<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    protected $casts = [
        'dob' => 'datetime',
        'allergies' => 'array',
        'address' => 'array',
    ];

    protected $dates = [
      'dob'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    protected function lastName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }
}
