<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function getHotTrend();

    public function showDetail($product_id);

    public function getByCategoryId($category_id);

    public function getSalesInTime();

    public function getOutSales();

    public function getPaginateByCategoryId($category_id);

    public function findWithSales($product_id);
}
