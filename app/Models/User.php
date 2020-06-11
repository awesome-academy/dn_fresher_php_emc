<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'email',
        'password',
        'fullname',
        'birthday',
        'address',
        'phone',
        'avatar'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function products()
    {
        return $this->belongsToMany(User::class, 'products_users_rating', 'user_id', 'product_id');
    }
}
