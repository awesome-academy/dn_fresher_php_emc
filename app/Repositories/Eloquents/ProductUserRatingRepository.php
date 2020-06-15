<?php
namespace App\Repositories\Eloquents;

use Carbon\Carbon;
use App\Models\ProductUserRating;
use App\Repositories\Eloquents\BaseRepository;
use App\Repositories\Interfaces\ProductUserRatingRepositoryInterface;

class ProductUserRatingRepository extends BaseRepository implements ProductUserRatingRepositoryInterface
{
    public function getModel()
    {
        return ProductUserRating::class;
    }

    public function countRatingByProductId($product_id) {
        return ProductUserRating::where('product_id', $product_id)->count();
    }
}
