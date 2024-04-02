<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function getData()
    {
        $dulieu = DanhMuc::select('id', 'ten_danh_muc', 'slug_danh_muc', 'tinh_trang', 'id_danh_muc_cha', 'hinh_anh')
            ->get();
        return response()->json([
            'data' => $dulieu
        ]);
    }
    public function store(Request $request)
    {
        // return response()->json($request->all());
        DanhMuc::create([
            // bảng                       bên frontend minh gửi
            "ten_danh_muc" => $request->ten_danh_muc,
            "slug_danh_muc" => $request->slug_danh_muc,
            "tinh_trang"    => $request->tinh_trang,
            "hinh_anh"    => $request->hinh_anh,
            "id_danh_muc_cha"    => $request->id_danh_muc_cha,
        ]);
        return response()->json([
            'message' => 'đã tạo mới danh mục thành công',
            'status' => true
        ]);
    }
    public function checkSlug(Request $request)
    {
        $data = DanhMuc::where('slug_danh_muc', $request->slug_danh_muc)
            ->first();
        if ($data) {
            return response()->json([
                'status' => true
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }

        // return response()->json($request->all());
    }

    public function checkSlugUpdate(Request $request)
    {
        $data = DanhMuc::where('slug_danh_muc', $request->slug_danh_muc)->where('id', '<>', $request->id)
            ->first();
        if ($data) {
            $data->update([
                "ten_danh_muc" => $request->ten_danh_muc,
                "slug_danh_muc" => $request->slug_danh_muc,
                "tinh_trang"    => $request->tinh_trang,
            ]);
            return response()->json([
                'status' => true
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }
        // return response()->json($request->all());
    }
    public function destroy($id)
    {
        $data = DanhMuc::where("id", $id)->first();
        if ($data) {
            $data->delete();
            return response()->json([
                "status" => true,
                "message" => "đã xóa danh mục thành công"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "không tìm được danh mục đã xóa"
            ]);
        }
    }
    public function update(Request $request)
    {
        $data = DanhMuc::where('id', $request->id)->first();
        if ($data) {
            $data->update([
                "ten_danh_muc"  => $request->ten_danh_muc,
                "slug_danh_muc" => $request->slug_danh_muc,
                "tinh_trang"    => $request->tinh_trang,
                "hinh_anh"    => $request->hinh_anh,
                "id_danh_muc_cha"    => $request->id_danh_muc_cha,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Đã cập nhật danh muc'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'khong tim thay danh muc de cap nhap'
            ]);
        };
    }
    public function changestatus(Request $request)
    {
        $data = DanhMuc::where('id', $request->id)->first();
        if ($data) {
            if ($data->tinh_trang == 0) {
                $data->tinh_trang = 1;
            } else {
                $data->tinh_trang = 0;
            }
            $data->save();
            return response()->json([
                'status' => true,
                'message' => 'đã đổi trạng thái danh mục ' . $data->ten_danh_muc . '!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'khong tim thay danh muc de cap nhap'
            ]);
        };
    }
}
