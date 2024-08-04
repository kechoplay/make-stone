<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Models\Bidding;
use App\Models\BiddingUser;
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
        $bidding = Bidding::query()->where('product_id', $id)->where('status', Bidding::STATUS_BIDDING_START)->first();
        $hasBidding = false;
        $biddingUsers = null;
        if ($bidding) {
            $hasBidding = true;
            $biddingUsers = BiddingUser::query()->where('bidding_id', $bidding->id)->where('product_id', $id)->get();
        }
        return view('shop_detail', compact('product', 'hasBidding', 'biddingUsers', 'bidding'));
    }

    public function makeOffer(Request $request)
    {
        $response = $this->productService->makeOffer($request->all());
        return response()->json($response);
    }
}
