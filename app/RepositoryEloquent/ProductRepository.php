<?php

namespace App\RepositoryEloquent;

use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function model()
    {
        return Product::class;
    }
}
