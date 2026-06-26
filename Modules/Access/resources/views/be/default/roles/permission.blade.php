@extends('layouts.be.default.main')
@section('title', 'Role Permissions')
@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">
        Role Permissions
        <span class="text-lg font-normal text-gray-500 ml-2">— {{ $result['role']['name'] }}</span>
    </h1>
    <a href="{{ route('admin.v1.access.role.index') }}" class="btn btn-sm btn-secondary">
        <i class="fas fa-arrow-left fa-fw"></i> Back to Roles
    </a>
</div>

<div class="tw-card p-0 overflow-hidden">
    <div class="px-6 py-4 border-b flex items-center justify-between">
        <h2 class="text-lg font-bold" style="color:var(--primary)">Permission List</h2>
        <div class="btn-group btn-sm">
            <button type="submit" form="assign-form"
                    formaction="{{ route('admin.v1.access.role.permission.assign_selected', $id) }}"
                    data-confirm="Assign selected permissions?" class="btn btn-success btn-sm">
                <i class="fas fa-fw fa-plus"></i> Assign Selected
            </button>
            <button type="submit" form="assign-form"
                    formaction="{{ route('admin.v1.access.role.permission.unassign_selected', $id) }}"
                    data-confirm="Unassign selected permissions?" class="btn btn-danger btn-sm">
                <i class="fas fa-fw fa-times"></i> Unassign Selected
            </button>
        </div>
    </div>
    <div class="p-4" style="overflow-x:auto">
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <form id="searchform" method="GET" action="{{ route('admin.v1.access.role.permission', $id) }}">
                <tr>
                    <th width="2%"></th>
                    <th width="7%">
                        <select name="q_page_size" class="form-control" onchange="document.getElementById('searchform').submit()">
                            @foreach([20,50,100,200] as $sz)
                            <option value="{{ $sz }}" {{ ($filter['q_page_size'] ?? 20) == $sz ? 'selected' : '' }}>{{ $sz }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th><input type="text" name="q_name" class="form-control" value="{{ $filter['q_name'] ?? '' }}" placeholder="Name"></th>
                    <th>
                        <select name="q_method" class="form-control">
                            <option value="">All Methods</option>
                            @foreach(['GET','POST','PUT','PATCH','DELETE'] as $m)
                            <option value="{{ $m }}" {{ ($filter['q_method'] ?? '') === $m ? 'selected' : '' }}>{{ $m }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th>
                        <select name="q_status" class="form-control">
                            <option value="">Select</option>
                            <option value="Active" {{ ($filter['q_status'] ?? '') === 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ ($filter['q_status'] ?? '') === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </th>
                    <th><input type="text" name="q_desc" class="form-control" value="{{ $filter['q_desc'] ?? '' }}" placeholder="Description"></th>
                    <th>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-search"></i></button>
                            <a href="{{ route('admin.v1.access.role.permission', $id) }}" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                        </div>
                    </th>
                </tr>
                </form>
                <tr>
                    <th><input type="checkbox" id="checkall"></th>
                    <th>No</th><th>Name</th><th>Method</th><th>Status</th><th>Description</th><th>Action</th>
                </tr>
            </thead>
            <form id="assign-form" method="POST">
                @csrf
            <tbody>
                @forelse($result['data'] as $i => $perm)
                @php $isAssigned = in_array($perm['id'], $result['assigned_ids']); @endphp
                <tr class="{{ $isAssigned ? 'table-success' : '' }}">
                    <td><input type="checkbox" name="selected[]" value="{{ $perm['id'] }}"></td>
                    <td>{{ ($result['meta']['current_page'] - 1) * $result['meta']['per_page'] + $i + 1 }}</td>
                    <td>{{ $perm['name'] }}</td>
                    <td>
                        @php
                            $badgeColor = match($perm['method']) {
                                'GET'    => 'text-bg-primary',
                                'POST'   => 'text-bg-success',
                                'PUT'    => 'text-bg-warning',
                                'PATCH'  => 'text-bg-info',
                                'DELETE' => 'text-bg-danger',
                                default  => 'text-bg-secondary',
                            };
                        @endphp
                        <span class="badge {{ $badgeColor }}">{{ $perm['method'] }}</span>
                    </td>
                    <td>
                        @if($perm['status'] === 'Active')
                            <i class="fas fa-check-circle text-green-500 text-xl"></i>
                        @else
                            <i class="fas fa-times-circle text-red-500 text-xl"></i>
                        @endif
                    </td>
                    <td>{{ $perm['desc'] ?? '-' }}</td>
                    <td>
                        @if($isAssigned)
                            <a href="{{ route('admin.v1.access.role.permission.unassign', [$id, $perm['id']]) }}"
                               class="btn btn-sm btn-danger" data-confirm="Unassign this permission?">
                                <i class="fas fa-minus fa-fw"></i> Unassign
                            </a>
                        @else
                            <a href="{{ route('admin.v1.access.role.permission.assign', [$id, $perm['id']]) }}"
                               class="btn btn-sm btn-success">
                                <i class="fas fa-plus fa-fw"></i> Assign
                            </a>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center py-8 text-gray-400">No permissions found</td></tr>
                @endforelse
            </tbody>
            </form>
        </table>

        @if($result['meta']['last_page'] > 1)
        <nav class="mt-4 flex items-center gap-1">
            @if($result['meta']['has_prev'])
            <a href="{{ request()->fullUrlWithQuery(['page' => $result['meta']['current_page'] - 1]) }}" class="page-link">« Previous</a>
            @endif
            @foreach($result['meta']['page_numbers'] as $pn)
                @if($pn === '...')
                    <span class="page-link">…</span>
                @else
                    <a href="{{ request()->fullUrlWithQuery(['page' => $pn]) }}"
                       class="page-link {{ $pn == $result['meta']['current_page'] ? 'active' : '' }}">{{ $pn }}</a>
                @endif
            @endforeach
            @if($result['meta']['has_next'])
            <a href="{{ request()->fullUrlWithQuery(['page' => $result['meta']['current_page'] + 1]) }}" class="page-link">Next »</a>
            @endif
        </nav>
        @endif
    </div>
</div>
@endsection
