<?php

namespace App\Providers;

use App\Http\Resources\Category as ResourcesCategory;
use App\Http\Resources\User as ResourcesUser;
use App\Http\Resources\Visibility as ResourcesVisibility;
use App\Models\Category;
use App\Models\Group;
use App\Models\Type;
use App\Models\Visibility;
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
            $post_type_group = Group::where('group_name->fr', 'Type de post')->first();
            $post_visibilities_group = Group::where('group_name->fr', 'Visibilité pour les posts')->first();
            $product_type = Type::where([['alias', 'product'], ['group_id', $post_type_group->id]])->first();
            $service_type = Type::where([['alias', 'service'], ['group_id', $post_type_group->id]])->first();

            if (Auth::check()) {
                // Current user
                $current_user = new ResourcesUser(Auth::user());
                $user_data = $current_user->toArray(request());
                // User fields
                $user_fields = $user_data['fields'];
                $fields_ids = getColumnsFromJson($user_fields, 'id');
                // Categories for product
                $categories_product_collection = Category::whereHas('fields', function ($query) use ($fields_ids, $product_type) { $query->whereIn('fields.id', $fields_ids); })->where('type_id', $product_type->id)->get();
                $categories_product_resource = ResourcesCategory::collection($categories_product_collection);
                $categories_product = $categories_product_resource->toArray(request());
                $categories_product_type = $categories_product[0]['type']->toArray(request());
                // Categories for service
                $categories_service_collection = Category::where('type_id', $service_type->id)->get();
                $categories_service_resource = ResourcesCategory::collection($categories_service_collection);
                $categories_service = $categories_service_resource->toArray(request());
                $categories_service_type = $categories_service[0]['type']->toArray(request());
                // Visibilities for posts
                $post_visibilities_collection = Visibility::where('group_id', $post_visibilities_group->id)->get();
                $post_visibilities_resource = ResourcesVisibility::collection($post_visibilities_collection);
                $post_visibilities = $post_visibilities_resource->toArray(request());
                // Default visibility (Everybody)
                $everybody_visibility = Visibility::where('alias', 'everybody')->first();

                $view->with('current_user', $user_data);
                $view->with('categories_product', $categories_product);
                $view->with('categories_product_type', $categories_product_type);
                $view->with('categories_service', $categories_service);
                $view->with('categories_service_type', $categories_service_type);
                $view->with('post_visibilities', $post_visibilities);
                $view->with('everybody_visibility', $everybody_visibility);
            }

            $view->with('current_locale', app()->getLocale());
            $view->with('available_locales', config('app.available_locales'));
        });
    }
}
