<?php

namespace App\Http\Services;

use App\Models\Category;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CategoryService
{
    // Lấy danh sách danh mục
    public function list()
    {
        try {
            $lists = Category::all();
            return [
                'status' => 'success',
                'data' => $lists
            ];
        } catch (QueryException $e) {
            return [
                'status' => 'error',
                'message' => 'Lỗi truy vấn cơ sở dữ liệu: ' . $e->getMessage()
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Lỗi: ' . $e->getMessage()
            ];
        }
    }

    // Thêm một danh mục mới
    public function insert(Request $request)
    {
        try {
            $all = $request->all();

            $insert = Category::create([
                'admin_id' => 1,
                'name' => $all['name'],
            ]);
            if ($insert) {
                return [
                    'status' => 'success',
                    'message' => 'Thêm danh mục ' . $all['name'] . ' thành công'
                ];
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return [
                'status' => 'error',
                'message' => $e->errors()
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
            ];
        }
    }

    // Lấy một danh mục
    public function getOne(Request $request)
    {
        try {
            $id = $request->get('id');
            $one = Category::find($id);
            return [
                'status' => 'success',
                'message' => 'Lấy danh mục thành công',
                'data' => $one
            ];
        } catch (QueryException $e) {
            return [
                'status' => 'error',
                'message' => 'Lỗi truy vấn cơ sở dữ liệu: ' . $e->getMessage()
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Lỗi: ' . $e->getMessage()
            ];
        }
    }

    // Cập nhật danh mục
    public function update(Request $request)
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
                return [
                    'status' => 'success',
                    'message' => 'Cập nhật danh mục thành ' . $all['name'] . ' thành công'
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Không thể cập nhật danh mục vào cơ sở dữ liệu'
                ];
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

    public function delete($id)
    {
        try {
            $one = Category::find($id);
            if ($one) {
                $one->delete();
                return [
                    'status' => 'success',
                    'message' => 'Xóa thành danh mục ' . $one->name . ' thành công'
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Không tìm thấy danh mục với mã danh mục là ' . $id
                ];
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
            ], 500);
        }
    }

    // Xem danh mục đã cho vào thùng rác
    public function trash()
    {
        try {
            $data = Category::onlyTrashed()->get();
            return [
                'status' => 'success',
                'message' => 'Lấy danh mục thành công',
                'data' => $data
            ];
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
