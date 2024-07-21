<?php

namespace App\Http\Services;

use App\Models\Setting;
use App\Repositories\SettingRepositoryInterface;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SettingService
{
    protected $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }
    // Lấy danh sách cài đặt
    public function list()
    {
        try {
            $lists = $this->settingRepository->all();
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

    // Thêm một cài đặt mới
    public function insert(Request $request)
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
            $insert = $this->settingRepository->create([
                'admin_id' => 1,
                'type' => $all['type'],
                'url' => $all['url'],
                'enable' => isset($all['enable']) && $all['enable'] ? 1 : 0
            ]);
            if ($insert) {
                return [
                    'status' => 'success',
                    'message' => 'Thêm cài đặt thành công'
                ];
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return [
                'status' => 'error',
                'message' => $e->errors()
            ];
        } catch (QueryException $e) {
            return [
                'status' => 'error',
                'message' => 'Lỗi truy vấn cơ sở dữ liệu: ' . $e->getMessage()
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
            ];
        }
    }

    // Lấy một cài đặt
    public function getOne(Request $request)
    {
        try {
            $id = $request->get('id');
            $one = $this->settingRepository->find($id);
            return [
                'status' => 'success',
                'message' => 'Lấy cài đặt thành công',
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

    // Cập nhật cài đặt
    public function update(Request $request)
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
            $update = $this->settingRepository->update([
                'type' => $all['type'],
                'url' => $all['url'],
                'enable' => isset($all['enable']) && $all['enable'] ? 1 : 0,
                'admin_id' => 2,
            ],$all['id']);
            if ($update) {
                return [
                    'status' => 'success',
                    'message' => 'Cập nhật cài đặt thành công'
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Không thể cập nhật cài đặt vào cơ sở dữ liệu'
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

    // Xóa tạm thời sản phẩm
    public function delete(Request $request)
    {
        try {
            $id = $request->get('id');
            $delete = $this->settingRepository->delete($id);
            if ($delete) {
                return [
                    'status' => 'success',
                    'message' => 'Xóa thành cài đặt thành công'
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Không thể xóa cài đặt vào cơ sở dữ liệu'
                ];
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

    // Xem cài đặt đã cho vào thùng rác
    public function trash()
    {
        try {
            $data = $this->settingRepository->allOnlyTrashed();
            return [
                'status' => 'success',
                'message' => 'Lấy cài đặt thành công',
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
