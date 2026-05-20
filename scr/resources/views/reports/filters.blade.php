<form class="panel" method="GET" action="{{ url()->current() }}" style="margin-bottom: 16px;">
    <div class="form-grid">
        <div class="form-group">
            <label for="from_date">Từ ngày</label>
            <input id="from_date" type="date" name="from_date" value="{{ request('from_date') }}">
        </div>
        <div class="form-group">
            <label for="to_date">Đến ngày</label>
            <input id="to_date" type="date" name="to_date" value="{{ request('to_date') }}">
        </div>
        <div class="form-group">
            <label for="project_id">Dự án</label>
            <select id="project_id" name="project_id">
                <option value="">Tất cả</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" @selected((string) request('project_id') === (string) $project->id)>{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="department_id">Phòng ban</label>
            <select id="department_id" name="department_id">
                <option value="">Tất cả</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" @selected((string) request('department_id') === (string) $department->id)>{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="assignee_id">Người được giao</label>
            <select id="assignee_id" name="assignee_id">
                <option value="">Tất cả</option>
                @foreach ($staffUsers as $staff)
                    <option value="{{ $staff->id }}" @selected((string) request('assignee_id') === (string) $staff->id)>{{ $staff->full_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select id="status" name="status">
                <option value="">Tất cả</option>
                @foreach ($statuses as $value => $label)
                    <option value="{{ $value }}" @selected(request('status') === $value)>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="priority">Ưu tiên</label>
            <select id="priority" name="priority">
                <option value="">Tất cả</option>
                @foreach ($priorities as $value => $label)
                    <option value="{{ $value }}" @selected(request('priority') === $value)>{{ $label }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <button class="button" type="submit">Lọc</button>
    <a class="button light" href="{{ url()->current() }}">Xóa lọc</a>
</form>
