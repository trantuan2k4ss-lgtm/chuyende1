<div class="mb-3">
    <label>Tên</label>
    <input type="text" name="name" value="{{ $user->name ?? '' }}" class="form-control">
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" value="{{ $user->email ?? '' }}" class="form-control">
</div>

<div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control">
    @if(isset($user))
    <small>Để trống nếu không đổi mật khẩu</small>
    @endif
</div>

<div class="mb-3">
    <label>SĐT</label>
    <input type="text" name="phone" value="{{ $user->phone ?? '' }}" class="form-control">
</div>

<div class="mb-3">
    <label>Địa chỉ</label>
    <textarea name="address" class="form-control">{{ $user->address ?? '' }}</textarea>
</div>

<div class="mb-3">
    <label>Role</label>
    <select name="role" class="form-control">
        <option value="customer" {{ ($user->role ?? '')=='customer'?'selected':'' }}>Customer</option>
        <option value="admin" {{ ($user->role ?? '')=='admin'?'selected':'' }}>Admin</option>
    </select>
</div>