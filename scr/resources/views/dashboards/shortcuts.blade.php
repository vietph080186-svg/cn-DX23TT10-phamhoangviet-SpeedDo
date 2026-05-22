@php
    $roleName = strtolower(Auth::user()->role?->name ?? '');

    $featureSets = [
        'admin' => [
            ['title' => 'Quản lý người dùng', 'description' => 'Thêm, sửa và theo dõi tài khoản trong hệ thống.', 'icon' => 'users', 'color' => 'blue', 'route' => route('admin.users.index')],
            ['title' => 'Quản lý phòng ban', 'description' => 'Tổ chức phòng ban và trạng thái hoạt động.', 'icon' => 'building', 'color' => 'indigo', 'route' => route('admin.departments.index')],
            ['title' => 'Quản lý dự án', 'description' => 'Theo dõi dự án, tiến độ và phạm vi công việc.', 'icon' => 'folder', 'color' => 'cyan', 'route' => route('projects.index')],
            ['title' => 'Quản lý công việc', 'description' => 'Tạo, phân công, lọc và cập nhật công việc.', 'icon' => 'tasks', 'color' => 'green', 'route' => route('tasks.index')],
            ['title' => 'Bảng Kanban', 'description' => 'Xem công việc theo từng trạng thái xử lý.', 'icon' => 'board', 'color' => 'orange', 'route' => route('kanban.index')],
            ['title' => 'Báo cáo thống kê', 'description' => 'Tổng hợp số liệu công việc, dự án và nhân viên.', 'icon' => 'chart', 'color' => 'amber', 'route' => route('reports.index')],
            ['title' => 'Thông báo hệ thống', 'description' => 'Kiểm tra thông báo giao việc và duyệt việc.', 'icon' => 'bell', 'color' => 'red', 'route' => route('notifications.index')],
            ['title' => 'Danh mục công việc', 'description' => 'Quản lý nhóm danh mục dùng khi tạo công việc.', 'icon' => 'category', 'color' => 'purple', 'route' => route('task-categories.index')],
        ],
        'manager' => [
            ['title' => 'Giao việc nhanh', 'description' => 'Tạo công việc mới và phân công cho nhân viên.', 'icon' => 'assign', 'color' => 'green', 'route' => route('tasks.create')],
            ['title' => 'Theo dõi tiến độ', 'description' => 'Kiểm tra trạng thái công việc đang phụ trách.', 'icon' => 'progress', 'color' => 'lime', 'route' => route('tasks.index')],
            ['title' => 'Bảng Kanban', 'description' => 'Quan sát luồng xử lý công việc theo cột.', 'icon' => 'board', 'color' => 'orange', 'route' => route('kanban.index')],
            ['title' => 'Duyệt công việc', 'description' => 'Xem các công việc đang chờ duyệt kết quả.', 'icon' => 'approval', 'color' => 'violet', 'route' => route('tasks.index', ['status' => 'review'])],
            ['title' => 'Báo cáo thống kê', 'description' => 'Xem báo cáo theo công việc và dự án liên quan.', 'icon' => 'chart', 'color' => 'amber', 'route' => route('reports.index')],
            ['title' => 'Thông báo công việc', 'description' => 'Theo dõi thông báo mới trong quá trình xử lý.', 'icon' => 'bell', 'color' => 'red', 'route' => route('notifications.index')],
        ],
        'staff' => [
            ['title' => 'Công việc của tôi', 'description' => 'Xem danh sách công việc được giao.', 'icon' => 'user-task', 'color' => 'teal', 'route' => route('my-tasks.index')],
            ['title' => 'Cập nhật tiến độ', 'description' => 'Chuyển trạng thái khi bắt đầu hoặc tiếp tục xử lý.', 'icon' => 'progress', 'color' => 'lime', 'route' => route('my-tasks.index')],
            ['title' => 'Gửi kết quả', 'description' => 'Gửi ghi chú kết quả để chờ quản lý duyệt.', 'icon' => 'send', 'color' => 'sky', 'route' => route('my-tasks.index')],
            ['title' => 'Bảng Kanban', 'description' => 'Theo dõi công việc cá nhân theo từng trạng thái.', 'icon' => 'board', 'color' => 'orange', 'route' => route('kanban.index')],
            ['title' => 'Thông báo', 'description' => 'Nhận thông tin giao việc, duyệt việc và bình luận.', 'icon' => 'bell', 'color' => 'red', 'route' => route('notifications.index')],
            ['title' => 'Báo cáo cá nhân', 'description' => 'Xem thống kê công việc của bản thân.', 'icon' => 'chart', 'color' => 'amber', 'route' => route('reports.index')],
        ],
    ];

    $features = $featureSets[$roleName] ?? $featureSets['staff'];
@endphp

<section class="feature-section">
    <div class="feature-header">
        <div>
            <h2>Chức năng chính</h2>
            <p>Các chức năng hỗ trợ quản lý, giao việc và theo dõi tiến độ công việc.</p>
        </div>
    </div>

    <div class="feature-grid">
        @foreach ($features as $feature)
            <a class="feature-card feature-card-{{ $feature['color'] }}" href="{{ $feature['route'] }}">
                <span class="feature-icon feature-icon-{{ $feature['color'] }}">
                    @include('shared.icon', ['name' => $feature['icon']])
                </span>
                <strong class="feature-title">{{ $feature['title'] }}</strong>
                <span class="feature-description">{{ $feature['description'] }}</span>
                <span class="feature-action">Mở chức năng</span>
            </a>
        @endforeach
    </div>
</section>
