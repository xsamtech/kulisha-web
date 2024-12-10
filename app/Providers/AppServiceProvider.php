<?php

namespace App\Providers;

use App\Http\Controllers\API\PostController;
use App\Http\Resources\Category as ResourcesCategory;
use App\Http\Resources\Field as ResourcesField;
use App\Http\Resources\Reaction as ResourcesReaction;
use App\Http\Resources\Status as ResourcesStatus;
use App\Http\Resources\Type as ResourcesType;
use App\Http\Resources\User as ResourcesUser;
use App\Http\Resources\Visibility as ResourcesVisibility;
use App\Models\Category;
use App\Models\Field;
use App\Models\Group;
use App\Models\Reaction;
use App\Models\Status;
use App\Models\Type;
use App\Models\Visibility;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
            // Prepare an ARRAY for the news feed
            $news_feed_aliases_array = [];
            // Available time zones
            $timezones = DateTimeZone::listIdentifiers();
            // Prepare an ARRAY for time zones with their offset
            $timezoneList = [];

            foreach ($timezones as $timezone) {
                // Créer un objet Carbon pour obtenir l'offset UTC de chaque fuseau horaire
                $carbonTimezone = Carbon::now(new DateTimeZone($timezone));
                // Récupérer l'offset UTC (ex : +01:00)
                $offset = $carbonTimezone->format('P');

                // Vérifier si le fuseau horaire contient un '/'
                if (strpos($timezone, '/') !== false) {
                    // Extraire le nom de la ville à partir du fuseau horaire
                    $cityName = explode('/', $timezone)[1];
                    // Remplacer les underscores par des espaces pour rendre le texte plus lisible
                    $cityName = str_replace('_', ' ', $cityName);  
                    // Building a descriptive string
                    $timezoneList[$timezone] = __('miscellaneous.time_zone', ['city' => $cityName]) . ' (UTC' . $offset . ')';
                } else {
                    // Building a descriptive string
                    $timezoneList[$timezone] = $timezone . ' (UTC' . $offset . ')';
                }
            }

            // Fields
            $fields_collection = Field::all();
            $fields_resource = ResourcesField::collection($fields_collection);
            $fields = $fields_resource->toArray(request());
            // Groups
            $post_type_group = Group::where('group_name->fr', 'Type de post')->first();
            $access_type_group = Group::where('group_name->fr', 'Type d’accès')->first();
            $post_community_status_group = Group::where('group_name->fr', 'Etat du post ou de la communauté')->first();
            $post_visibilities_group = Group::where('group_name->fr', 'Visibilité pour les posts')->first();
            $post_reactions_group = Group::where('group_name->fr', 'Réaction sur post')->first();
            // Types
            $product_type = Type::where([['alias', 'product'], ['group_id', $post_type_group->id]])->first();
            $service_type = Type::where([['alias', 'service'], ['group_id', $post_type_group->id]])->first();
            $access_types_collection = Type::where('group_id', $access_type_group->id)->get();
            $access_types_resource = ResourcesType::collection($access_types_collection);
            $access_types = $access_types_resource->toArray(request());
            // Statuses
            $draft_status = Status::where([['alias', 'draft'], ['group_id', $post_community_status_group->id]])->first();
            $draft_status_resource = new ResourcesStatus($draft_status);
            $draft_status_data = $draft_status_resource->toArray(request());
            $operational_status = Status::where([['alias', 'operational'], ['group_id', $post_community_status_group->id]])->first();
            $operational_status_resource = new ResourcesStatus($operational_status);
            $operational_status_data = $operational_status_resource->toArray(request());
            $boosted_status = Status::where([['alias', 'boosted'], ['group_id', $post_community_status_group->id]])->first();
            $boosted_status_resource = new ResourcesStatus($boosted_status);
            $boosted_status_data = $boosted_status_resource->toArray(request());
            $deleted_status = Status::where([['alias', 'recycled'], ['group_id', $post_community_status_group->id]])->first();
            $deleted_status_resource = new ResourcesStatus($deleted_status);
            $deleted_status_data = $deleted_status_resource->toArray(request());

            // Add data to "$news_feed_aliases_array" ARRAY
            array_push($news_feed_aliases_array, 'product', 'service', 'anonymous_question_request', 'poll');

            // Convert "$news_feed_aliases_array" to string
            $news_feed_aliases = implode(',', $news_feed_aliases_array);

            if (Auth::check()) {
                // Calling the request
                $request = App::make(Request::class);
                // Current user
                $current_user = new ResourcesUser(Auth::user());
                $user_data = $current_user->toArray(request());
                // User fields
                $user_fields = $user_data['fields'];
                $fields_ids = getColumnsFromJson($user_fields, 'id');
                // Posts list
                $post_controller = new PostController();
                $news_feed_request = $post_controller->newsFeed($news_feed_aliases, Auth::user()->id);
                $news_feed_data = $news_feed_request->getData()->data;
                $news_feed = json_decode(json_encode($news_feed_data), true);
                // Categories for product
                $categories_product_collection = Category::whereHas('fields', function ($query) use ($fields_ids) { $query->whereIn('fields.id', $fields_ids); })->where('type_id', $product_type->id)->get();
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
                // Restricted visibility
                $everybody_except_visibility = Visibility::where('alias', 'everybody_except')->first();
                $nobody_except_visibility = Visibility::where('alias', 'nobody_except')->first();
                // Reactions
                $reactions_collection = Reaction::where('group_id', $post_reactions_group->id)->get();
                $reactions_resource = ResourcesReaction::collection($reactions_collection);
                $reactions = $reactions_resource->toArray(request());

                $view->with('access_types', $access_types);
                $view->with('current_user', $user_data);
                $view->with('posts', $news_feed);
                $view->with('categories_product', $categories_product);
                $view->with('categories_product_type', $categories_product_type);
                $view->with('categories_service', $categories_service);
                $view->with('categories_service_type', $categories_service_type);
                $view->with('post_visibilities', $post_visibilities);
                $view->with('everybody_visibility', $everybody_visibility);
                $view->with('everybody_except_visibility', $everybody_except_visibility);
                $view->with('nobody_except_visibility', $nobody_except_visibility);
                $view->with('reactions', $reactions);
                $view->with('ipinfo_data', $request->ipinfo);
            }

            $view->with('timezones', $timezoneList);
            $view->with('all_fields', $fields);
            $view->with('draft_status', $draft_status_data);
            $view->with('operational_status', $operational_status_data);
            $view->with('boosted_status', $boosted_status_data);
            $view->with('deleted_status', $deleted_status_data);
            $view->with('current_locale', app()->getLocale());
            $view->with('available_locales', config('app.available_locales'));
        });
    }
}
