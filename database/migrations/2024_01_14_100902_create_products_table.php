<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ten_san_pham');
            $table->string('hinh_anh');
            $table->string('mo_ta');
            $table->integer('so_luong');
            $table->integer('gia_ban');
            $table->integer('gia_khuyen_mai');
            $table->integer('tinh_trang')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
