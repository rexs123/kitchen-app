<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $primaryKey = 'cus_id';

    protected $casts = [
        'dob' => 'date',
        'allergies' => 'json',
        'address' => 'json',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
