<?php

namespace App\Http\Controllers;

use App\Http\Services\AffiliateService;
use App\Models\Affiliate;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{

    protected $affiliateService;

    public function __construct(AffiliateService $affiliateService)
    {
        $this->affiliateService = $affiliateService;
    }

    //danh sach
    public function list()
    {
        $result = $this->affiliateService->list();
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //form tao link lien ket
    public function create()
    {
        return view('affiliate.create');
    }
    //tao link lien ket
    public function insert(Request $request)
    {
        $result = $this->affiliateService->insert($request);
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //form sua link lien ket
    public function edit(Request $request)
    {
        $result = $this->affiliateService->getOne($request);
        // $one = $result['data'];
        // return view('affiliate.edit',compact('one'));
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //sua link lien ket
    public function update(Request $request)
    {
        $result = $this->affiliateService->update($request);
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //xoa link lien ket
    public function delete(Request $request)
    {
        $result = $this->affiliateService->delete($request);
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //thung rac
    public function trash() {
        $result = $this->affiliateService->trash();
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
}
