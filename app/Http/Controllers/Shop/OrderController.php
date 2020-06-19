<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Services\MenuService;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService) {
        $this->menuService = $menuService;
    }
    public function index() {
        $menuHeader = $this->menuService->menuHeader();
        $categories = $menuHeader['categories'];

        return view('shop.order.index', compact('categories'));
    }
}
