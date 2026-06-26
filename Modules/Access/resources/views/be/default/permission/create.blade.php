@extends('layouts.be.default.main')
@section('title', 'Create Permission')
@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Create Permission</h1>
    <a href="{{ route('admin.v1.access.permission.index') }}" class="btn btn-sm btn-secondary">
        <i class="fas fa-arrow-left fa-fw"></i> Back
    </a>
</div>

<div class="tw-card">
    <form method="POST" action="{{ route('admin.v1.access.permission.store') }}">
        @csrf
        <div class="grid md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <label class="form-label" for="name">Name <span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}" placeholder="e.g. admin.v1.access.user.index" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="form-label" for="method">Method <span class="text-red-500">*</span></label>
                <select id="method" name="method" class="form-control @error('method') is-invalid @enderror" required>
                    <option value="">Select Method</option>
                    @foreach(['GET','POST','PUT','PATCH','DELETE'] as $m)
                    <option value="{{ $m }}" {{ old('method') === $m ? 'selected' : '' }}>{{ $m }}</option>
                    @endforeach
                </select>
                @error('method')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="form-label" for="guard_name">Guard <span class="text-red-500">*</span></label>
                <select id="guard_name" name="guard_name" class="form-control @error('guard_name') is-invalid @enderror" required>
                    <option value="web" {{ old('guard_name', 'web') === 'web' ? 'selected' : '' }}>web</option>
                    <option value="api" {{ old('guard_name') === 'api' ? 'selected' : '' }}>api</option>
                </select>
                @error('guard_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="form-label" for="status">Status <span class="text-red-500">*</span></label>
                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" required>
                    <option value="Active" {{ old('status', 'Active') === 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ old('status') === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="md:col-span-2">
                <label class="form-label" for="desc">Description</label>
                <textarea id="desc" name="desc" class="form-control @error('desc') is-invalid @enderror"
                          rows="2">{{ old('desc') }}</textarea>
                @error('desc')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="mt-6 flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save fa-fw"></i> Save
            </button>
            <a href="{{ route('admin.v1.access.permission.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
