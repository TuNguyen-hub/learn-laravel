<!DOCTYPE html>
<html>
<head><title>Đăng ký tài khoản</title></head>
<body>
    <h2>Form Đăng Ký</h2>
    <form action="{{ route('auth.check') }}" method="POST">
        @csrf
        <div><label>Username:</label> <input type="text" name="username"></div>
        <div><label>Password:</label> <input type="password" name="password"></div>
        <div><label>Re-password:</label> <input type="password" name="repass"></div>
        <div><label>MSSV:</label> <input type="text" name="mssv"></div>
        <div><label>Lớp môn học:</label> <input type="text" name="lopmonhoc"></div>
        <div><label>Giới tính:</label> <input type="text" name="gioitinh"></div>
        <br>
        <button type="submit">Sign In</button>
    </form>
</body>
</html>