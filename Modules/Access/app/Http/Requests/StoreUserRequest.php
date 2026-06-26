<?php

namespace Modules\Access\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'email', 'max:200'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['sometimes'],
            'phone' => ['nullable', 'string', 'max:50'],
            'code' => ['nullable', 'string', 'max:50'],
            'status' => ['required', 'in:Active,Inactive'],
            'picture' => ['nullable', 'string', 'max:500'],
            'role_ids' => ['nullable', 'array'],
            'role_ids.*' => ['string'],
        ];
    }
}
