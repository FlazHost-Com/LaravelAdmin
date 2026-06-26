@extends('layouts.be.default.main')
@section('title', 'UI Components')
@section('content')
<h1 class="text-2xl font-bold mb-6">UI Components Showcase</h1>

{{-- ══════════════════════════════════════════════════════════
     Section 1: Stat Cards + counter animation
══════════════════════════════════════════════════════════ --}}
<div class="tw-card p-6 mb-6">
    <h2 class="text-lg font-bold mb-4" style="color:var(--primary)">
        <i class="fas fa-chart-bar fa-fw me-2"></i>1. Stat Cards
    </h2>
    <div class="row">
        <div class="col-md-3">
            <div class="tw-card p-4 text-center" style="border-top:4px solid var(--primary)">
                <div class="text-3xl font-bold stat-count" data-target="1284" style="color:var(--primary)">0</div>
                <div class="text-sm text-gray-500 mt-1"><i class="fas fa-users fa-fw"></i> Total Users</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="tw-card p-4 text-center" style="border-top:4px solid #10b981">
                <div class="text-3xl font-bold stat-count" data-target="342" style="color:#10b981">0</div>
                <div class="text-sm text-gray-500 mt-1"><i class="fas fa-check-circle fa-fw"></i> Active</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="tw-card p-4 text-center" style="border-top:4px solid #f59e0b">
                <div class="text-3xl font-bold stat-count" data-target="58" style="color:#f59e0b">0</div>
                <div class="text-sm text-gray-500 mt-1"><i class="fas fa-clock fa-fw"></i> Pending</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="tw-card p-4 text-center" style="border-top:4px solid #ef4444">
                <div class="text-3xl font-bold stat-count" data-target="17" style="color:#ef4444">0</div>
                <div class="text-sm text-gray-500 mt-1"><i class="fas fa-times-circle fa-fw"></i> Inactive</div>
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════
     Section 2: Charts (line + doughnut)
══════════════════════════════════════════════════════════ --}}
<div class="tw-card p-6 mb-6">
    <h2 class="text-lg font-bold mb-4" style="color:var(--primary)">
        <i class="fas fa-chart-line fa-fw me-2"></i>2. Charts
    </h2>
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-sm font-semibold text-gray-600 mb-2">Line Chart – Monthly Signups</h3>
            <canvas id="lineChart" height="150"></canvas>
        </div>
        <div class="col-md-6">
            <h3 class="text-sm font-semibold text-gray-600 mb-2">Doughnut Chart – Status Distribution</h3>
            <canvas id="doughnutChart" height="150"></canvas>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════
     Section 3: Badge / Status
══════════════════════════════════════════════════════════ --}}
<div class="tw-card p-6 mb-6">
    <h2 class="text-lg font-bold mb-4" style="color:var(--primary)">
        <i class="fas fa-tags fa-fw me-2"></i>3. Badge / Status
    </h2>
    <div class="flex flex-wrap gap-2 mb-3">
        <span class="badge text-bg-primary">Primary</span>
        <span class="badge text-bg-success">Success</span>
        <span class="badge text-bg-danger">Danger</span>
        <span class="badge text-bg-warning">Warning</span>
        <span class="badge text-bg-secondary">Secondary</span>
    </div>
    <div class="flex flex-wrap gap-4">
        <span class="flex items-center gap-1 text-sm"><i class="fas fa-check-circle text-green-500 text-xl"></i> Active</span>
        <span class="flex items-center gap-1 text-sm"><i class="fas fa-times-circle text-red-500 text-xl"></i> Inactive</span>
        <span class="flex items-center gap-1 text-sm"><i class="fas fa-clock text-yellow-500 text-xl"></i> Pending</span>
        <span class="flex items-center gap-1 text-sm"><i class="fas fa-ban text-gray-400 text-xl"></i> Banned</span>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════
     Section 4: Alerts
══════════════════════════════════════════════════════════ --}}
<div class="tw-card p-6 mb-6">
    <h2 class="text-lg font-bold mb-4" style="color:var(--primary)">
        <i class="fas fa-bell fa-fw me-2"></i>4. Alerts
    </h2>
    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle me-2"></i> <strong>Danger!</strong> Something went wrong. Please try again.</div>
    <div class="alert alert-success"><i class="fas fa-check-circle me-2"></i> <strong>Success!</strong> Operation completed successfully.</div>
    <div class="alert alert-info"><i class="fas fa-info-circle me-2"></i> <strong>Info!</strong> Here is some informational message.</div>
    <div class="alert alert-warning"><i class="fas fa-exclamation-circle me-2"></i> <strong>Warning!</strong> Please review before proceeding.</div>
    <div class="alert alert-primary"><i class="fas fa-star me-2"></i> <strong>Primary!</strong> This is a primary-themed alert.</div>
</div>

{{-- ══════════════════════════════════════════════════════════
     Section 5: Buttons + Dropdown
══════════════════════════════════════════════════════════ --}}
<div class="tw-card p-6 mb-6">
    <h2 class="text-lg font-bold mb-4" style="color:var(--primary)">
        <i class="fas fa-mouse-pointer fa-fw me-2"></i>5. Buttons + Dropdown
    </h2>
    <div class="flex flex-wrap gap-2 mb-4">
        <button class="btn btn-primary"><i class="fas fa-check fa-fw"></i> Primary</button>
        <button class="btn btn-success"><i class="fas fa-plus fa-fw"></i> Success</button>
        <button class="btn btn-danger"><i class="fas fa-trash fa-fw"></i> Danger</button>
        <button class="btn btn-warning"><i class="fas fa-exclamation fa-fw"></i> Warning</button>
        <button class="btn btn-secondary"><i class="fas fa-cog fa-fw"></i> Secondary</button>
    </div>
    <div class="flex flex-wrap gap-2 mb-4">
        <button class="btn btn-sm btn-primary">Small</button>
        <button class="btn btn-xs btn-success">X-Small</button>
    </div>
    <div class="btn-group">
        <button class="btn btn-primary">Left</button>
        <button class="btn btn-primary">Middle</button>
        <button class="btn btn-primary">Right</button>
    </div>
    <div class="mt-4">
        <div class="dropdown" style="display:inline-block">
            <button class="btn btn-primary" data-toggle-dd="demo-dropdown">
                Dropdown Action <i class="fas fa-chevron-down ms-2"></i>
            </button>
            <div id="demo-dropdown" class="dropdown-menu">
                <a href="#" class="dropdown-item"><i class="fas fa-edit fa-fw me-2"></i> Edit</a>
                <a href="#" class="dropdown-item"><i class="fas fa-eye fa-fw me-2"></i> View</a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item danger"><i class="fas fa-trash fa-fw me-2"></i> Delete</a>
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════
     Section 6: Modal / Toast / Confirm
══════════════════════════════════════════════════════════ --}}
<div class="tw-card p-6 mb-6">
    <h2 class="text-lg font-bold mb-4" style="color:var(--primary)">
        <i class="fas fa-window-restore fa-fw me-2"></i>6. Modal / Toast / Confirm
    </h2>
    <div class="flex flex-wrap gap-2">
        <button class="btn btn-primary" onclick="document.getElementById('demo-modal').style.display='flex'">
            <i class="fas fa-expand fa-fw"></i> Open Modal
        </button>
        <button class="btn btn-success" id="btn-show-toast">
            <i class="fas fa-bell fa-fw"></i> Show Toast
        </button>
        <button class="btn btn-danger" data-confirm="Are you sure you want to do this?">
            <i class="fas fa-exclamation-triangle fa-fw"></i> Confirm Dialog
        </button>
    </div>

    <!-- Demo Modal -->
    <div id="demo-modal" style="display:none;position:fixed;inset:0;z-index:1000;align-items:center;justify-content:center;background:rgba(0,0,0,0.5)">
        <div class="tw-card p-6" style="min-width:320px;max-width:480px;width:100%">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold">Demo Modal</h3>
                <button onclick="document.getElementById('demo-modal').style.display='none'" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <p class="text-gray-600 mb-4">This is a demo modal dialog. You can put any content here.</p>
            <div class="flex justify-end gap-2">
                <button class="btn btn-secondary" onclick="document.getElementById('demo-modal').style.display='none'">Cancel</button>
                <button class="btn btn-primary" onclick="document.getElementById('demo-modal').style.display='none'">Confirm</button>
            </div>
        </div>
    </div>

    <!-- Demo Toast -->
    <div id="demo-toast" style="display:none;position:fixed;bottom:1.5rem;right:1.5rem;z-index:2000;min-width:280px">
        <div class="alert alert-success" style="box-shadow:0 4px 12px rgba(0,0,0,0.15)">
            <i class="fas fa-check-circle me-2"></i> <strong>Toast notification!</strong> Action completed.
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════
     Section 7: Form Elements
══════════════════════════════════════════════════════════ --}}
<div class="tw-card p-6 mb-6">
    <h2 class="text-lg font-bold mb-4" style="color:var(--primary)">
        <i class="fas fa-wpforms fa-fw me-2"></i>7. Form Elements
    </h2>
    <div class="grid md:grid-cols-2 gap-4">
        <div>
            <label class="form-label" for="demo-text">Text Input</label>
            <input type="text" id="demo-text" class="form-control" placeholder="Enter text here...">
        </div>
        <div>
            <label class="form-label" for="demo-email">Email Input</label>
            <input type="email" id="demo-email" class="form-control" placeholder="user@example.com">
        </div>
        <div>
            <label class="form-label" for="demo-select">Select / Dropdown</label>
            <select id="demo-select" class="form-control">
                <option value="">-- Select an option --</option>
                <option value="1">Option One</option>
                <option value="2">Option Two</option>
                <option value="3">Option Three</option>
            </select>
        </div>
        <div>
            <label class="form-label" for="demo-file">File Upload</label>
            <input type="file" id="demo-file" class="form-control">
        </div>
        <div class="md:col-span-2">
            <label class="form-label" for="demo-textarea">Textarea</label>
            <textarea id="demo-textarea" class="form-control" rows="3" placeholder="Enter multi-line text..."></textarea>
        </div>
        <div>
            <label class="form-label" for="demo-invalid">Invalid Field Demo</label>
            <input type="text" id="demo-invalid" class="form-control is-invalid" value="Bad input">
            <div class="invalid-feedback">This field has a validation error.</div>
        </div>
        <div>
            <label class="form-label">Checkboxes</label>
            <div class="flex flex-wrap gap-4">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" class="form-check-input" checked> Option A
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" class="form-check-input"> Option B
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" class="form-check-input"> Option C
                </label>
            </div>
        </div>
        <div>
            <label class="form-label">Radio Buttons</label>
            <div class="flex flex-wrap gap-4">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="demo-radio" class="form-check-input" checked> Yes
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="demo-radio" class="form-check-input"> No
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="demo-radio" class="form-check-input"> Maybe
                </label>
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════
     Section 8: Rich Text Editor
══════════════════════════════════════════════════════════ --}}
<div class="tw-card p-6 mb-6">
    <h2 class="text-lg font-bold mb-4" style="color:var(--primary)">
        <i class="fas fa-edit fa-fw me-2"></i>8. Rich Text Editor
    </h2>
    <label class="form-label">Content Editor (Trumbowyg)</label>
    <textarea class="trumbowyg-editor form-control" rows="5" placeholder="Type rich text content here...">Hello <strong>World</strong> — this is a <em>Trumbowyg</em> demo editor.</textarea>
</div>

{{-- ══════════════════════════════════════════════════════════
     Section 9: Data Table + Pagination
══════════════════════════════════════════════════════════ --}}
<div class="tw-card p-0 overflow-hidden mb-6">
    <div class="px-6 py-4 border-b flex items-center justify-between">
        <h2 class="text-lg font-bold" style="color:var(--primary)">
            <i class="fas fa-table fa-fw me-2"></i>9. Data Table + Pagination
        </h2>
        <div class="btn-group btn-sm">
            <button class="btn btn-success btn-sm"><i class="fas fa-plus fa-fw"></i> Add</button>
            <button class="btn btn-danger btn-sm"><i class="fas fa-times fa-fw"></i> Delete Selected</button>
        </div>
    </div>
    <div class="p-4" style="overflow-x:auto">
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th width="2%"><input type="checkbox" id="checkall"></th>
                    <th width="5%">No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach([
                    ['id'=>'1','name'=>'Alice Johnson','email'=>'alice@example.com','status'=>'Active','role'=>'Admin'],
                    ['id'=>'2','name'=>'Bob Smith','email'=>'bob@example.com','status'=>'Active','role'=>'Editor'],
                    ['id'=>'3','name'=>'Carol White','email'=>'carol@example.com','status'=>'Inactive','role'=>'Viewer'],
                    ['id'=>'4','name'=>'David Brown','email'=>'david@example.com','status'=>'Active','role'=>'Editor'],
                    ['id'=>'5','name'=>'Eve Davis','email'=>'eve@example.com','status'=>'Active','role'=>'Admin'],
                ] as $i => $row)
                <tr>
                    <td><input type="checkbox" name="selected[]" value="{{ $row['id'] }}"></td>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $row['name'] }}</td>
                    <td>{{ $row['email'] }}</td>
                    <td>
                        @if($row['status'] === 'Active')
                            <i class="fas fa-check-circle text-green-500 text-xl"></i>
                        @else
                            <i class="fas fa-times-circle text-red-500 text-xl"></i>
                        @endif
                    </td>
                    <td><span class="badge text-bg-primary">{{ $row['role'] }}</span></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle-dd="dd-row-{{ $row['id'] }}">
                                Action <i class="fas fa-chevron-down ms-1"></i>
                            </button>
                            <div id="dd-row-{{ $row['id'] }}" class="dropdown-menu">
                                <a href="#" class="dropdown-item"><i class="fas fa-edit fa-fw"></i> Edit</a>
                                <div class="dropdown-divider"></div>
                                <button type="button" class="dropdown-item danger" data-confirm="Delete this row?">
                                    <i class="fas fa-trash fa-fw"></i> Delete
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination demo --}}
        <nav class="mt-4 flex items-center gap-1">
            <a href="#" class="page-link">« Previous</a>
            <a href="#" class="page-link active">1</a>
            <a href="#" class="page-link">2</a>
            <a href="#" class="page-link">3</a>
            <span class="page-link">…</span>
            <a href="#" class="page-link">10</a>
            <a href="#" class="page-link">Next »</a>
        </nav>
    </div>
</div>

@push('foot-scripts')
<script>
(function () {
    /* ── Counter animation ── */
    function animateCount(el) {
        var target = parseInt(el.getAttribute('data-target'), 10);
        var duration = 1200;
        var start = null;
        function step(ts) {
            if (!start) start = ts;
            var progress = Math.min((ts - start) / duration, 1);
            el.textContent = Math.floor(progress * target).toLocaleString();
            if (progress < 1) requestAnimationFrame(step);
            else el.textContent = target.toLocaleString();
        }
        requestAnimationFrame(step);
    }
    document.querySelectorAll('.stat-count').forEach(animateCount);

    /* ── Line Chart ── */
    var lineCtx = document.getElementById('lineChart');
    if (lineCtx && window.Chart) {
        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                datasets: [{
                    label: 'Signups',
                    data: [42, 58, 75, 91, 63, 88, 102, 115, 79, 94, 130, 145],
                    borderColor: getComputedStyle(document.documentElement).getPropertyValue('--primary').trim() || '#3B82F6',
                    backgroundColor: 'rgba(59,130,246,0.1)',
                    fill: true,
                    tension: 0.4,
                }]
            },
            options: { responsive: true, plugins: { legend: { display: false } } }
        });
    }

    /* ── Doughnut Chart ── */
    var doughCtx = document.getElementById('doughnutChart');
    if (doughCtx && window.Chart) {
        new Chart(doughCtx, {
            type: 'doughnut',
            data: {
                labels: ['Active', 'Pending', 'Inactive'],
                datasets: [{
                    data: [342, 58, 17],
                    backgroundColor: ['#10b981', '#f59e0b', '#ef4444'],
                }]
            },
            options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
        });
    }

    /* ── Toast demo ── */
    var toastBtn = document.getElementById('btn-show-toast');
    var toastEl  = document.getElementById('demo-toast');
    if (toastBtn && toastEl) {
        toastBtn.addEventListener('click', function () {
            toastEl.style.display = 'block';
            setTimeout(function () { toastEl.style.display = 'none'; }, 3000);
        });
    }
})();
</script>
@endpush
@endsection
