<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //danh sach
    function list()
    {
        try {
            $lists = Setting::all();
            return response()->json(['status' => 'success', 'data' => $lists], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Lỗi truy vấn cơ sở dữ liệu: ' . $e->getMessage()
            ], 500);
        }
    }
    //form tao cai dat
    function create()
    {
        return view('setting.create');
    }
    //tao cai dat
    function insert(Request $request)
    {
        try {
            $all = $request->all();
            $request->validate([
                'type' => 'required',
                'url' => 'required|url'
            ], [
                'type.required' => 'Loại liên kết bắt buộc phải có',
                'url.required' => 'Đường dẫn url bắt buộc phải có',
                'url.url' => 'Đường dẫn url phải đúng định dạng URL'
            ]);
            $insert = Setting::create([
                'admin_id' => 1,
                'type' => $all['type'],
                'url' => $all['url'],
                'enable' => isset($all['enable']) && $all['enable'] ? 1 : 0
            ]);
            if ($insert) {
                return response()->json(['status' => 'success', 'message' => 'Thêm cài đặt thành công'], 201);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Không thể thêm cài đặt vào cơ sở dữ liệu'], 500);
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
    //form sua cai dat
    function edit(Request $request)
    {
        $id = $request->get('id');
        $one = Setting::find($id);
        return view('setting.edit',compact('one'));
        if ($one) {
            return response()->json(['status' => 'success', 'data' => $one], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Không tìm thấy danh mục với mã danh mục là ' . $id], 404);
        }
    }
    //sua cai dat
    function update(Request $request)
    {
        try {
            $all = $request->all();
            $request->validate([
                'type' => 'required',
                'url' => 'required|url'
            ], [
                'type.required' => 'Loại liên kết bắt buộc phải có',
                'url.required' => 'Đường dẫn url bắt buộc phải có',
                'url.url' => 'Đường dẫn url phải đúng định dạng URL'
            ]);
            $one = Setting::find($all['id']);
            $one->type = $all['type'];
            $one->url = $all['url'];
            $one->enable = isset($all['enable']) && $all['enable'] ? 1 : 0;
            $one->admin_id = 2;
            $update = $one->save();
            if ($update) {
                return response()->json(['status' => 'success', 'message' => 'Cập nhật thành cài đặt thành công'], 200);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Không thể cập nhật cài đặt vào cơ sở dữ liệu'], 500);
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
    //xoa cai dat
    function delete(Request $request)
    {
        try {
            $id = $request->get('id');
            $one = Setting::find($id);
            if ($one) {
                $delete = $one->delete();
                if ($delete) {
                    return response()->json(['status' => 'success', 'message' => 'Xóa thành cài đặt thành công'], 200);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Không thể xóa cài đặt vào cơ sở dữ liệu'], 500);
                }
            } else {
                return response()->json(['status' => 'error', 'message' => 'Không tìm thấy cài đặt với mã cài đặt là ' . $id], 404);
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
            $data = Setting::onlyTrashed()->get();
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
