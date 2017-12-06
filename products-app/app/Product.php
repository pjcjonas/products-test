<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'sku',
        'price',
        'status',
        'quality_approved',
        'image_url',
        'brand'
   ];

    protected $casts = [
        'price' => 'float',
        'quality_approved' => 'boolean'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function scopeValidProducts($query)
    {
        return $query
            ->where('name', '<>', null)
            ->where('sku', '<>', null)
            ->where('price', '<>', null)
            ->where('status', '<>', null)
            ->where('status', '<>', 'inactive')
            ->where('status', '<>', 'deleted')
            ->where('quality_approved', '<>', null)
            ->where('image_url', '<>', null)
            ->where('brand', '<>', null);
    }

}
