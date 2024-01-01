<?php 
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Connection;
use SebastianBergmann\Environment\Console;

try {
    // Kiểm tra kết nối cơ sở dữ liệu
    DB::connection()->getPdo();

    // Kiểm tra trạng thái kết nối
    if (DB::Connection()->getDatabaseName()) {
        echo 'Kết nối cơ sở dữ liệu thành công!';
    } else {
        echo 'Không thể kết nối đến cơ sở dữ liệu.';
    }
} catch (\Exception $e) {
    echo 'Lỗi kết nối cơ sở dữ liệu: ' . $e->getMessage();
}?>