<?php

namespace App\View\Composers;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use App\Http\Services\CartService;
class CartComposer
{
    /**
     * Create a new profile composer.
     */
    protected $cartService;
    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view)
    {
        $productCarts = $this->cartService->getProduct();
        $carts = Session::get('carts');
        $view->with('productCarts', $productCarts)
             ->with('carts', $carts);
    }
}
