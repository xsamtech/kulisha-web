<?php

namespace App\Providers;

use App\Http\Resources\User as ResourcesUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Auth::check()) {
            $current_user = Auth::user();

            View::share('current_user', ResourcesUser::collection($current_user)->toArray(request()));

            view()->composer('*', function ($view) {
                $view->with('current_locale', app()->getLocale());
                $view->with('available_locales', config('app.available_locales'));
            });

        } else {
            view()->composer('*', function ($view) {
                $view->with('current_locale', app()->getLocale());
                $view->with('available_locales', config('app.available_locales'));
            });
        }
    }
}
