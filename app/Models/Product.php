<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Sale;
use App\Models\Category;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'picture',
        'price',
        'rating',
        'amount',
        'category_id'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orders_products', 'order_id', 'product_id');
    }
}
