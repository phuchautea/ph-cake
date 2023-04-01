<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');
        //$products = Product::where('name', 'like', '%' . $query . '%')->paginate(5);
        $products = Product::search($query)->paginate(5);
        return view('search', [
            'products' => $products,
            'query' => $query,
        ]);
    }

}
