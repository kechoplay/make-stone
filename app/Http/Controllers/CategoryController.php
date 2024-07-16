<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    // Lấy danh sách danh mục
    public function list()
    {
        $result = $this->categoryService->list();
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }

    public function create() {
        return view('category.create');
    }

    // Tạo danh mục mới
    public function insert(Request $request)
    {
        $result = $this->categoryService->insert($request);
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //form sua danh muc
    public function edit(Request $request)
    {
        $result = $this->categoryService->getOne($request);
        // $one = $result['data'];
        // return view('category.edit',compact('one'));
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //sua danh muc
    public function update(Request $request)
    {
        $result = $this->categoryService->update($request);
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //xoa danh muc
    public function delete(Request $request)
    {
        $result = $this->categoryService->delete($request);
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //thung rac
    public function trash() {
        $result = $this->categoryService->trash();
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
}
