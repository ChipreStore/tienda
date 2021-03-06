<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    protected $fillable = [
        'name', 'product_id'
    ];
    
    public function product() {
        return $this->belongsTo(Product::class);
    }
}