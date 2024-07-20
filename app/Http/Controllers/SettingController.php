<?php

namespace App\Http\Controllers;

use App\Http\Services\SettingService;
use App\Models\Setting;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }
    //danh sach
    public function list()
    {
        $result = $this->settingService->list();
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //form tao cai dat
    public function create()
    {
        return view('setting.create');
    }
    //tao cai dat
    public function insert(Request $request)
    {
        $result = $this->settingService->insert($request);
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //form sua cai dat
    public function edit(Request $request)
    {
        $result = $this->settingService->getOne($request);
        // $one = $result['data'];
        // return view('setting.edit',compact('one'));
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //sua cai dat
    public function update(Request $request)
    {
        $result = $this->settingService->update($request);
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //xoa cai dat
    public function delete(Request $request)
    {
        $result = $this->settingService->delete($request);
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
    //thung rac
    public function trash() {
        $result = $this->settingService->trash();
        if ($result['status'] == 'success') {
            return response()->json($result, 200);
        } else {
            return response()->json($result, 500);
        }
    }
}
