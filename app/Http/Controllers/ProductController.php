<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    //danh sach
    public function list()
    {
        $result = $this->productService->list();
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }

    //tao san pham
    public function insert(Request $request)
    {
        $result = $this->productService->insert($request);
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }

    //sua san pham
    public function update(Request $request, $id)
    {
        $result = $this->productService->update($request, $id);
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //xoa san pham
    public function delete(Request $request, $id)
    {
        $result = $this->productService->delete($id);
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //thung rac
    public function trash()
    {
        $result = $this->productService->trash();
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //chi tiet san pham
    public function detail(Request $request, $id)
    {
        $result = $this->productService->detail($id);

        return response()->json(['success' => true, 'data' => $result, 'message' => ''], 200);
    }

    public function startBidding(Request $request, $id)
    {
        $result = $this->productService->startBidding($request->all(), $id);

        return response()->json($result, 200);
    }

    public function stopBidding($id)
    {
        $result = $this->productService->stopBidding($id);

        return response()->json($result, 200);
    }

}
