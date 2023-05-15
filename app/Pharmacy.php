<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $guarded = [];
    protected $casts = [
        'is_active'=> 'boolean'
    ];
    public function products()
    {
        return $this->hasMany(Products::class, 'pharmacy_id', 'id');
    }
}
