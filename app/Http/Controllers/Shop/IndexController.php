<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface as ProductRepository;

class IndexController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository) {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAllWithChildren();
        $hotTrendProduct = $this->productRepository->getHotTrend();

        return view('shop.index.index', compact('categories', 'hotTrendProduct'));
    }
}
