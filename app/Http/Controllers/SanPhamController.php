<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function getData()
    {
        $dulieu = SanPham::select("id", "ten_san_pham", "slug_san_pham", "hinh_anh", "gia_ban", "gia_khuyen_mai", "mo_ta", "id_danh_muc", "tinh_trang")
            ->get();
        return response()->json([
            "data" => $dulieu
        ]);
    }
    public function store(Request $request)
    {
        // return response()->json($request->all());
        SanPham::create([
            "ten_san_pham" => $request->ten_san_pham,
            "slug_san_pham" => $request->slug_san_pham,
            "hinh_anh" => $request->hinh_anh,
            "gia_ban" => $request->gia_ban,
            "gia_khuyen_mai" => $request->gia_khuyen_mai,
            "mo_ta" => $request->mo_ta,
            "id_danh_muc" => $request->id_danh_muc,
            "tinh_trang" => $request->tinh_trang
        ]);
        return response()->json([
            "message" => "Thêm sản phẩm thành công",
            "status" => true
        ]);
    }
    public function checkSlug(Request $request)
    {
        $data = SanPham::where("slug_san_pham", $request->slug_san_pham)
            ->first();
        if ($data) {
            return response()->json([
                "status" => true
            ]);
        } else {
            return response()->json([
                "status" => false
            ]);
        }
    }
    public function destroy($id)
    {
        $hello=2;
        $data = SanPham::where('id', $id);
        if ($data) {
            $data->delete();
            return response()->json([
                "status" => true,
                "message" => "đã xóa thành công sản phẩm"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "không thể xóa được"
            ]);
        }
    }
    public function update(Request $request)
    {
        // return response()->json($request->all());
        $data = SanPham::where("id", $request->id)->first();
        if ($data) {
            $data->update([
                "ten_san_pham" => $request->ten_san_pham,
                "slug_san_pham" => $request->slug_san_pham,
                "hinh_anh" => $request->hinh_anh,
                "gia_ban" => $request->gia_ban,
                "gia_khuyen_mai" => $request->gia_khuyen_mai,
                "mo_ta" => $request->mo_ta,
                "id_danh_muc" => $request->id_danh_muc,
                "tinh_trang" => $request->tinh_trang
            ]);
            return response()->json([
                "status" => true,
                "message" => "đã cập nhập thành công"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "không cập nhập thành công"
            ]);
        }
    }
    public function checkSlugUpdate(Request $request)
    {
        // return response()->json($request->all());
        $data = SanPham::where("slug_san_pham", $request->slug_san_pham)->where("id", "<>", $request->id)->first();
        if ($data) {
            return response()->json([
                "status" => true
            ]);
        } else {
            return response()->json([
                "status" => false
            ]);
        }
    }
    public function changeStatus(Request $request)
    {
        // return response()->json($request->all());
        $data = SanPham::where("id", $request->id)->first();
        if ($data) {
            $data->tinh_trang = $data->tinh_trang == 0 ? 1 : 0;
            $data->save();
            return response()->json([
                "status" => true,
                "message" => "đã thay đổi trạng thái" . $data->ten_san_pham . "thanh cong"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "không thay đổi trạng thái"
            ]);
        }
    }
}
