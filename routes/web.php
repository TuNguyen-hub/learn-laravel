<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// 1. Trang chủ ("/")
Route::get('/', function () {
    return view('home');
})->name('home');

// Gom nhóm "/product"
Route::prefix('product')->group(function () {
    
    // 2. Trang danh sách sản phẩm ("/product")
    Route::get('/', function () {
        return view('product.index');
    })->name('product.index');

    // 3. Trang thêm mới ("/product/add")
    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');

    // 4. Trang chi tiết với ID ("/product/{id}")
    // id kiểu chuỗi, mặc định là '123' -> ta dùng tham số tùy chọn {id?}
    Route::get('/{id?}', function ($id = '123') {
        return "Chi tiết sản phẩm có ID là: " . $id;
    })->name('product.show');
});

// 5. Route sinh viên với tham số mặc định
Route::get('/sinhvien/{name?}/{mssv?}', function ($name = 'Nguyen Anh Tu', $mssv = '4002967') {
    return "Thông tin sinh viên: <br> Tên: $name <br> MSSV: $mssv";
});

// 6. Route bàn cờ vua ("/banco/{n}")
Route::get('/banco/{n}', function ($n) {
    return view('banco', ['n' => $n]);
});

// 7. Xử lý lỗi 404 (Khi không tìm thấy route)
Route::fallback(function () {
    return view('error.404');
});
// 8. Routes cho đăng ký (SignIn)
use App\Http\Controllers\AuthController;

Route::get('/signin', [AuthController::class, 'formSignIn'])->name('auth.form');
Route::post('/signin', [AuthController::class, 'checkSignIn'])->name('auth.check');
// 9. Route có middleware kiểm tra tuổi
// 9.1 Route hiển thị form nhập tuổi
Route::get('/input-age', function () {
    return view('input_age');
});

// 9.2 Route xử lý lưu tuổi vào Session
Route::post('/save-age', function (Illuminate\Http\Request $request) {
    // Lưu tuổi vào session với key là 'user_age'
    session(['user_age' => $request->input('age')]);
    return redirect('/admin-page'); // Chuyển hướng đến trang cần bảo vệ
})->name('save.age');

// 9.3 Route cần bảo vệ (Áp dụng middleware check.age)
Route::get('/admin-page', function () {
    return "Chào mừng! Bạn đã đủ 18 tuổi để xem trang này.";
})->middleware('check.age');