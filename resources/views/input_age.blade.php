<form action="{{ route('save.age') }}" method="POST">
    @csrf
    <label>Nhập tuổi của bạn:</label>
    <input type="number" name="age">
    <button type="submit">Xác nhận</button>
</form>