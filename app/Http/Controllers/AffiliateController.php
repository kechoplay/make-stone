<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    //danh sach
    function list()
    {
        try {
            $lists = Affiliate::all();
            return response()->json(['status' => 'success', 'data' => $lists], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Lỗi truy vấn cơ sở dữ liệu: ' . $e->getMessage()
            ], 500);
        }
    }
    //form tao link lien ket
    function create()
    {
        return view('affiliate.create');
    }
    //tao link lien ket
    function insert(Request $request)
    {
        try {
            $all = $request->all();
            $request->validate([
                'type' => 'required|unique:affiliate_link,type',
                'link' => 'required|url'
            ], [
                'type.required' => 'Loại liên kết bắt buộc phải có',
                'type.unique' => 'Loại liên kết này đã tồn tại',
                'link.required' => 'Đường dẫn url bắt buộc phải có',
                'link.url' => 'Đường dẫn url phải đúng định dạng URL'
            ]);
            $insert = Affiliate::create([
                'admin_id' => 1,
                'type' => $all['type'],
                'link' => $all['link'],
            ]);
            if ($insert) {
                return response()->json(['status' => 'success', 'message' => 'Thêm đường dẫn liên kết thành công'], 201);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Không thể thêm đường dẫn liên kết vào cơ sở dữ liệu'], 500);
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
    //form sua link lien ket
    function edit(Request $request)
    {
        $id = $request->get('id');
        $one = Affiliate::find($id);
        return view('affiliate.edit',compact('one'));
        if ($one) {
            return response()->json(['status' => 'success', 'data' => $one], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Không tìm thấy đường dẫn với mã đường dẫn là ' . $id], 404);
        }
    }
    //sua link lien ket
    function update(Request $request)
    {
        try {
            $all = $request->all();
            $request->validate([
                'type' => 'required',
                'link' => 'required|url'
            ], [
                'type.required' => 'Loại liên kết bắt buộc phải có',
                'type.unique' => 'Loại liên kết này đã tồn tại',
                'link.required' => 'Đường dẫn url bắt buộc phải có',
                'link.url' => 'Đường dẫn url phải đúng định dạng URL'
            ]);
            $one = Affiliate::find($all['id']);
            $one->type = $all['type'];
            $one->link = $all['link'];
            $one->admin_id = 2;
            $update = $one->save();
            if ($update) {
                return response()->json(['status' => 'success', 'message' => 'Cập nhật thành đường dẫn thành công'], 200);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Không thể cập nhật đường dẫn vào cơ sở dữ liệu'], 500);
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
    //xoa link lien ket
    function delete(Request $request)
    {
        try {
            $id = $request->get('id');
            $one = Affiliate::find($id);
            if ($one) {
                $delete = $one->delete();
                if ($delete) {
                    return response()->json(['status' => 'success', 'message' => 'Xóa thành đường dẫn liên kết thành công'], 200);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Không thể xóa đường dẫn liên kết vào cơ sở dữ liệu'], 500);
                }
            } else {
                return response()->json(['status' => 'error', 'message' => 'Không tìm thấy đường dẫn liên kết với mã đường dẫn liên kết là ' . $id], 404);
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
            $data = Affiliate::onlyTrashed()->get();
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
