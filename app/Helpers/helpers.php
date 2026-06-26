<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

if (! function_exists('paginate')) {
    /**
     * Build a paginated result array.
     *
     * @param  array<mixed>  $items
     * @return array{data: array<mixed>, meta: array{total: int, per_page: int, current_page: int, last_page: int, has_prev: bool, has_next: bool, page_numbers: int[], from: int, to: int}}
     */
    function paginate(array $items, int $total, int $perPage, int $page): array
    {
        $totalPage = $perPage > 0 ? (int) ceil($total / $perPage) : 1;
        $totalPage = max(1, $totalPage);

        return [
            'datas'         => $items,
            'paginate_data' => [
                'total_data'   => $total,
                'page_size'    => $perPage,
                'current_page' => $page,
                'total_page'   => $totalPage,
            ],
        ];
    }
}

if (! function_exists('ci_like')) {
    /**
     * Build a case-insensitive LIKE clause descriptor for Eloquent whereRaw.
     *
     * Usage: $q->whereRaw("LOWER($column) LIKE ?", ['%'.strtolower($value).'%'])
     *
     * @return array{column: string, operator: string, value: string}
     */
    function ci_like(string $column, string $value): array
    {
        return [
            'column' => "LOWER({$column})",
            'operator' => 'LIKE',
            'value' => '%'.strtolower($value).'%',
        ];
    }
}

if (! function_exists('clean_rich_text')) {
    /**
     * Sanitize rich-text HTML, keeping only safe tags.
     */
    function clean_rich_text(string $html): string
    {
        $allowed = '<p><br><strong><em><u><s><ul><ol><li>'
            .'<h1><h2><h3><h4><h5><h6>'
            .'<a><img><div><span>'
            .'<table><thead><tbody><tr><th><td>'
            .'<blockquote><pre><code>';

        return strip_tags($html, $allowed);
    }
}

if (! function_exists('generate_otp')) {
    /**
     * Generate a cryptographically random 6-digit OTP string.
     */
    function generate_otp(): string
    {
        return str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    }
}

if (! function_exists('hash_otp')) {
    function hash_otp(string $otp): string
    {
        $cost = (int) config('laraveladmin.bcrypt_rounds', 10);
        return password_hash($otp, PASSWORD_BCRYPT, ['cost' => $cost]);
    }
}

if (! function_exists('verify_otp')) {
    /**
     * Verify a plain OTP against a bcrypt hash.
     */
    function verify_otp(string $otp, string $hashed): bool
    {
        return password_verify($otp, $hashed);
    }
}

if (! function_exists('auth_user')) {
    /**
     * Get the currently authenticated user from session, with roles+permissions eager-loaded.
     * Uses a static per-request cache keyed by user_id.
     */
    function auth_user(): ?User
    {
        $userId = session('user_id');
        if (! $userId) {
            return null;
        }
        static $cache = [];
        if (! isset($cache[$userId])) {
            $cache[$userId] = User::with('roles.permissions')->find($userId);
        }

        return $cache[$userId];
    }
}
