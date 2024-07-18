<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $result = $this->productService->list(10);
        $list = $result['data'];
        return view('index',compact('list'));
    }

    public function shop()
    {
        $result = $this->productService->list();
        $list = $result['data'];
        return view('shop',compact('list'));
    }
}
