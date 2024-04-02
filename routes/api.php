<?php

use App\Http\Controllers\DaiLyController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\LoaiPhongController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\TaiKhoanController;
use App\Models\DanhMuc;
use App\Models\NhanVien;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/admin/danh-muc/data', [DanhMucController::class, "getData"]);
// http://127.0.0.1:8000/api/admin/danh-muc/data
Route::post('/admin/danh-muc/create', [DanhMucController::class, "store"]);
Route::post('/admin/danh-muc/check-slug', [DanhMucController::class, "checkSlug"]);
// http://127.0.0.1:8000/api/admin/danh-muc/create
Route::post('/admin/danh-muc/check-slug', [DanhMucController::class, "checkSlug"]);
// http://127.0.0.1:8000/api/admin/danh-muc/create
Route::post('/admin/danh-muc/check-slug-update', [DanhMucController::class, "checkSlugUpdate"]);
// http://127.0.0.1:8000/api/admin/danh-muc/check-slug-update
Route::delete('/admin/danh-muc/delete/{id}', [DanhMucController::class, "destroy"]);
// http://127.0.0.1:8000/api/admin/danh-muc/delete
Route::put('/admin/danh-muc/update', [DanhMucController::class, "update"]);
// http://127.0.0.1:8000/api/admin/danh-muc/update

Route::put('/admin/danh-muc/change-status', [DanhMucController::class, "changeStatus"]);
// http://127.0.0.1:8000/api/admin/danh-muc/change-status
Route::get('/admin/san-pham/data', [SanPhamController::class, "getData"]);
Route::post("admin/san-pham/create", [SanPhamController::class, "store"]);


Route::post("/admin/san-pham/check-slug", [SanPhamController::class, "checkSlug"]);
// http://127.0.0.1:8000/api/admin/san-pham/check-slug
Route::delete("/admin/san-pham/delete/{id}", [SanPhamController::class, "destroy"]);
// http://127.0.0.1:8000/api/admin/san-pham/delete/{id}
Route::put("/admin/san-pham/update", [SanPhamController::class, "update"]);
// / http://127.0.0.1:8000/api/admin/san-pham/update"
Route::post("/admin/san-pham/check-slug-update", [SanPhamController::class, "checkSlugUpdate"]);
// http://127.0.0.1:8000/api/admin/san-pham/check-slug-update"
// http://127.0.0.1:8000/api/admin/san-pham/create
Route::put("/admin/san-pham/change-status", [SanPhamController::class, "changeStatus"]);
Route::get("/admin/nhan-vien/data", [NhanVienController::class, "getData"]);

Route::post('/admin/nhan-vien/create', [NhanVienController::class, "store"]);
// http://127.0.0.1:8000/api/admin/nhan-vien/create
Route::post('/admin/nhan-vien/check', [NhanVienController::class, "check"]);
// http://127.0.0.1:8000/api/admin/nhan-vien/check


Route::delete('/admin/nhan-vien/delete/{id}', [NhanVienController::class, "destroy"]);
// http://127.0.0.1:8000//admin/nhan-vien/delete/{id}

Route::put("/admin/nhan-vien/update", [NhanVienController::class, "update"]);
// http://127.0.0.1:8000/api/admin/nhan-vien/update
Route::post("/admin/nhan-vien/check-email-update", [NhanVienController::class, "checkEmailUpdate"]);
// http://127.0.0.1:8000/api/admin/nhan-vien/check-email-update
Route::put("/admin/nhan-vien/change-status", [NhanVienController::class, "changeStatus"]);
// http://127.0.0.1:8000/api/admin/nhan-vien/change-status
Route::post("/admin/nhan-vien/dang-nhap", [NhanVienController::class, "dangNhap"]);
// http://127.0.0.1:8000/api/admin/nhan-vien/dang-nhap
Route::post("/admin/nhan-vien/chia-khoa", [NhanVienController::class, "chiaKhoa"]);
// http://127.0.0.1:8000/api/admin/nhan-vien/chia-khoa




//Room
Route::get("/van-phong/data", [LoaiPhongController::class, "getData"]);
// http://127.0.0.1:8000/api/van-phong/store
Route::post("/van-phong/store",[LoaiPhongController::class, "store"]);

Route::put("/van-phong/update", [LoaiPhongController::class, "update"]);
// http://127.0.0.1:8000/api/van-phong/update
Route::delete("/van-phong/delete/{id}", [LoaiPhongController::class, "destroy"]);

Route::post("/van-phong/check-slug", [LoaiPhongController::class, "checkSlug"]);

Route::post("/van-phong/check-slug-update",[LoaiPhongController::class, "checkSlugUpdate"]);

Route::post("/van-phong/change-status", [LoaiPhongController::class, "changeStatus"]);


Route::post("/tai-khoan/create",[TaiKhoanController::class,"store"]);
// http://127.0.0.1:8000/api/tai-khoan/create
Route::post("/tai-khoan/check-email",[TaiKhoanController::class,"checkEmail"]);
// http://127.0.0.1:8000/api/tai-khoan/check-email
Route::get("/tai-khoan/data",[TaiKhoanController::class,"getData"]);
// http://127.0.0.1:8000/api/tai-khoan/data
Route::put("/tai-khoan/update",[TaiKhoanController::class,"update"]);
// http://127.0.0.1:8000/api/tai-khoan/update
Route::delete("/tai-khoan/delete/{id}",[TaiKhoanController::class,"destroy"]);
// http://127.0.0.1:8000/api/tai-khoan/delete
Route::post("/tai-khoan/check-email-update",[TaiKhoanController::class,"checkEmailUpdate"]);
// http://127.0.0.1:8000/api/tai-khoan/check-email-update

Route::post('dai-ly/tao-tai-khoan',[DaiLyController::class, 'store']);
// http://127.0.0.1:8000/api/dai-ly/tao-tai-khoan
Route::get('dai-ly/data',[DaiLyController::class, 'getData']);
// http://127.0.0.1:8000/api/dai-ly/data
Route::post('dai-ly/change-status',[DaiLyController::class, 'changeStatus']);
// http://127.0.0.1:8000/api/dai-ly/change-status
Route::post("dai-ly/dang-nhap", [DaiLyController::class, "dangNhap"]);
// http://127.0.0.1:8000/api/dai-ly/dang-nhap
Route::post('dai-ly/kiem-tra-chia-khoa',[DaiLyController::class, 'kiemTraChiaKhoa']);
// http://127.0.0.1:8000/api/dai-ly/kiem-tra-chia-khoa

Route::get('product/data',[ProductController::class,'getData']);
// http://127.0.0.1:8000/api/product/data
Route::post('product/create',[ProductController::class,'store']);
// http://127.0.0.1:8000/api/product/create
Route::delete('product/delete/{id}',[ProductController::class,'destroy']);
//http://127.0.0.1:8000/api/product/delete/
Route::put('product/update',[ProductController::class,'update']);
//http://127.0.0.1:8000/api/product/update
Route::post('product/change-status',[ProductController::class,'changeStatus']);
//http://127.0.0.1:8000/api/product/change-status



