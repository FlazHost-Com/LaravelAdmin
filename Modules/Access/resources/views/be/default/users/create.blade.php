@extends('layouts.be.default.main')
@section('title', 'Create User')
@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Create User</h1>
    <a href="{{ route('admin.v1.access.user.index') }}" class="btn btn-sm btn-secondary">
        <i class="fas fa-arrow-left fa-fw"></i> Back
    </a>
</div>

<div class="tw-card">
    <form method="POST" action="{{ route('admin.v1.access.user.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="form-label" for="code">Code</label>
                <input type="text" id="code" name="code" class="form-control @error('code') is-invalid @enderror"
                       value="{{ old('code') }}" placeholder="User code (optional)">
                @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="form-label" for="name">Name <span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="form-label" for="email">Email <span class="text-red-500">*</span></label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="form-label" for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"
                       value="{{ old('phone') }}" placeholder="Phone number (optional)">
                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="form-label" for="password">Password <span class="text-red-500">*</span></label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="form-label" for="password_confirmation">Confirm Password <span class="text-red-500">*</span></label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>
            <div>
                <label class="form-label" for="status">Status <span class="text-red-500">*</span></label>
                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" required>
                    <option value="Active" {{ old('status', 'Active') === 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ old('status') === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="form-label" for="picture">Picture URL</label>
                <input type="text" id="picture" name="picture" class="form-control @error('picture') is-invalid @enderror"
                       value="{{ old('picture') }}" placeholder="https://...">
                @error('picture')<div class="invalid-feedback">{{ $message }}</div>@enderror
                <div class="mt-2" id="picture-preview-wrap">
                    <img id="picture-preview" src="{{ old('picture') }}" alt="preview" style="max-width:80px;max-height:80px;border-radius:4px;display:{{ old('picture') ? 'block' : 'none' }}">
                </div>
            </div>
        </div>

        <div class="mt-4">
            <label class="form-label">Roles</label>
            <div class="flex flex-wrap gap-3">
                @foreach($roles as $role)
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="role_ids[]" value="{{ $role->id }}"
                           {{ in_array($role->id, old('role_ids', [])) ? 'checked' : '' }}>
                    <span>{{ $role->name }}</span>
                </label>
                @endforeach
            </div>
        </div>

        <div class="mt-6 flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save fa-fw"></i> Save
            </button>
            <a href="{{ route('admin.v1.access.user.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<script>
    document.getElementById('picture').addEventListener('input', function () {
        const preview = document.getElementById('picture-preview');
        preview.src = this.value;
        preview.style.display = this.value ? 'block' : 'none';
    });
</script>
@endsection
