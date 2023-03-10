<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['updated_at', 'created_at', 'product_id'];

    public function product (){
        return $this->hasOne(Product::class);
    }
}
