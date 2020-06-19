<?php
namespace App\Services;

use App\Repositories\Interfaces\CategoryRepositoryInterface as CategoryRepository;

class MenuService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function menuHeader() {
        $categories = $this->categoryRepository->getAllWithChildren();

        return [
            'categories' => $categories,
        ];
    }
}
