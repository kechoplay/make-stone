<?php

namespace App\Http\Services;

use App\Models\Category;
use App\Repositories\VideoRepositoryInterface;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class VideoService
{
    protected $videoRepository;

    public function __construct(VideoRepositoryInterface $categoryRepository)
    {
        $this->videoRepository = $categoryRepository;
    }

    // Lấy danh sách danh mục
    public function list()
    {
        try {
            $lists = $this->videoRepository->all();
            return [
                'status' => 'success',
                'data' => $lists
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
            $request->validate([
                'iframe' => 'required|string'
            ], [
                'name.required' => 'Hãy nhập iframe',
            ]);
            if (!Storage::disk('public')->exists('video')) {
                Storage::disk('public')->makeDirectory('video');
            }
            //luu tru anh chinh
            $mainImagePath = '';
            $mainImage = $request->file('image');
            Log::debug($mainImage);
            if ($mainImage) {
                $rawImage = $mainImage['raw'];
                $mainImageName = time() . '_' . $rawImage->getClientOriginalName();
                $mainImagePath = $rawImage->storeAs('video', $mainImageName, 'public');
                $mainImagePath = env('APP_URL') . '/storage/' . $mainImagePath;
            }
            $insert = $this->videoRepository->create([
                'name' => $all['name'],
                'iframe' => $all['iframe'],
                'type' => $all['type'],
                'image' => $mainImagePath
            ]);
            if ($insert) {
                return [
                    'status' => 'success',
                ];
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return [
                'status' => false,
                'message' => $e->errors()
            ];
        } catch (Exception $e) {
            Log::error($e);
            return [
                'status' => false,
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
            ];
        }
    }

    // Lấy một danh mục
    public function detail($id)
    {
        try {
            $one = $this->videoRepository->find($id);
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
    public function update($request, $id)
    {
        try {
            $all = $request->all();
            $video = $this->videoRepository->find($id);
            $mainImage = $request->image;
            if (!empty($mainImage['raw'])) {
                if (Storage::disk('public')->exists(str_replace('/storage/', '', $video->image))) {
                    Storage::disk('public')->delete(str_replace('/storage/', '', $video->image));
                }
                $rawImage = $mainImage['raw'];
                $mainImageName = time() . '_' . $rawImage->getClientOriginalName();
                $mainImagePath = $rawImage->storeAs('product', $mainImageName, 'public');
                $mainImagePath = env('APP_URL') . '/storage/' . $mainImagePath;
            } else {
                $mainImagePath = $mainImage['url'];
            }

            $update = $this->videoRepository->update([
                'name' => $all['name'],
                'iframe' => $all['iframe'],
                'type' => $all['type'],
                'image' => $mainImagePath
            ], $id);
            if ($update) {
                return [
                    'status' => true,
                ];
            } else {
                return [
                    'status' => false,
                    'message' => 'Không thể cập nhật danh mục vào cơ sở dữ liệu'
                ];
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'status' => false,
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            $one = $this->videoRepository->find($id);
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
