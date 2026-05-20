@csrf

<div class="form-group">
    <label for="name">Tên phòng ban</label>
    <input id="name" type="text" name="name" value="{{ old('name', $department->name ?? '') }}" required>
    @error('name')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="description">Mô tả</label>
    <textarea id="description" name="description">{{ old('description', $department->description ?? '') }}</textarea>
    @error('description')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="status">Trạng thái</label>
    <select id="status" name="status" required>
        <option value="active" @selected(old('status', $department->status ?? 'active') === 'active')>Đang hoạt động</option>
        <option value="inactive" @selected(old('status', $department->status ?? '') === 'inactive')>Ngừng hoạt động</option>
    </select>
    @error('status')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<button class="button" type="submit">Lưu</button>
<a class="button light" href="{{ route('admin.departments.index') }}">Quay lại</a>
