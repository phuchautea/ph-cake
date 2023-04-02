<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function store(){
        return view('page.store', [
            'title' => 'Vị trí cửa hàng',
        ]);
    }
}
