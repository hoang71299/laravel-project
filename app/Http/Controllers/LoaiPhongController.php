<?php

namespace App\Http\Controllers;

use App\Models\LoaiPhong;
use Illuminate\Http\Request;

class LoaiPhongController extends Controller
{
    public function getData(){
        $data=LoaiPhong::select("id","ten_loai_phong","slug_loai_phong","don_gia","loai_giuong","so_nguoi","tinh_trang")
        ->get();
        return response()->json([
            "data" => $data
        ]);
    }
    public function store(Request $request){
        LoaiPhong::create([
            "ten_loai_phong" => $request->ten_loai_phong,
            "slug_loai_phong" => $request->slug_loai_phong,
            "don_gia" => $request->don_gia,
            "loai_giuong" => $request->loai_giuong,
            "so_nguoi" => $request->so_nguoi,
            "tinh_trang" => $request->tinh_trang
        ]);
        return response()->json([
            "message" => "thêm loại phòng thành công",
            "status" => true
        ]);
    }
    public function update(Request $request){
        $data=LoaiPhong::where("id",$request->id)->first();
        if($data){
            $data->update([
                "ten_loai_phong" => $request->ten_loai_phong,
                "slug_loai_phong" => $request->slug_loai_phong,
                "don_gia" => $request->don_gia,
                "loai_giuong" => $request->loai_giuong,
                "so_nguoi" => $request->so_nguoi,
                "tinh_trang" => $request->tinh_trang
            ]);
            return response()->json([
                "status"=>true,
                "message"=>"cập nhật loại phòng thành công"
            ]);
        }else{
            return response()->json([
                "status"=>false,
                "message"=>"cập nhật loại phòng thất bại"
            ]);
        }
    }
    public function destroy($id){
        $data=LoaiPhong::where("id",$id)->first();
        if($data){
            $data->delete();
            return response()->json([
                "status"=>true,
                "message"=>"xóa loại phòng thành công"
            ]);
        }else{
            return response()->json([
                "status"=>false,
                "message"=>"xóa loại phòng thất bại"
            ]);
        }
    }
    public function checkSlug(Request $request){
        $data=LoaiPhong::where("slug_loai_phong",$request->slug_loai_phong)->first();
        if($data){
            return response()->json([
                "status"=>true
            ]);
        }else{
            return response()->json([
                "status"=>false
            ]);
        }
    }
    public function checkSlugUpdate(Request $request){
        $data=LoaiPhong::where("slug_loai_phong",$request->slug_loai_phong)->where("id","<>",$request->id)->first();
        if($data){
            return response()->json([
                "status"=>true
            ]);
        }else{
            return response()->json([
                "status"=>false
            ]);
        }
    }
    public function changeStatus(Request $request){
        $data=LoaiPhong::where("id",$request->id)
            ->first();
        if($data){
            $data->tinh_trang=$data->tinh_trang==0?1:0;
            $data->save();
            return response()->json([
                "status"=>true,
                "message"=>"thay đổi trạng thái thành công",
            ]);
        }else{
            return response()->json([
                "status"=>false,
                "message"=>"thay đổi trạng thái thất bại",
            ]);
        }
    }
}
