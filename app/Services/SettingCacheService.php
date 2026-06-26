<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingCacheService
{
    private const CACHE_KEY = 'setting:current';

    private const CACHE_TTL = 60; // seconds

    /**
     * Return the current Setting row, cached for 60 seconds.
     */
    public function getCurrent(): Setting
    {
        /** @var Setting $setting */
        $setting = Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return Setting::first();
        });

        return $setting;
    }

    /**
     * Invalidate the settings cache.
     */
    public function invalidate(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    /**
     * Return the theme palette array for the setting's active theme.
     */
    public function getTheme(): array
    {
        try {
            $setting = $this->getCurrent();
            $themeName = $setting->theme ?? 'blue';
        } catch (\Throwable) {
            $themeName = 'blue';
        }

        $themes = config('themes', []);

        return $themes[$themeName] ?? $themes['blue'] ?? [];
    }
}
