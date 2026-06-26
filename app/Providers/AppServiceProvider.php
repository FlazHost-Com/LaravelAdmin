<?php

namespace App\Providers;

use App\Services\JwtService;
use App\Services\SettingCacheService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Shared singleton services — modules register their own via their ServiceProviders
        $this->app->singleton(JwtService::class);
        $this->app->singleton(SettingCacheService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Fail-fast: critical secrets must be present in production
        if (app()->isProduction()) {
            if (empty(config('laraveladmin.jwt_secret'))) {
                throw new \RuntimeException('JWT_SECRET must be set in production');
            }
            if (empty(config('laraveladmin.session_secret'))) {
                throw new \RuntimeException('SESSION_SECRET must be set in production');
            }
        }

        // Share theme + setting to ALL views
        view()->composer('*', function ($view) {
            /** @var SettingCacheService $settingService */
            $settingService = app(SettingCacheService::class);

            try {
                $setting = $settingService->getCurrent();
                $themes = config('themes', []);
                $themeName = $setting->theme ?? 'blue';
                $theme = $themes[$themeName] ?? $themes['blue'] ?? [];
            } catch (\Throwable) {
                $setting = null;
                $themes = config('themes', []);
                $themeName = 'blue';
                $theme = $themes['blue'] ?? [];
            }

            $view->with([
                'setting' => $setting,
                'themes' => config('themes', []),
                'themeName' => $themeName,
                'theme' => $theme,
            ]);
        });
    }
}
