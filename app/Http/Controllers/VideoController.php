<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Http\Services\VideoService;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    protected $videoService;

    public function __construct(VideoService $videoService)
    {
        $this->videoService = $videoService;
    }

    // Lấy danh sách danh mục
    public function list()
    {
        $result = $this->videoService->list();
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
        $result = $this->videoService->insert($request);
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //form sua danh muc
    public function detail($id)
    {
        $result = $this->videoService->detail($id);
        return response()->json($result, 200);
    }
    //sua danh muc
    public function update(Request $request, $id)
    {
        $result = $this->videoService->update($request, $id);
        return $result;
    }
    //xoa danh muc
    public function delete($id)
    {
        $result = $this->videoService->delete($id);
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
