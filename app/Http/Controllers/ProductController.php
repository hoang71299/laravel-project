<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getData()
    {
        $data = Product::select('id', 'ten_san_pham', 'hinh_anh', 'mo_ta', 'so_luong', 'gia_ban', 'gia_khuyen_mai', 'tinh_trang')
            ->get();
        return response()->json([
            "data" => $data
        ]);
    }
    public function store(Request $request)
    {
        Product::create([
            'ten_san_pham' => $request->ten_san_pham,
            'hinh_anh' => $request->hinh_anh,
            'mo_ta' => $request->mo_ta,
            'so_luong' => $request->so_luong,
            'gia_ban' => $request->gia_ban,
            'gia_khuyen_mai' => $request->gia_khuyen_mai,
            'tinh_trang' => $request->tinh_trang
        ]);
        return response()->json([
            "status" => true,
            "message" => "thêm sản phẩm thành công"
        ]);
    }
    public function destroy($id)
    {
        $data = Product::where("id", $id)->first();
        if ($data) {
            $data->delete();
            return response()->json([
                "status" => true,
                "message" => "Đã xóa sản phầm thành công"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Không thể xóa sản phầm được"
            ]);
        }
    }
    public function update(Request $request)
    {
        $data = Product::where("id", $request->id)->first();
        if ($data) {
            $data->update([
                'ten_san_pham' => $request->ten_san_pham,
                'hinh_anh' => $request->hinh_anh,
                'mo_ta' => $request->mo_ta,
                'so_luong' => $request->so_luong,
                'gia_ban' => $request->gia_ban,
                'gia_khuyen_mai' => $request->gia_khuyen_mai,
                'tinh_trang' => $request->tinh_trang
            ]);
            return response()->json([
                "status" => true,
                "message" => "Đã sửa sản phẩm thành công"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Sửa sản phẩm thất bại"
            ]);
        }
    }
    public function changeStatus(Request $request){
        $data=Product::where("id",$request->id)->first();
        if($data){
            $data->tinh_trang=$data->tinh_trang ==0 ? 1 :0;
            $data->save();
            return response()->json([
                "status"=>true,
                "message"=>"Đã thay đổi trảng thái"
            ]);
        }else{
            return response()->json([
                "status"=>false,
                "message"=>"Không thể thay đổi trảng thái"
            ]);
        }
    }
}
