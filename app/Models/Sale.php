<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Sale extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'discount',
        'start_time',
        'end_time'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
