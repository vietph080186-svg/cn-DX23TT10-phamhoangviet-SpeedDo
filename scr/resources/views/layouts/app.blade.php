<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hệ thống quản lý giao việc')</title>
    <style>
        :root {
            --blue-950: #071d49;
            --blue-900: #0b2f76;
            --blue-800: #1246a8;
            --blue-700: #1d4ed8;
            --blue-600: #2563eb;
            --blue-500: #3b82f6;
            --blue-100: #dbeafe;
            --blue-50: #eff6ff;
            --gray-900: #111827;
            --gray-700: #374151;
            --gray-600: #4b5563;
            --gray-500: #6b7280;
            --gray-200: #e5e7eb;
            --gray-100: #f4f8ff;
            --white: #ffffff;
            --shadow: 0 16px 36px rgba(7, 29, 73, 0.09);
            --shadow-strong: 0 20px 45px rgba(7, 29, 73, 0.16);
        }

        * { box-sizing: border-box; }
        body { margin: 0; background: var(--gray-100); color: var(--gray-900); font-family: Arial, sans-serif; }
        a { color: inherit; text-decoration: none; }
        .app-shell { display: grid; grid-template-columns: 280px minmax(0, 1fr); min-height: 100vh; }
        .sidebar { position: sticky; top: 0; height: 100vh; overflow-y: auto; background: radial-gradient(circle at top left, #1d4ed8 0, transparent 34%), linear-gradient(180deg, var(--blue-950), var(--blue-900) 58%, #061638); color: var(--white); padding: 24px 18px; box-shadow: 18px 0 45px rgba(7, 29, 73, 0.18); }
        .sidebar-brand { display: block; padding: 14px 14px 22px; border: 1px solid rgba(255,255,255,0.13); border-radius: 14px; background: rgba(255,255,255,0.08); box-shadow: inset 0 1px 0 rgba(255,255,255,0.12); }
        .sidebar-brand strong { display: block; font-size: 19px; line-height: 1.35; letter-spacing: .01em; }
        .sidebar-brand span { display: inline-flex; margin-top: 10px; min-height: 26px; align-items: center; padding: 0 10px; border-radius: 999px; background: rgba(219,234,254,0.16); color: #dbeafe; font-size: 13px; font-weight: 800; }
        .sidebar-section { margin-top: 24px; padding-top: 4px; }
        .sidebar-heading { margin: 0 12px 10px; color: #93c5fd; font-size: 11px; font-weight: 900; letter-spacing: .08em; text-transform: uppercase; }
        .sidebar-link { position: relative; display: flex; align-items: center; justify-content: space-between; gap: 10px; margin: 6px 0; padding: 12px 14px 12px 18px; border: 1px solid transparent; border-radius: 11px; color: #dbeafe; font-size: 15px; font-weight: 800; line-height: 1.25; transition: background .15s ease, color .15s ease, border-color .15s ease, transform .15s ease; }
        .sidebar-link::before { content: ""; position: absolute; left: 8px; top: 50%; width: 4px; height: 0; border-radius: 999px; background: var(--white); transform: translateY(-50%); transition: height .15s ease; }
        .sidebar-link:hover { background: rgba(255,255,255,0.12); border-color: rgba(255,255,255,0.12); color: var(--white); transform: translateX(2px); }
        .sidebar-link.active { background: linear-gradient(90deg, var(--blue-500), var(--blue-700)); border-color: rgba(255,255,255,0.24); color: var(--white); box-shadow: 0 16px 30px rgba(37, 99, 235, 0.38); }
        .sidebar-link.active::before { height: 24px; }
        .content-shell { min-width: 0; }
        .topbar { position: sticky; top: 0; z-index: 10; display: flex; align-items: center; justify-content: space-between; gap: 16px; min-height: 76px; padding: 16px 32px; background: rgba(255,255,255,0.96); border-bottom: 1px solid #dbe5f4; backdrop-filter: blur(12px); box-shadow: 0 8px 24px rgba(7, 29, 73, 0.04); }
        .topbar-title { margin: 0; color: var(--blue-950); font-size: 21px; font-weight: 900; letter-spacing: .01em; }
        .topbar-subtitle { margin: 5px 0 0; color: var(--gray-500); font-size: 13px; font-weight: 700; }
        .topbar-actions, .user-box, .actions { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
        .user-box { justify-content: flex-end; }
        .user-name { font-weight: 800; color: var(--gray-900); }
        .role-badge { display: inline-flex; align-items: center; min-height: 26px; padding: 0 10px; border-radius: 999px; background: var(--blue-50); color: var(--blue-700); font-size: 13px; font-weight: 800; }
        .container { width: min(100% - 48px, 1180px); margin: 32px auto; }
        .page-header { display: flex; align-items: center; justify-content: space-between; gap: 16px; margin-bottom: 20px; }
        .page-title { margin: 0; color: var(--gray-900); font-size: 30px; font-weight: 900; letter-spacing: .01em; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)); gap: 20px; }
        .card, .panel { background: var(--white); border: 1px solid #dbe5f4; border-radius: 14px; padding: 24px; box-shadow: var(--shadow); }
        .card { position: relative; overflow: hidden; min-height: 138px; border-top: 0; }
        .card::before { content: ""; position: absolute; inset: 0 0 auto 0; height: 5px; background: linear-gradient(90deg, var(--blue-500), var(--blue-800)); }
        .card::after { content: ""; position: absolute; right: -26px; top: -32px; width: 96px; height: 96px; border-radius: 50%; background: var(--blue-50); }
        .card-title { position: relative; z-index: 1; margin: 0 0 18px; color: var(--gray-600); font-size: 14px; font-weight: 900; text-transform: uppercase; letter-spacing: .04em; }
        .card-number { position: relative; z-index: 1; margin: 0; color: var(--blue-800); font-size: 42px; font-weight: 900; line-height: .95; }
        .login-page { display: grid; min-height: 100vh; place-items: center; padding: 24px; background: var(--gray-100); }
        .login-box { width: min(100%, 420px); background: var(--white); border: 1px solid var(--gray-200); border-radius: 10px; padding: 28px; box-shadow: var(--shadow); }
        .form-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px; }
        .form-group { margin-bottom: 16px; }
        label { display: block; margin-bottom: 6px; color: var(--gray-700); font-weight: 700; }
        input[type="text"], input[type="email"], input[type="password"], input[type="date"], input[type="color"], input[type="url"], select, textarea { width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 15px; background: var(--white); }
        input:focus, select:focus, textarea:focus { outline: 3px solid var(--blue-100); border-color: var(--blue-600); }
        input[type="color"] { height: 42px; padding: 4px; }
        textarea { min-height: 90px; resize: vertical; }
        table { width: 100%; border-collapse: collapse; background: var(--white); border: 1px solid var(--gray-200); border-radius: 10px; overflow: hidden; box-shadow: var(--shadow); }
        th, td { padding: 13px; border-bottom: 1px solid var(--gray-200); text-align: left; vertical-align: top; }
        th { background: var(--blue-50); color: var(--blue-950); font-size: 14px; }
        .button { display: inline-flex; align-items: center; justify-content: center; min-height: 40px; padding: 0 16px; border: 0; border-radius: 9px; background: var(--blue-600); color: var(--white); font-weight: 800; cursor: pointer; box-shadow: 0 10px 22px rgba(37, 99, 235, 0.22); }
        .button:hover { background: var(--blue-700); }
        .button.secondary { background: var(--blue-900); }
        .button.danger { background: #dc2626; }
        .button.light { background: var(--blue-50); color: var(--blue-800); box-shadow: none; border: 1px solid var(--blue-100); }
        .alert { margin-bottom: 16px; padding: 12px 14px; border-radius: 8px; }
        .alert.success { background: #dcfce7; color: #166534; }
        .alert.error, .error { color: #dc2626; }
        .alert.error { background: #fee2e2; }
        .error { margin: 6px 0 0; font-size: 14px; }
        .pagination { margin-top: 16px; }
        .checkbox-row { display: flex; align-items: center; gap: 8px; margin-bottom: 18px; }
        .kanban-board { display: grid; grid-template-columns: repeat(6, minmax(240px, 1fr)); gap: 16px; overflow-x: auto; padding-bottom: 12px; }
        .kanban-column { min-width: 240px; background: #eef5ff; border: 1px solid #dbeafe; border-radius: 10px; padding: 12px; }
        .kanban-title { margin: 0 0 12px; color: var(--blue-950); font-size: 16px; }
        .kanban-card { background: var(--white); border: 1px solid var(--gray-200); border-radius: 10px; padding: 12px; margin-bottom: 12px; box-shadow: 0 8px 18px rgba(15, 42, 95, 0.06); }
        .kanban-card.overdue { border-color: #fb7185; background: #fff1f2; }
        .muted { color: var(--gray-500); font-size: 14px; }
        .progress { width: 100%; height: 12px; background: #e2e8f0; border-radius: 999px; overflow: hidden; }
        .progress-bar { height: 100%; background: var(--blue-600); }
        .report-nav { display: flex; gap: 10px; flex-wrap: wrap; margin: 16px 0; }
        .badge { display: inline-flex; align-items: center; justify-content: center; min-width: 20px; height: 20px; padding: 0 6px; border-radius: 999px; background: #dc2626; color: var(--white); font-size: 12px; font-weight: 800; }
        body:not(.has-active-overlay).modal-open,
        body:not(.has-active-overlay).loading,
        body:not(.has-active-overlay).disabled {
            overflow: auto !important;
            padding-right: 0 !important;
            pointer-events: auto !important;
        }
        body:not(.has-active-overlay) .modal-backdrop,
        body:not(.has-active-overlay) .backdrop,
        body:not(.has-active-overlay) .loading-overlay,
        body:not(.has-active-overlay) .page-overlay {
            display: none !important;
            pointer-events: none !important;
        }

        @media (max-width: 900px) {
            .app-shell { display: block; }
            .sidebar { position: static; height: auto; padding: 16px; }
            .sidebar-brand { padding-bottom: 14px; }
            .sidebar-section { margin-top: 14px; }
            .sidebar-nav { display: grid; gap: 12px; }
            .topbar { position: static; align-items: flex-start; flex-direction: column; padding: 16px 20px; }
            .container { width: min(100% - 28px, 1160px); margin: 20px auto; }
            .kanban-board { display: block; overflow-x: visible; }
            .kanban-column { margin-bottom: 16px; }
        }
    </style>
</head>
<body>
    @auth
        @php
            $roleName = strtolower(Auth::user()->role?->name ?? '');
            $roleLabel = Auth::user()->role?->name ?? 'Người dùng';
            $unreadNotifications = \App\Models\Notification::where('user_id', Auth::id())->where('is_read', false)->count();
        @endphp

        <div class="app-shell">
            <aside class="sidebar">
                <a class="sidebar-brand" href="{{ route('dashboard') }}">
                    <strong>Hệ thống quản lý giao việc</strong>
                    <span>{{ $roleLabel }}</span>
                </a>

                <nav class="sidebar-nav" aria-label="Điều hướng chính">
                    <section class="sidebar-section">
                        <h2 class="sidebar-heading">Tổng quan</h2>
                        <a class="sidebar-link {{ request()->routeIs('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">Bảng điều khiển</a>
                        <a class="sidebar-link {{ request()->routeIs('notifications.*') ? 'active' : '' }}" href="{{ route('notifications.index') }}">
                            <span>Thông báo</span>
                            @if ($unreadNotifications > 0)
                                <span class="badge">{{ $unreadNotifications }}</span>
                            @endif
                        </a>
                        <a class="sidebar-link {{ request()->routeIs('reports.*') ? 'active' : '' }}" href="{{ route('reports.index') }}">Báo cáo</a>
                    </section>

                    <section class="sidebar-section">
                        <h2 class="sidebar-heading">Quản lý công việc</h2>
                        <a class="sidebar-link {{ request()->routeIs('kanban.*') ? 'active' : '' }}" href="{{ route('kanban.index') }}">Kanban</a>
                        <a class="sidebar-link {{ request()->routeIs('my-tasks.*') ? 'active' : '' }}" href="{{ route('my-tasks.index') }}">Công việc của tôi</a>
                        @if (in_array($roleName, ['admin', 'manager'], true))
                            <a class="sidebar-link {{ request()->routeIs('tasks.*') ? 'active' : '' }}" href="{{ route('tasks.index') }}">Công việc</a>
                            <a class="sidebar-link {{ request()->routeIs('projects.*') ? 'active' : '' }}" href="{{ route('projects.index') }}">Dự án</a>
                            <a class="sidebar-link {{ request()->routeIs('task-categories.*') ? 'active' : '' }}" href="{{ route('task-categories.index') }}">Danh mục công việc</a>
                        @endif
                    </section>

                    @if ($roleName === 'admin')
                        <section class="sidebar-section">
                            <h2 class="sidebar-heading">Quản trị hệ thống</h2>
                            <a class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">Người dùng</a>
                            <a class="sidebar-link {{ request()->routeIs('admin.departments.*') ? 'active' : '' }}" href="{{ route('admin.departments.index') }}">Phòng ban</a>
                        </section>
                    @endif
                </nav>
            </aside>

            <div class="content-shell">
                <header class="topbar">
                    <div>
                        <h1 class="topbar-title">Hệ thống quản lý giao việc</h1>
                        <p class="topbar-subtitle">@yield('title', 'Bảng điều khiển')</p>
                    </div>

                    <div class="topbar-actions">
                        <a class="button light" href="{{ route('notifications.index') }}">Thông báo {{ $unreadNotifications > 0 ? '(' . $unreadNotifications . ')' : '' }}</a>
                        <div class="user-box">
                            <span class="user-name">{{ Auth::user()->full_name ?? Auth::user()->name }}</span>
                            <span class="role-badge">{{ $roleLabel }}</span>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="button secondary" type="submit">Đăng xuất</button>
                        </form>
                    </div>
                </header>

                @yield('content')
            </div>
        </div>
    @else
        @yield('content')
    @endauth

    <script>
        function clearStaleOverlays() {
            if (document.body.classList.contains('has-active-overlay')) {
                return;
            }

            document.body.classList.remove('modal-open', 'loading', 'disabled');
            document.documentElement.classList.remove('modal-open', 'loading', 'disabled');

            document
                .querySelectorAll('.modal-backdrop, .backdrop, .loading-overlay, .page-overlay')
                .forEach(function (element) {
                    if (!element.closest('[data-overlay-active="true"]')) {
                        element.remove();
                    }
                });
        }

        document.addEventListener('DOMContentLoaded', clearStaleOverlays);
        window.addEventListener('pageshow', clearStaleOverlays);

        document.addEventListener('submit', function () {
            window.setTimeout(clearStaleOverlays, 1500);
        });
    </script>
</body>
</html>
