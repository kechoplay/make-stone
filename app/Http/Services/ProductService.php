<?php

namespace App\Http\Services;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;
use App\RepositoryEloquent\CategoryRepository;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    protected $productRepository, $categoryRepository;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    // Lấy danh sách sản phẩm
    public function list($limit = 0)
    {
        try {
            if(!$limit) $lists = $this->productRepository->getAllProduct();
            else $lists = Product::select('id', 'category_id', 'name', 'quantity', 'description', 'main_image', 'sub_image', 'bidding_id')->orderBy('updated_at','desc')->get();
            $listCategory = Category::select('id', 'name')->get();

            if ($lists) {
                foreach ($lists as $list) {
                    $list->main_image = env('APP_URL') . $list->main_image;
                }
            }
            return [
                'status' => 'success',
                'data' => $lists,
                'listCategory' => $listCategory,
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Lỗi: ' . $e->getMessage()
            ];
        }
    }

    // Tạo form thêm sản phẩm
    public function create()
    {
        try {
            $listCategory = $this->categoryRepository->select(['id','name']);
            // $listCategory = Category::select('id', 'name')->get();
            return [
                'status' => 'success',
                'listCategory' => $listCategory,
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

    // Thêm một sản phẩm mới
    public function insert(Request $request)
    {
        try {
            $all = $request->all();

            if (!Storage::disk('public')->exists('product')) {
                Storage::disk('public')->makeDirectory('product');
            }
            //luu tru anh chinh
            $mainImagePath = '';
            if ($request->hasFile('mainImage')) {
                $mainImage = $request->file('mainImage');
                $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
                $mainImagePath = $mainImage->storeAs('product', $mainImageName, 'public');
                $mainImagePath = '/storage/' . $mainImagePath;
            }

            // luu tru anh phu
            $jsonSubImages = '';
            if ($request->hasFile('subImage')) {
                $subImages = $request->file('subImage');
                $arraySubImages = [];
                foreach ($subImages as $image) {
                    $name = time() . '_' . $image->getClientOriginalName();
                    $imagePath = $image->storeAs('product', $name, 'public');
                    $imagePath = '/storage/' . $imagePath;
                    $arraySubImages[] = $imagePath;
                }
                $jsonSubImages = json_encode($arraySubImages);
            }
            $insert = $this->productRepository->create([
                'admin_id' => 1,
                'name' => $all['name'],
//                'price' => $all['price'],
                'description' => $all['description'],
                'category_id' => $all['category'],
//                'quantity' => 1,
                'main_image' => $mainImagePath,
                'sub_image' => $jsonSubImages,
            ]);
            if ($insert) {
                return [
                    'status' => 'success',
                    'message' => 'Thêm sản phẩm thành công'
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

    // Lấy một sản phẩm
    public function getOne(Request $request)
    {
        try {
            $id = $request->get('id');
            $one = $this->productRepository->find($id);
            $listCategory = $this->categoryRepository->select(['id','name']);
            return [
                'status' => 'success',
                'message' => 'Lấy sản phẩm thành công',
                'data' => $one,
                'listCategory' => $listCategory
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

    // Cập nhật sản phẩm
    public function update(Request $request)
    {
        try {
            $all = $request->all();
            $request->validate([
                'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
                'sub_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
                'name' => 'required|string|max:255',
                'price' => 'required|integer|min:1',
                'quantity' => 'required|integer|min:1',
                'description' => 'required',
            ], [
                'main_image.image' => 'Hình ảnh chính phải là một tệp hình ảnh.',
                'main_image.mimes' => 'Hình ảnh chính phải có định dạng: jpeg, png, jpg, gif, svg, webp.',
                'sub_image.*.image' => 'Hình ảnh phụ phải là một tệp hình ảnh.',
                'sub_image.*.mimes' => 'Hình ảnh phụ phải có định dạng: jpeg, png, jpg, gif, svg, webp.',
                'name.required' => 'Tên sản phẩm là bắt buộc.',
                'name.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
                'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
                'price.required' => 'Giá sản phẩm là bắt buộc.',
                'price.integer' => 'Giá sản phẩm phải là số nguyên.',
                'price.min' => 'Giá sản phẩm phải lớn hơn 0.',
                'quantity.required' => 'Số lượng sản phẩm là bắt buộc.',
                'quantity.integer' => 'Số lượng sản phẩm phải là số nguyên.',
                'quantity.min' => 'Số lượng sản phẩm phải lớn hơn 0.',
                'description.required' => 'Mô tả sản phẩm là bắt buộc.',
            ]);
            //lay thong tin san pham
            $product = $this->productRepository->find($all['id']);
            //ktra co thu muc product khong
            if (!Storage::disk('public')->exists('product')) {
                Storage::disk('public')->makeDirectory('product');
            }
            $mainImagePath = '';
            $jsonSubImages = '';
            // luu tru anh chinh
            if ($request->hasFile('main_image')) {
                //kiem tra anh cu
                if (Storage::disk('public')->exists(str_replace('/storage/', '', $product->main_image))) {
                    Storage::disk('public')->delete(str_replace('/storage/', '', $product->main_image));
                }
                $mainImage = $request->file('main_image');
                $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
                $mainImagePath = $mainImage->storeAs('product', $mainImageName, 'public');
                $mainImagePath = '/storage/' . $mainImagePath;
            }
            // luu tru anh phu
            if ($request->hasFile('sub_image')) {
                $oldSubImages = json_decode($product->sub_image, true);
                foreach ($oldSubImages as $oldImage) {
                    if (Storage::disk('public')->exists(str_replace('/storage/', '', $oldImage))) {
                        Storage::disk('public')->delete(str_replace('/storage/', '', $oldImage));
                    }
                }
                $subImages = $request->file('sub_image');
                $arraySubImages = [];
                foreach ($subImages as $image) {
                    $name = time() . '_' . $image->getClientOriginalName();
                    $imagePath = $image->storeAs('product', $name, 'public');
                    $imagePath = '/storage/' . $imagePath;
                    $arraySubImages[] = $imagePath;
                }
                $jsonSubImages = json_encode($arraySubImages);
            }
            $update = $this->productRepository->update([
                'admin_id' => 2,
                'name' => $all['name'],
                'price' => $all['price'],
                'description' => $all['description'],
                'category_id' => $all['category_id'],
                'quantity' => $all['quantity'],
                'bidding_id' => 2,
                'main_image' => isset($mainImagePath) && $mainImagePath ? $mainImagePath : $product->main_image,
                'sub_image' => isset($jsonSubImages) && $jsonSubImages ? $jsonSubImages : $product->sub_image,
            ],$all['id']);
            if ($update) {
                return [
                    'status' => 'success',
                    'message' => 'Cập nhật sản phẩm thành công'
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Không thể cập nhật sản phẩm vào cơ sở dữ liệu'
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
    public function delete($id)
    {
        try {
            $one = Product::find($id);
            if ($one) {
                $one->delete();
                return [
                    'status' => 'success',
                    'message' => 'Xóa thành sản phẩm thành công'
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Không tìm thấy sản phẩm với mã sản phẩm là ' . $id
                ];
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
            ], 500);
        }
    }

    // Xem sản phẩm đã cho vào thùng rác
    public function trash()
    {
        try {
            $data = $this->productRepository->allOnlyTrashed();
            return [
                'status' => 'success',
                'message' => 'Lấy sản phẩm thành công',
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
    // Chi tiết sản phẩm
    public function detail($id)
    {
        try {
            $product = $this->productRepository->find($id,['id', 'category_id', 'name', 'quantity', 'description', 'main_image', 'sub_image', 'bidding_id']);
            $category_id = $product->category_id;
            $category = $this->categoryRepository->find($category_id,['id','name']);
            return ['status' => 'success', 'product' => $product, 'category' => $category];
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
