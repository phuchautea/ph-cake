<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Product extends Model
{
    use HasFactory;
    use SearchableTrait;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'status',
        'price',
        'sold_quantity',
        'category_id'
    ];

    protected $searchable = [
        'columns' => [
            'products.name' => 10,
            'products.description' => 5,
        ],
        'fuzzy' => [
            'products.name',
        ],
    ];
}
