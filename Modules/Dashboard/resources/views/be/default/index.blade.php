@extends('layouts.be.default.main')
@section('title', 'Dashboard')
@section('content')
<!-- Stat cards row -->
<div class="row mb-6">
    @foreach([
        ['label'=>'Users','count'=>$stats['users'],'icon'=>'fa-users','color'=>'var(--primary)'],
        ['label'=>'Roles','count'=>$stats['roles'],'icon'=>'fa-user-shield','color'=>'#10b981'],
        ['label'=>'Permissions','count'=>$stats['permissions'],'icon'=>'fa-key','color'=>'#f59e0b'],
        ['label'=>'Active Users','count'=>$stats['active_users'],'icon'=>'fa-user-check','color'=>'#8b5cf6'],
    ] as $card)
    <div class="col-md-3">
        <div class="tw-card p-6">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <p class="text-gray-500 text-sm font-medium">{{ $card['label'] }}</p>
                    <h3 class="text-3xl font-bold counter" data-target="{{ $card['count'] }}">0</h3>
                </div>
                <div class="w-14 h-14 rounded-full flex items-center justify-center" style="background:{{ $card['color'] }}20">
                    <i class="fas {{ $card['icon'] }} text-2xl" style="color:{{ $card['color'] }}"></i>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- Charts -->
<div class="row mb-6">
    <div class="col-md-6">
        <div class="tw-card p-6">
            <h3 class="font-bold text-gray-700 mb-4">User Status Distribution</h3>
            <canvas id="doughnutChart" style="max-height:200px"></canvas>
        </div>
    </div>
    <div class="col-md-6">
        <div class="tw-card p-6">
            <h3 class="font-bold text-gray-700 mb-4">Monthly Overview</h3>
            <canvas id="lineChart" style="max-height:200px"></canvas>
        </div>
    </div>
</div>
<!-- Recent Activities -->
<div class="tw-card p-6">
    <h3 class="font-bold text-gray-700 mb-4">Recent Activities</h3>
    <table class="table table-bordered table-hover">
        <thead><tr><th>Type</th><th>Message</th><th>Time</th></tr></thead>
        <tbody>
            @foreach($activities as $act)
            <tr>
                <td><span class="badge text-bg-primary">{{ $act['type'] }}</span></td>
                <td>{{ $act['message'] }}</td>
                <td class="text-gray-500 text-sm">{{ $act['time'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('foot-scripts')
<script>
// Counter animation
document.querySelectorAll('.counter').forEach(function(el) {
    var target = parseInt(el.getAttribute('data-target'));
    var step = Math.ceil(target / 30);
    var current = 0;
    var timer = setInterval(function() {
        current += step;
        if (current >= target) { el.textContent = target; clearInterval(timer); }
        else el.textContent = current;
    }, 30);
});

// Charts — themed colors
var primaryColor = getComputedStyle(document.documentElement).getPropertyValue('--primary').trim() || '#3B82F6';
new Chart(document.getElementById('doughnutChart'), {
    type: 'doughnut',
    data: { labels: ['Active','Inactive'], datasets:[{ data:[{{ $stats['active_users'] }},{{ $stats['users'] - $stats['active_users'] }}], backgroundColor:[primaryColor,'#e5e7eb'] }] },
    options: { responsive:true, plugins:{legend:{position:'bottom'}} }
});
new Chart(document.getElementById('lineChart'), {
    type: 'line',
    data: { labels:['Jan','Feb','Mar','Apr','May','Jun'], datasets:[{ label:'Users', data:[10,20,15,30,25,{{ $stats['users'] }}], borderColor:primaryColor, backgroundColor:primaryColor+'20', tension:0.4, fill:true }] },
    options: { responsive:true, plugins:{legend:{position:'bottom'}} }
});
</script>
@endpush
