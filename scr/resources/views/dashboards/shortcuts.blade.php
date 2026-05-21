@php
    $roleName = strtolower(Auth::user()->role?->name ?? '');
    $canManageWork = in_array($roleName, ['admin', 'manager'], true);
    $shortcuts = [
        [
            'title' => 'Giao việc nhanh',
            'description' => $canManageWork ? 'Tạo và phân công công việc mới.' : 'Xem danh sách công việc được giao.',
            'icon' => 'tasks',
            'route' => $canManageWork ? route('tasks.create') : route('my-tasks.index'),
        ],
        [
            'title' => 'Theo dõi tiến độ',
            'description' => 'Xem trạng thái công việc trên Kanban.',
            'icon' => 'board',
            'route' => route('kanban.index'),
        ],
        [
            'title' => 'Nhắc việc đến hạn',
            'description' => 'Kiểm tra công việc cần xử lý sớm.',
            'icon' => 'clock',
            'route' => route('my-tasks.index'),
        ],
        [
            'title' => 'Bình luận trao đổi',
            'description' => 'Trao đổi trực tiếp trong chi tiết công việc.',
            'icon' => 'comment',
            'route' => route('my-tasks.index'),
        ],
        [
            'title' => 'Báo cáo thống kê',
            'description' => 'Xem số liệu tổng hợp theo công việc.',
            'icon' => 'chart',
            'route' => route('reports.index'),
        ],
    ];

    if ($canManageWork) {
        $shortcuts[] = [
            'title' => 'Quản lý dự án',
            'description' => 'Theo dõi dự án và phạm vi công việc.',
            'icon' => 'folder',
            'route' => route('projects.index'),
        ];
    }
@endphp

<section class="shortcut-section">
    <div class="section-header">
        <h2>Chức năng nhanh</h2>
    </div>

    <div class="shortcut-grid">
        @foreach ($shortcuts as $shortcut)
            <a class="shortcut-card" href="{{ $shortcut['route'] }}">
                <span class="shortcut-icon">
                    @include('shared.icon', ['name' => $shortcut['icon']])
                </span>
                <span>
                    <strong>{{ $shortcut['title'] }}</strong>
                    <small>{{ $shortcut['description'] }}</small>
                </span>
            </a>
        @endforeach
    </div>
</section>
