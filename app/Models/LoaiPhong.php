<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiPhong extends Model
{
    use HasFactory;
    protected $table = "loai_phongs";
    protected $fillable = [
        "ten_loai_phong",
        "slug_loai_phong",
        "don_gia",
        "loai_giuong",
        "so_nguoi",
        "tinh_trang",
    ];
}
