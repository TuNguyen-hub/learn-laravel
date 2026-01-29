<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // 1. Hàm hiển thị form (SignIn)
    public function formSignIn() {
        return view('signin');
    }

    // 2. Hàm xử lý kiểm tra (CheckSignIn)
    public function checkSignIn(Request $request) {
        // Lấy dữ liệu từ form
        $user = $request->input('username');
        $pass = $request->input('password');
        $repass = $request->input('repass');
        $mssv = $request->input('mssv');
        $lop = $request->input('lopmonhoc');
        $gioitinh = $request->input('gioitinh');

        // Thông tin chuẩn của sinh viên 
        $myMssv = '4002967'; 
        $myLop = '67PM4';   

        // Logic kiểm tra:
        // 1. Mật khẩu phải trùng khớp với nhập lại
        if ($pass !== $repass) {
            return "Đăng ký thất bại (Mật khẩu không khớp)";
        }

        // 2. Kiểm tra thông tin sinh viên 
        if ($mssv == $myMssv && $lop == $myLop) {
            return "Đăng ký thành công!";
        } else {
            return "Đăng ký thất bại (Thông tin sai)";
        }
    }
}