<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //danh sach
    function list()
    {
        try {
            $lists = Category::all();
            return response()->json(['status' => 'success', 'data' => $lists], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Lỗi truy vấn cơ sở dữ liệu: ' . $e->getMessage()
            ], 500);
        }
    }
    //form tao danh muc
    function create()
    {
        return view('category.create');
    }
    //tao danh muc
    function insert(Request $request)
    {
        try {
            $all = $request->all();
            $request->validate([
                'name' => 'required|string|max:255|unique:category,name'
            ], [
                'name.required' => 'Tên danh mục bắt buộc phải có',
                'name.string' => 'Tên danh mục phải là chữ cái',
                'name.max' => 'Tên danh mục không vượt quá 255 chữ cái',
                'name.unique' => 'Tên danh mục đã tồn tại'
            ]);
            $insert = Category::create([
                'admin_id' => 1,
                'name' => $all['name'],
            ]);
            if ($insert) {
                return response()->json(['status' => 'success', 'message' => 'Thêm danh mục ' . $all['name'] . ' thành công'], 201);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Không thể thêm danh mục vào cơ sở dữ liệu'], 500);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->errors()
            ], 422);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Lỗi truy vấn cơ sở dữ liệu: ' . $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            // Xử lý các lỗi khác nếu có
            return response()->json([
                'status' => 'error',
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
            ], 500);
        }
    }
    //form sua danh muc
    function edit(Request $request)
    {
        $id = $request->get('id');
        $one = Category::find($id);
        if ($one) {
            return response()->json(['status' => 'success', 'data' => $one], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Không tìm thấy danh mục với mã danh mục là ' . $id], 404);
        }
    }
    //sua danh muc
    function update(Request $request)
    {
        try {
            $all = $request->all();
            $request->validate([
                'name' => 'required|string|max:255'
            ], [
                'name.required' => 'Tên danh mục bắt buộc phải có',
                'name.string' => 'Tên danh mục phải là chữ cái',
                'name.max' => 'Tên danh mục không vượt quá 255 chữ cái',
            ]);
            $one = Category::find($all['id']);
            $one->name = $all['name'];
            $one->admin_id = 2;
            $update = $one->save();
            if ($update) {
                return response()->json(['status' => 'success', 'message' => 'Cập nhật thành danh mục ' . $all['name'] . ' thành công'], 200);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Không thể cập nhật danh mục vào cơ sở dữ liệu'], 500);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->errors()
            ], 422);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Lỗi truy vấn cơ sở dữ liệu: ' . $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            // Xử lý các lỗi khác nếu có
            return response()->json([
                'status' => 'error',
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
            ], 500);
        }
    }
    //xoa danh muc
    function delete(Request $request)
    {
        try {
            $id = $request->get('id');
            $one = Category::find($id);
            if ($one) {
                $delete = $one->delete();
                if ($delete) {
                    return response()->json(['status' => 'success', 'message' => 'Xóa thành danh mục ' . $one->name . ' thành công'], 200);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Không thể xóa danh mục vào cơ sở dữ liệu'], 500);
                }
            } else {
                return response()->json(['status' => 'error', 'message' => 'Không tìm thấy danh mục với mã danh mục là ' . $id], 404);
            }
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Lỗi truy vấn cơ sở dữ liệu: ' . $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            // Xử lý các lỗi khác nếu có
            return response()->json([
                'status' => 'error',
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
            ], 500);
        }
    }
    //thung rac
    function trash() {
        try {
            $data = Category::onlyTrashed()->get();
            return response()->json(['status' => 'success', 'message' => 'Trả dữ liệu thành công', 'data' => $data], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Lỗi truy vấn cơ sở dữ liệu: ' . $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
            ], 500);
        }
    }
}
