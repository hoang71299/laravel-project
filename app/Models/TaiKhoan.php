<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    use HasFactory;
    protected $table="tai_khoans";
    protected $fillable=[
        'ho_va_ten',
        'email',
        'so_dien_thoai',
        'ngay_sinh',
        'password',
        'ten_doanh_nghiep',
        'ma_so_thue',
        'dia_chi_kinh_doanh'
    ];
}
