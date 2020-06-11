<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductUserRating extends Model
{
    protected $table = 'products_users_rating';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'product_id',
        'user_id',
        'rating_point',
    ];
}
