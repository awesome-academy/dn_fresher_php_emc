<?php

namespace App\Repositories\Interfaces;

interface ProductUserRatingRepositoryInterface
{
    public function countRatingByProductId($product_id);
}
