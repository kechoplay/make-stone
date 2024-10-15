<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Models\Bidding;
use App\Models\BiddingUser;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $page = empty($request->page) ? 1 : $request->page;
        $videoFirstPage = Video::query()->where('type', 0)->limit(2)->get();
        $totalVideoNextPage = Video::query()->where('type', 1)->count();
        $totalPage = ($totalVideoNextPage / 3) + 3;
        $videoNextPage = null;
        if ($page > 2) {
            $videoNextPage = Video::query()->where('type', 1)->limit(3)->offset((($page - 3) * 3))->get();
        }

        return view('index', compact('page', 'videoFirstPage', 'totalPage', 'videoNextPage'));
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
