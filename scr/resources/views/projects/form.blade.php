@csrf

<div class="form-grid">
    <div class="form-group">
        <label for="name">Tên dự án</label>
        <input id="name" type="text" name="name" value="{{ old('name', $project->name ?? '') }}" required>
        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select id="status" name="status" required>
            <option value="planning" @selected(old('status', $project->status ?? 'planning') === 'planning')>Lên kế hoạch</option>
            <option value="active" @selected(old('status', $project->status ?? '') === 'active')>Đang thực hiện</option>
            <option value="paused" @selected(old('status', $project->status ?? '') === 'paused')>Tạm dừng</option>
            <option value="completed" @selected(old('status', $project->status ?? '') === 'completed')>Hoàn thành</option>
            <option value="cancelled" @selected(old('status', $project->status ?? '') === 'cancelled')>Đã hủy</option>
        </select>
        @error('status')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="start_date">Ngày bắt đầu</label>
        <input id="start_date" type="date" name="start_date" value="{{ old('start_date', isset($project) && $project->start_date ? $project->start_date->format('Y-m-d') : '') }}">
        @error('start_date')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="end_date">Ngày kết thúc</label>
        <input id="end_date" type="date" name="end_date" value="{{ old('end_date', isset($project) && $project->end_date ? $project->end_date->format('Y-m-d') : '') }}">
        @error('end_date')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="description">Mô tả</label>
    <textarea id="description" name="description">{{ old('description', $project->description ?? '') }}</textarea>
    @error('description')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<button class="button" type="submit">Lưu</button>
<a class="button light" href="{{ route('projects.index') }}">Quay lại</a>
