@csrf

<div class="form-grid">
    <div class="form-group">
        <label for="full_name">Họ tên</label>
        <input id="full_name" type="text" name="full_name" value="{{ old('full_name', $user->full_name ?? '') }}" required>
        @error('full_name')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email', $user->email ?? '') }}" required>
        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="phone">Số điện thoại</label>
        <input id="phone" type="text" name="phone" value="{{ old('phone', $user->phone ?? '') }}">
        @error('phone')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input id="password" type="password" name="password" @if (! isset($user)) required @endif>
        @error('password')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="role_id">Vai trò</label>
        <select id="role_id" name="role_id" required>
            <option value="">Chọn vai trò</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" @selected((string) old('role_id', $user->role_id ?? '') === (string) $role->id)>{{ $role->name }}</option>
            @endforeach
        </select>
        @error('role_id')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="department_id">Phòng ban</label>
        <select id="department_id" name="department_id" required>
            <option value="">Chọn phòng ban</option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}" @selected((string) old('department_id', $user->department_id ?? '') === (string) $department->id)>{{ $department->name }}</option>
            @endforeach
        </select>
        @error('department_id')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select id="status" name="status" required>
            <option value="active" @selected(old('status', $user->status ?? 'active') === 'active')>Đang hoạt động</option>
            <option value="inactive" @selected(old('status', $user->status ?? '') === 'inactive')>Ngừng hoạt động</option>
        </select>
        @error('status')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>
</div>

<button class="button" type="submit">Lưu</button>
<a class="button light" href="{{ route('admin.users.index') }}">Quay lại</a>
