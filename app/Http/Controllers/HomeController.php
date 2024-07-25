<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Models\Bidding;
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
        return view('index', compact('list'));
    }

    public function shop()
    {
        $result = $this->productService->list();
        $productList = $result['data'];
        return view('shop', compact('productList'));
    }

    public function detail($id)
    {
        $product = $this->productService->detail($id);
        $bidding = Bidding::query()->where('product_id', $id)->where('status', 1)->first();
        $hasBidding = false;
        if ($bidding) {
            $hasBidding = true;
        }
        return view('shop_detail', compact('product', 'hasBidding'));
    }

    public function makeOffer(Request $request)
    {
        $response = $this->productService->makeOffer($request->all());
        return response()->json($response);
    }
}
