@php
    $iconName = $name ?? 'circle';
    $iconClass = $class ?? 'icon';
@endphp

<svg class="{{ $iconClass }}" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
    @switch($iconName)
        @case('dashboard')
            <path d="M4 13h7V4H4v9Zm9 7h7V4h-7v16ZM4 20h7v-5H4v5Z" />
            @break
        @case('bell')
            <path d="M18 16v-5a6 6 0 0 0-12 0v5l-2 2h16l-2-2Zm-8 4a2 2 0 0 0 4 0h-4Z" />
            @break
        @case('chart')
            <path d="M5 19h14v2H3V4h2v15Zm2-2h3V9H7v8Zm5 0h3V5h-3v12Zm5 0h3v-6h-3v6Z" />
            @break
        @case('board')
            <path d="M4 5h16v14H4V5Zm2 2v10h3V7H6Zm5 0v10h3V7h-3Zm5 0v10h2V7h-2Z" />
            @break
        @case('tasks')
            <path d="M9 6h11v2H9V6ZM4 5.5 2.8 6.7 6 10l5-5-1.2-1.2L6 7.6 4 5.5ZM9 11h11v2H9v-2Zm0 5h11v2H9v-2ZM4 15.5l-1.2 1.2L6 20l5-5-1.2-1.2L6 17.6l-2-2.1Z" />
            @break
        @case('assign')
            <path d="M5 4h11v2H5v14h11v-2h2v4H3V4h2Zm3 5h8v2H8V9Zm0 4h6v2H8v-2Zm10.6-4.8 1.4 1.4-6.8 6.8-3.2-3.2 1.4-1.4 1.8 1.8 5.4-5.4Z" />
            @break
        @case('progress')
            <path d="M4 18h16v2H2V4h2v14Zm2-2V9h3v7H6Zm5 0V6h3v10h-3Zm5 0v-5h3v5h-3Zm-9-4h10v2H7v-2Z" />
            @break
        @case('approval')
            <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm-1.2 13.6-3.4-3.4 1.4-1.4 2 2 4.8-4.8L17 9.4l-6.2 6.2Z" />
            @break
        @case('send')
            <path d="M3 4 22 12 3 20v-6l12-2-12-2V4Zm2 3v1.4l10.5 1.8L5 7Zm0 8.6V17l10.5-3.2L5 15.6Z" />
            @break
        @case('user-task')
            <path d="M9 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm0 2c-3.4 0-6 1.7-6 4v1h9.5a6 6 0 0 1-.5-2.4c0-.9.2-1.8.6-2.6H9Zm8.6 1.2-2.5 2.5-1.1-1.1-1.2 1.2 2.3 2.3 3.7-3.7-1.2-1.2Z" />
            @break
        @case('folder')
            <path d="M3 6h7l2 2h9v10a2 2 0 0 1-2 2H3V6Zm2 4v8h14v-8H5Z" />
            @break
        @case('category')
            <path d="M4 5h7v7H4V5Zm9 0h7v7h-7V5ZM4 14h7v5H4v-5Zm9 0h7v5h-7v-5Z" />
            @break
        @case('users')
            <path d="M8 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm8-1a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM8 13c-3.3 0-6 1.8-6 4v2h12v-2c0-2.2-2.7-4-6-4Zm8-.5c-.8 0-1.6.2-2.3.5 1.4 1 2.3 2.4 2.3 4v2h6v-1.5c0-1.9-2.7-5-6-5Z" />
            @break
        @case('building')
            <path d="M4 21V3h12v18h-2v-4h-4v4H4Zm3-14h2V5H7v2Zm4 0h2V5h-2v2ZM7 11h2V9H7v2Zm4 0h2V9h-2v2Zm-4 4h2v-2H7v2Zm4 0h2v-2h-2v2Zm7 6V8h2v13h-2Z" />
            @break
        @case('check')
            <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm-1.2 13.8-4-4 1.4-1.4 2.6 2.6 5-5 1.4 1.4-6.4 6.4Z" />
            @break
        @case('warning')
            <path d="M12 3 2 21h20L12 3Zm1 14h-2v-2h2v2Zm0-4h-2V8h2v5Z" />
            @break
        @case('clock')
            <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm1 11h5v-2h-4V6h-2v7Z" />
            @break
        @case('comment')
            <path d="M4 4h16v11H7l-3 3V4Zm3 4v2h10V8H7Zm0 4h7v-2H7v2Z" />
            @break
        @case('eye')
            <path d="M12 5c5 0 9 5 9 7s-4 7-9 7-9-5-9-7 4-7 9-7Zm0 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
            @break
        @case('edit')
            <path d="M4 17.5V20h2.5L17.8 8.7l-2.5-2.5L4 17.5ZM19.7 6.8a1 1 0 0 0 0-1.4l-1.1-1.1a1 1 0 0 0-1.4 0l-.9.9 2.5 2.5.9-.9Z" />
            @break
        @case('filter')
            <path d="M3 5h18l-7 8v5l-4 2v-7L3 5Z" />
            @break
        @case('plus')
            <path d="M11 5h2v6h6v2h-6v6h-2v-6H5v-2h6V5Z" />
            @break
        @default
            <path d="M12 4a8 8 0 1 0 0 16 8 8 0 0 0 0-16Z" />
    @endswitch
</svg>
