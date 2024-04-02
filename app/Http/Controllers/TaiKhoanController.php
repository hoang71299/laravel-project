<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Termwind\Components\Raw;

class TaiKhoanController extends Controller
{
    public function getData(){
        $data=TaiKhoan::select('id','ho_va_ten','email','so_dien_thoai','ngay_sinh','password','ten_doanh_nghiep','ma_so_thue','dia_chi_kinh_doanh')
            ->get();
        return response()->json([
            "data"=>$data
        ]);
    }
    public function store(Request $request){
        TaiKhoan::create([
            'ho_va_ten' => $request->ho_va_ten,
            'email'=> $request->email,
            'so_dien_thoai'=> $request->so_dien_thoai,
            'ngay_sinh'=> $request->ngay_sinh,
            'password'=> $request->password,
            'ten_doanh_nghiep'=> $request->ten_doanh_nghiep,
            'ma_so_thue'=> $request->ma_so_thue,
            'dia_chi_kinh_doanh'=> $request->dia_chi_kinh_doanh
        ]);
        return response()->json([
            "status"=> true,
            "message"=>"bạn đăng kí thành công"
        ]);
    }
    public function checkEmail(Request $request){
        $data=TaiKhoan::where("email", $request->email)->first();
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
    public function update(Request $request){
        $data=TaiKhoan::where("id",$request->id)->first();
        if($data){
            $data->update([
                'ho_va_ten' => $request->ho_va_ten,
                'email'=> $request->email,
                'so_dien_thoai'=> $request->so_dien_thoai,
                'ngay_sinh'=> $request->ngay_sinh,
                'password'=> $request->password,
                'ten_doanh_nghiep'=> $request->ten_doanh_nghiep,
                'ma_so_thue'=> $request->ma_so_thue,
                'dia_chi_kinh_doanh'=> $request->dia_chi_kinh_doanh
            ]);
            return response()->json([
                "status"=>true,
                "message"=>"sửa tài khoản thành công"
            ]);
        }else{
            return response()->json([
                "status"=>false,
                "message"=>"sửa tài khoản thất bại"
            ]);
        }
    }
    public function destroy($id){
        $data=TaiKhoan::where("id",$id)->first();
        if($data){
            $data->delete();
            return response()->json([
                "status"=>true,
                "message"=>"xóa tài khoản thành công"
            ]);
        }else{
            return response()->json([
                "status"=>false,
                "message"=>"không tìm thấy tài khoản để xóa"
            ]);
        }
    }

    public function checkEmailUpdate(Request $request)
    {
        $data = TaiKhoan::where("email",$request->email)
        ->where("id", "<>", $request->id)
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
}
