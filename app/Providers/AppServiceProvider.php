<?php

namespace App\Providers;

use App\Http\Resources\User as ResourcesUser;
use Illuminate\Support\Facades\Auth;
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
        view()->composer('*', function ($view) {
            if (Auth::check()) {
                $currentUser = new ResourcesUser(Auth::user());
                $user_data = $currentUser->toArray(request()); // Convertir la ressource en tableau

                $view->with('current_user', $user_data);
            }

            $view->with('current_locale', app()->getLocale());
            $view->with('available_locales', config('app.available_locales'));
        });
    }
}
