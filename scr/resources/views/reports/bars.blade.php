@php $maxCount = max($items->pluck('count')->max() ?? 0, 1); @endphp

@foreach ($items as $item)
    <div style="margin-bottom: 12px;">
        <div style="display:flex;justify-content:space-between;gap:12px;">
            <span>{{ $item['label'] }}</span>
            <strong>{{ $item['count'] }}</strong>
        </div>
        <div class="progress">
            <div class="progress-bar" style="width: {{ round($item['count'] / $maxCount * 100) }}%;"></div>
        </div>
    </div>
@endforeach
