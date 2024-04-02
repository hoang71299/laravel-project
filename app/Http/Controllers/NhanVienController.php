<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NhanVienController extends Controller
{
    public function getData()
    {
        //sellect
        $dulieu = NhanVien::select("id", "ho_va_ten", "email", "password", "so_dien_thoai", "dia_chi", "tinh_trang")
            ->get();
        return response()->json([
            "data" => $dulieu
        ]);
    }
    public function store(Request $request)
    {
        //post
        // return response()->json($request->all());
        NhanVien::create([
            "ho_va_ten" => $request->ho_va_ten,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "so_dien_thoai" => $request->so_dien_thoai,
            "dia_chi" => $request->dia_chi,
            "tinh_trang" => $request->tinh_trang,
        ]);
        return response()->json([
            "message" => "thêm nhân viên thành công",
            "status" => true
        ]);
    }
    public function check(Request $request)
    {
        // return response()->json($request->all());
        $data = NhanVien::where("email", $request->email)->first();
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
        $data = NhanVien::where("id", $id)->first();
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
        $data = NhanVien::where("id", $request->id)->first();
        if ($data) {
            $data->update([
                "ho_va_ten" => $request->ho_va_ten,
                "email" => $request->email,
                "password" => $request->password,
                "so_dien_thoai" => $request->so_dien_thoai,
                "dia_chi" => $request->dia_chi,
                "tinh_trang" => $request->tinh_trang,
            ]);
            return response()->json([
                "status" => true,
                "message" => "đã cập nhập thành công"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "không cập nhập được"
            ]);
        }
    }
    public function checkEmailUpdate(Request $request)
    {
        $data = NhanVien::where("email", $request->email)->where("email", "<>", $request->id)->first();
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
        $data = NhanVien::where('id', $request->id)->first();
        if ($data) {
            $data->tinh_trang = $data->tinh_trang == 0 ? 1 :  0;
            $data->save();
            return response()->json([
                "status" => true,
                "message" => "đã thay đổi trạng thái của" . $data->ho_va_ten . "!"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "khong tim thay danh muc de cap nhap"
            ]);
        }
    }

    public function dangNhap(Request $request){
        $check = Auth::guard('nhan_vien')->attempt(['email'=>$request ->email,'password'=>$request->password]);
        if($check){
            $user=Auth::guard('nhan_vien')->user();
            if($user-> tinh_trang ==0){
                return response()->json([
                    "status"=>2,
                    "message"=>"tài khoản của bạn chưa kích hoạt"
                ]);
            }else{
                return response()->json([
                    "status"=>1,
                    "message"=>"tài khoản của bạn đăng nhập thành công",
                    "chia_khoa"=>$user->createToken('ma_so_bi_mat')->plainTextToken
                ]);
            }
        }else{
            return response()->json([
                "status"=>2,
                "message"=>"tài khoản của bạn không đúng"
            ]);
        }
    }
    public function chiaKhoa(Request $request){
        $check = Auth::guard('sanctum')->user();
        if($check){
            return response()->json([
                "message"=>"bạn có thể qua ",
                "status"=>true
            ]);
        }else{
            return response()->json([
                "message"=>"bạn chưa đăng nhập nhan viên",
                "status"=>false
            ]);
        }
    }





}
