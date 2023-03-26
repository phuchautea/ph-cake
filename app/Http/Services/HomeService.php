<?php

namespace App\Http\Services;

use App\Models\Category;

class HomeService
{
    public function getCategoryParents()
    {
        return Category::where('parent_id', 0)->orderBy('created_at', 'asc')->get();
    }
}
