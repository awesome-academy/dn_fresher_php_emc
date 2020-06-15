<?php
namespace App\Repositories\Eloquents;

use Carbon\Carbon;
use App\Models\Product;
use App\Repositories\Eloquents\BaseRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }

    public function getHotTrend() {
        $now = Carbon::now();
        $products = Product::withCount('orders')
        ->orderBy('orders_count', 'desc')
        ->orderBy('created_at', 'desc')
        ->take(config('setting.hot_trend_limit'))->get();

        return $products;
    }
}
