<?php

namespace App\Http\Controllers;

use App\Models\DaiLy;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaiLyController extends Controller
{
    public function store(Request $request){
        // return response()->json($request->all());
        DaiLy::create([
        'ho_va_ten' => $request->ho_va_ten,
        'email' => $request->email,
        'so_dien_thoai'=>$request->so_dien_thoai,
        'ngay_sinh'=>$request->ngay_sinh,
        'password'=> bcrypt($request->password),
        'ten_doanh_nghiep'=>$request-> ten_doanh_nghiep,
        'ma_so_thue'=> $request-> ma_so_thue,
        'dia_chi_kinh_doanh'=>$request->dia_chi_kinh_doanh,
        ]);
        return response()->json([
            "status"=>true,
            "message"=>"Đại lý đã được tạo thành công"
        ]);
    }
    public function getData(){
        $data=DaiLy::select("id", 'ho_va_ten','email','so_dien_thoai','ngay_sinh','password','ten_doanh_nghiep','ma_so_thue','dia_chi_kinh_doanh','is_active')
            ->get();
        return response()->json([
            "data"=>$data
        ]);
    }
    public function changeStatus(Request $request){
        $data = DaiLy::where('id', $request->id)->first();
        if ($data) {
            if ($data->is_active == 0) {
                $data->is_active = 1;
            } else {
                $data->is_active = 0;
            }
            $data->save();
            return response()->json([
                'status' => true,
                'message' => 'đã đổi trạng thái  ' . $data->ho_va_ten . '!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'khong tim thay danh muc de cap nhap'
            ]);
        };
    }
    public function dangNhap(Request $request){
        $check=Auth::guard('dai_ly')->attempt(['email'=>$request->email,'password'=>$request->password]);
        if($check){
            $user=Auth::guard('dai_ly')->user();
            if($user->is_active == 0){
                return response()->json([
                    "message"=>'Tài khoản của bạn chưa được xác nhận',
                    'status'=> 2
                ]);
            }else{
                return response()->json([
                    "message"=>'Đã đăng nhập thành công!',
                    'status'=> 1,
                    'chia_khoa'=>$user->createToken('ma_so_bi_mat')->plainTextToken
                ]);
            }
        }else{
            return response()->json([
                "message"=>'Tài khoản hoặc mật khẩu không đúng!',
                'status'=> false
            ]);
        }
    }
    public function kiemTraChiaKhoa(Request $request){
        $check = Auth::guard('sanctum')->user();
        if($check){
            return response()->json([
                "status"=>true,
                "message"=>"Ok, bạn có thể di qua!",
            ]);
        }else{
            return response()->json([
                "status"=>false,
                "message"=>"bạn chưa đăng nhập đại lý!",
            ]);
        }
    }
}
