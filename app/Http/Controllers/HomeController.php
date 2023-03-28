<?php

namespace App\Http\Controllers;

use App\Http\Services\HomeService;
use App\Http\Services\Category\CategoryService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $homeService;
    protected $categoryService;
    public function __construct(HomeService $homeService, CategoryService $categoryService)
    {
        $this->homeService = $homeService;
        $this->categoryService = $categoryService;
    }
    public function index(){
        return view('home', [
            'title' => 'Trang chủ',
            'categoryParents' => $this->categoryService->getParent(),
        ]);
    }
}
