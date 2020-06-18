<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Enums\SaleEnums;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\SaleRepositoryInterface as SaleRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface as ProductRepository;
use App\Repositories\Interfaces\ProductUserRatingRepositoryInterface as ProductUserRatingRepository;

class ProductController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;
    protected $saleRepository;
    protected $productUserRatingRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        SaleRepository $saleRepository,
        ProductRepository $productRepository,
        ProductUserRatingRepository $productUserRatingRepository) {
        $this->saleRepository = $saleRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->productUserRatingRepository = $productUserRatingRepository;
    }

    public function show($product_id) {
        $categories = $this->categoryRepository->getAllWithChildren();
        $isSale = $this->saleRepository->checkProductSale($product_id);
        $product = $this->productRepository->findWithSales($product_id);
        $price = $isSale == SaleEnums::DoesntHaveSale
            ? $product->price
            : $product->price - $product->price * ($product->sales[0]->discount / 100);
        $countReview = $this->productUserRatingRepository->countRatingByProductId($product_id);
        $relatedProducts = $this->productRepository->getByCategoryId($product->category_id);

        return view('shop.product.show', compact('product', 'categories', 'countReview', 'relatedProducts', 'price'));
    }
}
