<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'customer_id', 
        'total_amount', 
        'payment_method'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsToMany(Product::class, 'product_sell')->withPivot('qunatity');
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
