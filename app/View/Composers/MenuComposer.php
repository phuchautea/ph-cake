<?php

namespace App\View\Composers;

use App\Repositories\UserRepository;
use Illuminate\View\View;
use App\Http\Services\Category\CategoryService;

class MenuComposer
{
    /**
     * Create a new profile composer.
     */
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view)
    {
        $categoryMenus = $this->categoryService->getParent();
        $view->with('categoryMenus', $categoryMenus);
    }
}
