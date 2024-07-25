<?php

namespace App\Http\Services;

use App\Models\Bidding;
use App\Models\BiddingUser;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Repositories\ProductRepositoryInterface;
use App\RepositoryEloquent\CategoryRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    protected $productRepository, $categoryRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepository         $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    // Lấy danh sách sản phẩm
    public function list($limit = 0)
    {
        try {
            if (!$limit) $lists = $this->productRepository->getAllProduct();
            else $lists = Product::select('id', 'category_id', 'name', 'quantity', 'description', 'main_image', 'sub_image', 'bidding_id')->orderBy('id', 'desc')->get();
            $listCategory = Category::select('id', 'name')->get();

//            if ($lists) {
//                foreach ($lists as $list) {
//                    $list->main_image = env('APP_URL') . $list->main_image;
//                }
//            }
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
            $listCategory = $this->categoryRepository->select(['id', 'name']);
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
            $mainImage = $request->file('mainImage');
            if ($mainImage) {
                $rawImage = $mainImage['raw'];
                $mainImageName = time() . '_' . $rawImage->getClientOriginalName();
                $mainImagePath = $rawImage->storeAs('product', $mainImageName, 'public');
                $mainImagePath = env('APP_URL') . '/storage/' . $mainImagePath;
            }

            // luu tru anh phu
            $jsonSubImages = null;
            $uploadedFiles = $request->file('subImage');
            if ($uploadedFiles) {
                $arraySubImages = [];
                foreach ($uploadedFiles as $image) {
                    $rawImage = $image['raw'];
                    $name = time() . '_' . $rawImage->getClientOriginalName();
                    $imagePath = $rawImage->storeAs('product', $name, 'public');
                    $imagePath = env('APP_URL') . '/storage/' . $imagePath;
                    $arraySubImages[] = $imagePath;
                }
                $jsonSubImages = json_encode($arraySubImages);
            }
            $insert = $this->productRepository->create([
                'admin_id' => 1,
                'name' => $all['name'],
                'price' => $all['price'],
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
            $listCategory = $this->categoryRepository->select(['id', 'name']);
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
    public function update($request, $id)
    {
        try {
            $product = $this->productRepository->find($id);

            if (!Storage::disk('public')->exists('product')) {
                Storage::disk('public')->makeDirectory('product');
            }
            $jsonSubImages = '';
            // luu tru anh chinh
            Log::info($request->mainImage);
            $mainImage = $request->mainImage;
            if (!empty($mainImage['raw'])) {
                if (Storage::disk('public')->exists(str_replace('/storage/', '', $product->main_image))) {
                    Storage::disk('public')->delete(str_replace('/storage/', '', $product->main_image));
                }
                $rawImage = $mainImage['raw'];
                $mainImageName = time() . '_' . $rawImage->getClientOriginalName();
                $mainImagePath = $rawImage->storeAs('product', $mainImageName, 'public');
                $mainImagePath = env('APP_URL') . '/storage/' . $mainImagePath;
            } else {
                $mainImagePath = $mainImage['url'];
            }

            // luu tru anh phu
            $uploadedFiles = $request->file('subImage');
            if ($uploadedFiles) {
                $arraySubImages = [];
                foreach ($uploadedFiles as $image) {
                    if (!empty($image['raw'])) {
                        $rawImage = $image['raw'];
                        $name = time() . '_' . $rawImage->getClientOriginalName();
                        $imagePath = $rawImage->storeAs('product', $name, 'public');
                        $imagePath = env('APP_URL') . '/storage/' . $imagePath;
                        $arraySubImages[] = $imagePath;
                    } else {
                        $arraySubImages[] = $image['url'];
                    }
                }
                $jsonSubImages = json_encode($arraySubImages);
            }

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
                'name' => $request->name,
                'price' => str_replace(',', '', $request->price),
                'description' => $request->description,
                'category_id' => $request->category,
//                'quantity' => $request->quantity,
                'main_image' => $mainImagePath,
                'sub_image' => isset($jsonSubImages) && $jsonSubImages ? $jsonSubImages : $product->sub_image,
            ], $id);
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
        } catch (\Exception $e) {
            Log::debug($e);
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
            return $this->productRepository->find($id);
        } catch (\Exception $e) {
            Log::info($e);
            return false;
        }
    }

    public function makeOffer($data)
    {
        $product = $this->productRepository->find($data['productId']);
        if ($product) {
            $user = User::query()->where('email', $data['emailOffer'])->first();
            if (empty($user)) {
                $user = User::create([
                    'email' => $data['emailOffer'],
                    'name' => $data['nameOffer'],
                ]);
            }

            $bidding = Bidding::query()->where('product_id', $data['productId'])->where('status', 1)->first();

            if (empty($bidding)) {
                return [
                    'success' => false,
                    'message' => 'Hiện tại sản phẩm chưa thiết lập đấu giá'
                ];
            }

            $startTimeBidding = Carbon::parse($bidding->start_time_bidding);
            $endTimeBidding = Carbon::parse($bidding->end_time_bidding);

            if (!Carbon::now()->between($startTimeBidding, $endTimeBidding)) {
                return [
                    'success' => false,
                    'message' => 'Thời gian đấu giá đã kết thúc'
                ];
            }

            if (intval($bidding->start_price) > intval($data['priceOffer'])) {
                return [
                    'success' => false,
                    'message' => 'Giá đấu giá nhỏ hơn giá khởi điểm'
                ];
            }

            BiddingUser::create([
                'user_id' => $user->id,
                'bidding_id' => $bidding->id,
                'product_id' => $data['productId'],
                'bidding_time' => Carbon::now()->format('Y-m-d H:i:s'),
                'bidding_price' => $data['priceOffer']
            ]);

            return [
                'success' => true,
            ];
        } else {
            Log::error('K có sản phẩm id: ' . $data['productId']);
            return [
                'success' => false,
                'message' => 'Có lỗi, hãy thử lại sau'
            ];
        }
    }
}
