<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface as ProductRepository;
use App\Repositories\Interfaces\ProductUserRatingRepositoryInterface as ProductUserRatingRepository;

class ProductController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;
    protected $productUserRatingRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository,
        ProductUserRatingRepository $productUserRatingRepository) {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->productUserRatingRepository = $productUserRatingRepository;
    }

    public function show($product_id) {
        $categories = $this->categoryRepository->getAllWithChildren();
        $product = $this->productRepository->showDetail($product_id);
        $countReview = $this->productUserRatingRepository->countRatingByProductId($product_id);
        $relatedProducts = $this->productRepository->getByCategoryId($product->category_id);

        return view('shop.product.show', compact('product', 'categories', 'countReview', 'relatedProducts'));
    }
}
