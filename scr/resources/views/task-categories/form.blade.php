@csrf

<div class="form-grid">
    <div class="form-group">
        <label for="name">Tên danh mục</label>
        <input id="name" type="text" name="name" value="{{ old('name', $taskCategory->name ?? '') }}" required>
        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="color">Màu hiển thị</label>
        <input id="color" type="color" name="color" value="{{ old('color', $taskCategory->color ?? '#2563eb') }}">
        @error('color')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select id="status" name="status" required>
            <option value="active" @selected(old('status', $taskCategory->status ?? 'active') === 'active')>Đang hoạt động</option>
            <option value="inactive" @selected(old('status', $taskCategory->status ?? '') === 'inactive')>Ngừng hoạt động</option>
        </select>
        @error('status')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="description">Mô tả</label>
    <textarea id="description" name="description">{{ old('description', $taskCategory->description ?? '') }}</textarea>
    @error('description')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<button class="button" type="submit">Lưu</button>
<a class="button light" href="{{ route('task-categories.index') }}">Quay lại</a>
