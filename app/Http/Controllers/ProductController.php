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

    //form them san pham
    public function create()
    {
        $result = $this->productService->list();
        $listCategory = $result['listCategory'];
        return view('product.create',compact('listCategory'));
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
    //form sua san pham
    public function edit(Request $request)
    {
        $result = $this->productService->getOne($request);
        $one = $result['data'];
        $listCategory = $result['listCategory'];
        return view('product.edit', compact('one', 'listCategory'));
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //sua san pham
    public function update(Request $request)
    {
        $result = $this->productService->update($request);
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //xoa san pham
    public function delete(Request $request)
    {
        $result = $this->productService->delete($request);
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
    public function detail(Request $request)
    {
        $result = $this->productService->detail($request);
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }

}
