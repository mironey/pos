<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'code', 
        'cost', 
        'price', 
        'stock', 
        'category_id', 
        'image'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function sell() {
        return $this->belongsToMany(Sell::class, 'product_sale');
    }
}
