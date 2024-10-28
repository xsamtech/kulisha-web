<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="xsamtech.com">
        <meta name="keywords" content="@lang('miscellaneous.keywords')">
        <meta name="kls-url" content="{{ getWebURL() }}">
        <meta name="kls-api-url" content="{{ getApiURL() }}">
        <meta name="kls-visitor" content="{{ !empty(Auth::user()) ? Auth::user()->id : null }}">
        <meta name="kls-ip" content="{{ Request::ip() }}">
        <meta name="kls-ref" content="{{ (!empty(Auth::user()) ? Auth::user()->api_token : 'nat') . '-' . (request()->has('app_id') ? request()->get('app_id') : 'nai') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}">

        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

        <!-- Plugins CSS -->
        {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"> --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/font-awesome/css/all.min.css') }}">
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> --}}
        <link rel="stylesheet" href="{{ asset('assets/addons/social/bootstrap-icons/bootstrap-icons.min.css') }}">

        <!-- Material Design for Boostrap CSS -->
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/custom/mdb/css/mdb.min.css') }}"> --}}
        <!-- Overlay Scrollbars CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/OverlayScrollbars-master/css/OverlayScrollbars.min.css') }}">
        <!-- Tiny Slider CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/tiny-slider/dist/tiny-slider.css') }}">
        <!-- Choices CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/choices.js/public/assets/styles/choices.min.css') }}">
        <!-- Glightbox CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/glightbox-master/dist/css/glightbox.min.css') }}">
        <!-- Dropzone CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/dropzone/dist/min/dropzone.min.css') }}">
        <!-- Flatpickr CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/flatpickr/dist/flatpickr.min.css') }}">
        <!-- Plyr CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/plyr/plyr.css') }}">
        <!-- Zuck CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/custom/zuck.js/dist/zuck.min.css') }}">
        <!-- Facebook Reaction CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/custom/99points-facebook-reactions/stylesheet.css') }}">

        <!-- Theme CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/social/css/style.css') }}">

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.custom.css') }}">
        <style>
            .kls-fs-7 { font-size: 0.7rem; }
            .kls-text-secondary { color: var(--bs-secondary-text-emphasis); }
            .btn-check:checked + .btn-secondary-soft, :not(.btn-check) + .btn-secondary-soft:active, .btn-secondary-soft:first-child:active, .btn-secondary-soft.active, .btn-secondary-soft.show { color: #fff!important; background-color: #14191e !important; border-color: #14191e !important; }
            [data-bs-theme=dark] .btn-check:checked + .btn-secondary-soft, [data-bs-theme=dark] :not(.btn-check) + .btn-secondary-soft:active, [data-bs-theme=dark] .btn-secondary-soft:first-child:active, [data-bs-theme=dark] .btn-secondary-soft.active, [data-bs-theme=dark] .btn-secondary-soft.show { color: var(--bs-body-bg)!important; background-color: rgba(var(--bs-secondary-rgb)) !important; border-color: transparent !important; }
            #zuck-modal-content .story-viewer .tip {text-transform: inherit!important;}
        </style>

        <title>
@if (!empty($page_title))
            {{ $page_title }}
@else
            Kulisha
@endif
        </title>

    </head>

    <body>
        <!-- Pre loader -->
        <div class="preloader perfect-scrollbar">
            <div class="preloader-item">
                <div class="spinner-grow text-primary"></div>
            </div>
        </div>

        <!-- Responsive navbar toggler -->
        <button class="close-navbar-toggler navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"></button>

@include('layouts.navigation')

        <!-- **************** MAIN CONTENT START **************** -->
        <main>
            <!-- Container START -->
            <div class="container">
                <div id="content" class="row g-4" style="min-height: 40rem;">

@yield('app-content')

                </div>
            </div>
            <!-- Container END -->
        </main>
        <!-- **************** MAIN CONTENT END **************** -->


        <!-- **************** MODALS START **************** -->
@if (Route::is('home'))
        <!-- Modal create story START -->
        <div class="modal fade" id="modalCreateStory" tabindex="-1" aria-labelledby="modalLabelCreateStory" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content overflow-x-hidden overflow-y-scroll">
                    <div id="newStory">
                        <!-- Modal story header START -->
                        <div class="modal-header pb-0 border-bottom-0"></div>
                        <!-- Modal story header END -->

                        <!-- Modal story body START -->
                        <div class="modal-body p-0 overflow-x-hidden">
                            <button type="button" class="btn-close btn-secondary-soft p-3 rounded-circle position-fixed" data-bs-dismiss="modal" aria-label="@lang('miscellaneous.close')" style="top: 10px; right: 20px;"></button>
                            <button id="upload-record" class="btn btn-danger rounded-pill px-2 py-0 rounded-circle position-fixed d-none" style="top: 10px; right: 20px; width: 45px; height: 45px; z-index: 10;" data-bs-toggle="tooltip" title="@lang('miscellaneous.public.home.stories.commands.return')">
                                <i class="bi bi-arrow-left-short fs-3 align-middle"></i>
                            </button>
                            <div class="mb-1 position-fixed" style="top: 10px; left: 20px;">
                                <!-- All commands to edit story -->
                                <div class="commands">
                                    <div class="d-inline-block me-2">
                                        <button id="upload-record" class="btn btn-sm btn-warning rounded-pill rounded-circle" style="padding: 9px 14px 10px 14px;">
                                            <i class="bi bi-upload fs-6 me-lg-1 align-middle"></i>
                                            <span class="d-lg-inline d-none">@lang('miscellaneous.public.home.stories.commands.upload_record')</span>
                                        </button>
                                    </div>
                                    <div class="d-inline-block me-2">
                                        <button id="add-text" class="btn btn-sm btn-warning rounded-pill rounded-circle" style="padding: 9px 13px 10px 13px;">
                                            <i class="bi bi-input-cursor-text fs-6 me-lg-1 align-middle"></i>
                                            <span class="d-lg-inline d-none">@lang('miscellaneous.public.home.stories.commands.add_text')</span>
                                        </button>
                                    </div>
                                    <div class="d-inline-block me-2">
                                        <button id="edit-image" class="btn btn-sm btn-warning rounded-pill rounded-circle" style="padding: 9px 13px 10px 13px;">
                                            <i class="bi bi-pencil-fill fs-6 me-lg-1 align-middle"></i>
                                            <span class="d-lg-inline d-none">@lang('miscellaneous.public.home.stories.commands.edit')</span>
                                        </button>
                                    </div>
                                    <div class="d-inline-block me-2">
                                        <button id="object" class="btn btn-sm btn-warning rounded-pill rounded-circle" style="padding: 9px 13px 10px 13px;">
                                            <i class="bi bi-emoji-smile fs-6 me-lg-1 align-middle"></i>
                                            <span class="d-lg-inline d-none">@lang('miscellaneous.public.home.stories.commands.object')</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Upload or record image -->
                                <div class="upload-record d-none">
                                    <div class="d-inline-block me-2">
                                        <label role="button" for="photo_story" class="btn btn-sm btn-primary rounded-pill rounded-circle" style="padding: 9px 13px 10px 13px;">
                                            <i class="bi bi-image fs-6 me-lg-1 align-middle"></i>
                                            <span class="d-lg-inline d-none">@lang('miscellaneous.public.home.stories.type.photo')</span>
                                            <input type="file" name="photo_story" id="photo_story" class="d-none">
                                        </label>
                                        <input type="hidden" name="data_photo_story" id="data_photo_story">
                                    </div>
                                    <div class="d-inline-block me-2">
                                        <label role="button" for="video_story" class="btn btn-sm btn-primary rounded-pill rounded-circle" style="max-height: 43px; padding: 7px 11px 10px 11px;">
                                            <i class="bi bi-play-fill fs-5 align-middle"></i>
                                            <span class="d-lg-inline d-none">@lang('miscellaneous.public.home.stories.type.video')</span>
                                            <input type="file" name="video_story" id="video_story" class="d-none">
                                        </label>
                                        <input type="hidden" name="data_video_story" id="data_video_story">
                                    </div>
                                    <div class="d-inline-block me-2">
                                        <button id="camera_story" class="btn btn-sm btn-primary rounded-pill rounded-circle" style="padding: 10px 13px 10px 13px;">
                                            <i class="bi bi-camera-video fs-6 me-lg-1 align-middle"></i>
                                            <span class="d-lg-inline d-none">@lang('miscellaneous.public.home.stories.type.camera')</span>
                                        </button>
                                    </div>
                                    <div class="d-inline-block me-2">
                                        <button id="live_story" class="btn btn-sm btn-primary rounded-pill rounded-circle" style="padding: 10px 13px 10px 13px;">
                                            <i class="bi bi-broadcast fs-6 me-lg-1 align-middle"></i>
                                            <span class="d-lg-inline d-none">@lang('miscellaneous.public.home.stories.type.live')</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Edit text -->
                                <div class="add-text d-flex justify-content-center align-items-center flex-column position-fixed w-100 pe-lg-3 d-none" style="background: rgba(10, 10, 10, 0.5); height: 110vh; top: -20px; left: 0; z-index: 9;">
                                    <div id="text-tools" class="mb-3">
                                        <button class="btn text-white p-0 text_left" data-bs-toggle="tooltip" title="@lang('miscellaneous.edit_text.left')">
                                            <i class="bi bi-text-left fs-3"></i>
                                        </button>
                                        <button class="btn text-success mx-1 p-0 text_center" data-bs-toggle="tooltip" title="@lang('miscellaneous.edit_text.center')">
                                            <i class="bi bi-text-center fs-3"></i>
                                        </button>
                                        <button class="btn text-white p-0 text_right" data-bs-toggle="tooltip" title="@lang('miscellaneous.edit_text.right')">
                                            <i class="bi bi-text-right fs-3"></i>
                                        </button>
                                        <button class="btn text-white mx-1 p-0 text_bold" data-bs-toggle="tooltip" title="@lang('miscellaneous.edit_text.bold')">
                                            <i class="bi bi-type-bold fs-3"></i>
                                        </button>
                                        <button class="btn text-white p-0 text_italic" data-bs-toggle="tooltip" title="@lang('miscellaneous.edit_text.italic')">
                                            <i class="bi bi-type-italic fs-3"></i>
                                        </button>
                                        <button class="btn text-white mx-1 p-0 text_underline" data-bs-toggle="tooltip" title="@lang('miscellaneous.edit_text.underline')">
                                            <i class="bi bi-type-underline fs-3"></i>
                                        </button>
                                        <button class="btn text-white p-0 text_strikethrough" data-bs-toggle="tooltip" title="@lang('miscellaneous.edit_text.strikethrough')">
                                            <i class="bi bi-type-strikethrough fs-3"></i>
                                        </button>
                                        <button class="btn text-white p-0 text_uppercase" data-bs-toggle="tooltip" title="@lang('miscellaneous.edit_text.lowercase')">
                                            <i class="bi bi-type fs-3"></i>
                                        </button>
                                    </div>
                                    <textarea id="story-textarea" class="bg-transparent mb-3 border-0 text-center fs-4" placeholder="@lang('miscellaneous.edit_text.placeholder')" style="max-width: 300px; max-height: 200px;"></textarea>
                                    <button class="btn btn-primary">@lang('miscellaneous.register')</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-sm-5 mx-auto">
                                    <div id="storyCanvas" class="p-3">
                                        <img src="{{ asset('assets/img/story-placeholder.png') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal story body END -->

                        <!-- Modal story footer -->
                        <div class="modal-footer row d-flex justify-content-center pt-0 border-0">
                            <div class="col-lg-3 col-sm-5 mx-auto">
                                <button id="sendStory" class="btn w-100 btn-success-soft border-0 disabled" data-bs-dismiss="modal" aria-label="Register">
                                    <i class="fa fa-paper-plane me-2"></i>@lang('miscellaneous.post')
                                </button>
                            </div>
                        </div>
                        <!-- Modal story footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal create story END -->
@endif

        <!-- Modal create post START -->
        <div class="modal fade" id="modalCreatePost" tabindex="-1" aria-labelledby="modalLabelCreatePost" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content overflow-x-hidden overflow-y-auto">
                    <form id="newPost">
                        <!-- Modal post header START -->
                        <div class="modal-header pb-0 border-bottom-0">
                            <button type="button" class="btn-close btn-secondary-soft p-3 rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal post header END -->

                        <!-- Modal post body START -->
                        <div class="modal-body pt-3">
                            <!-- Check One Post Type -->
                            <div id="newPostType" class="d-flex justify-content-sm-between justify-content-center flex-sm-row flex-column mb-3 px-3 py-2 border rounded-pill text-sm-start text-center">
                                <span class="d-inline-block">@lang('miscellaneous.public.home.posts.choose_type')</span>
                                <div class="ps-sm-0 ps-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="post-type" id="postProduct" value="product" checked>
                                        <label role="button" class="form-check-label" for="postProduct">
                                            @lang('miscellaneous.public.home.posts.type.product')
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="post-type" id="postService" value="service">
                                        <label role="button" class="form-check-label" for="postService">
                                            @lang('miscellaneous.public.home.posts.type.service')
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Add Post Text -->
                            <div class="d-flex mb-3">
                                <!-- Avatar -->
                                <div class="avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="{{ asset($current_user['profile_photo_path']) }}" alt>
                                </div>
                                <!-- Post box  -->
                                <div class="w-100">
                                    <textarea id="post-textarea" class="form-control pe-4 fs-3 lh-1 border-0" rows="3" placeholder="@lang('miscellaneous.public.home.posts.write')" onkeyup="unableSubmit(this);" autofocus></textarea>
                                </div>
                            </div>

                            <!-- Other Post Data -->
                            <div class="hstack gap-2 justify-content-center">
                                <a class="icon-md bg-success bg-opacity-10 rounded-circle text-success" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('miscellaneous.public.home.posts.other_data.image')">
                                    <i class="bi bi-image"></i>
                                </a>
                                <a class="icon-md bg-info bg-opacity-10 rounded-circle text-info" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('miscellaneous.public.home.posts.other_data.document')">
                                    <i class="bi bi-file-earmark-text"></i>
                                </a>
                                <a class="icon-md bg-danger bg-opacity-10 rounded-circle text-danger" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('miscellaneous.public.home.posts.other_data.location')">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </a>
                                <a class="icon-md bg-warning bg-opacity-10 rounded-circle text-warning" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('miscellaneous.public.home.posts.other_data.emoji')">
                                    <i class="bi bi-emoji-smile-fill"></i>
                                </a>
                            </div>

                            <!-- Select Post categories -->
                            <div class="mt-3 text-center p-3 border rounded-5">
                                <h6 class="fw-light product-type-title">@lang('miscellaneous.public.home.posts.choose_category', ['post_type' => strtolower($categories_product_type['type_name'])])</h6>
                                <h6 class="fw-light service-type-title d-none">@lang('miscellaneous.public.home.posts.choose_category', ['post_type' => strtolower($categories_service_type['type_name'])])</h6>

                                <div id="productCategories">
@foreach ($categories_product as $category)
                                    <input type="radio" class="btn-check" id="check-category-product-{{ $category['id'] }}" name="check-category" autocomplete="off" value="{{ $category['id'] }}">
                                    <label for="check-category-product-{{ $category['id'] }}" class="btn btn-secondary-soft m-2 rounded-pill" style="font-size: 10pt;">{{ $category['category_name'] }}</label>
@endforeach
                                </div>

                                <div id="serviceCategories" class="d-none">
@foreach ($categories_service as $category)
                                    <input type="radio" class="btn-check" id="check-category-service-{{ $category['id'] }}" name="check-category" autocomplete="off" value="{{ $category['id'] }}">
                                    <label for="check-category-service-{{ $category['id'] }}" class="btn btn-secondary-soft m-2 rounded-pill" style="font-size: 10pt;">{{ $category['category_name'] }}</label>
@endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Modal post body END -->

                        <!-- Modal post footer -->
                        <div class="modal-footer px-3">
                            <!-- Select visibility -->
                            <div class="row g-0 d-flex justify-content-between">
                                <div id="visibility" class="col-sm-2 col-3">
                                    <input type="hidden" name="post-visibility" id="post-visibility" value="{{ $everybody_visibility->id }}">
                                    <div class="dropdown d-inline-block" title="@lang('miscellaneous.public.home.posts.choose_visibility')" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                        <a role="button" class="text-secondary dropdown-toggle btn btn-secondary-soft py-1 px-2 rounded-pill" id="toggleVisibility" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="{{ $everybody_visibility->icon_font }} fs-6"></i>
                                        </a>

                                        <!-- Visibility dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="toggleVisibility">
@foreach ($post_visibilities as $visibility)
                                            <li>
                                                <a role="button" id="visibility-{{ $visibility['id'] }}" class="dropdown-item{{ $visibility['alias'] == 'everybody' ? ' active' : '' }}" data-icon="{{ $visibility['icon_font'] }}">
                                                    <span class="d-inline-block" style="width: 30px;"><i class="{{ $visibility['icon_font'] }}"></i></span>{{ $visibility['visibility_name'] }}
                                                </a>
                                            </li>
@endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="col-sm-10 col-9 text-sm-end">
                                <button class="send-post btn d-block w-100 btn-primary-soft disabled">
                                    <i class="bi bi-send me-1"></i> @lang('miscellaneous.post')
                                </button>
                            </div>
                        </div>
                        <!-- Modal post footer -->
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal create post END -->

        <!-- **************** MODALS END **************** -->

        <!-- ======================= JS libraries, plugins and custom scripts -->
        <!-- jQuery JS -->
        <script src="{{ asset('assets/addons/custom/jquery/js/jquery.min.js') }}"></script>
        <!-- Bootstrap JS -->
        <script src="{{ asset('assets/addons/social/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Tiny slider -->
        <script src="{{ asset('assets/addons/social/tiny-slider/dist/tiny-slider.js') }}"></script>
        <!-- PswMeter -->
        <script src="{{ asset('assets/addons/social/pswmeter/pswmeter.min.js') }}"></script>
        <!-- Overlay scrollbars -->
        <script src="{{ asset('assets/addons/social/OverlayScrollbars-master/js/OverlayScrollbars.min.js') }}"></script>
        <!-- Choices -->
        <script src="{{ asset('assets/addons/social/choices.js/public/assets/scripts/choices.min.js') }}"></script>
        <!-- Glightbox -->
        <script src="{{ asset('assets/addons/social/glightbox-master/dist/js/glightbox.min.js') }}"></script>
        <!-- Flatpickr -->
        <script src="{{ asset('assets/addons/social/flatpickr/dist/flatpickr.min.js') }}"></script>
        <!-- Plyr -->
        <script src="{{ asset('assets/addons/social/plyr/plyr.js') }}"></script>
        <!-- Dropzone -->
        <script src="{{ asset('assets/addons/social/dropzone/dist/min/dropzone.min.js') }}"></script>
        <!-- Theme Functions -->
        <script src="{{ asset('assets/js/social/functions.js') }}"></script>
        <!-- Autoresize textarea -->
        <script src="{{ asset('assets/addons/custom/autosize/js/autosize.min.js') }}"></script>
        <!-- Perfect scrollbar -->
        <script src="{{ asset('assets/addons/custom/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
        <!-- Scroll forever -->
        <script src="{{ asset('assets/addons/custom/jquery/scroll4ever/js/jquery.scroll4ever.js') }}"></script>
        <!-- Custom scripts -->
        <script src="{{ asset('assets/js/load-app-scripts.js') }}"></script>
        <!-- Facebook Reaction CSS -->
        <script src="{{ asset('assets/addons/custom/99points-facebook-reactions/facebook-reactions.js') }}"></script>
        <script src="{{ asset('assets/js/classes.js') }}"></script>
@if (Route::is('home'))
        <!-- Zuck -->
        <script src="{{ asset('assets/addons/custom/zuck.js/dist/zuck.min.js') }}"></script>
        <script src="{{ asset('assets/js/social/zuck-stories.js') }}"></script>
@endif
        <script src="{{ asset('assets/js/script.app.js') }}"></script>
        <script src="{{ asset('assets/js/navigation.js') }}"></script>
        <script type="text/javascript">
function navigate(url, element) {
    ref = element.getAttribute('data-page');

    switch (ref) {
        case 'home':
            document.title = '{{ "Kulisha / " . __("miscellaneous.menu.public.news_feed") }}'
            document.getElementById('content').innerHTML = '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img class="h-50px" src="/assets/img/cover-placeholder.png" class="card-img-top" alt>' +
                                                                        '<div class="card-body pt-0">' +
                                                                            '<div class="text-center">' +
                                                                                '<div class="avatar avatar-lg mt-n5 mb-3">' +
                                                                                    '<a><img class="avatar-img rounded border border-white border-3" src="/assets/img/avatar-placeholder.png" alt></a>' +
                                                                                '</div>' +
                                                                                '<p class="card-text placeholder-glow">' +
                                                                                    '<span class="placeholder col-7"></span>' +
                                                                                    '<span class="placeholder col-5"></span>' +
                                                                                '</p>' +
                                                                            '</div>' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                                '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                            '</div>';
            break;

        case 'discover':
            document.title = '{{ "Kulisha / " . __("miscellaneous.menu.discover") }}'
            document.getElementById('content').innerHTML = '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                        '</div>' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                                '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                            '</div>';
            break;

        case 'cart':
            document.title = '{{ "Kulisha / " . __("miscellaneous.menu.public.orders.cart.title") }}'
            document.getElementById('content').innerHTML = '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                        '</div>' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                                '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                            '</div>';
            break;

        case 'notification':
            document.title = '{{ "Kulisha / " . __("miscellaneous.menu.notifications.title") }}'
            document.getElementById('content').innerHTML = '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                        '</div>' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                                '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                            '</div>';
            break;

        case 'community':
            document.title = '{{ __("miscellaneous.menu.public.communities.title") }}'
            document.getElementById('content').innerHTML = '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                        '</div>' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                                '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                            '</div>';
            break;

        case 'event':
            document.title = '{{ __("miscellaneous.menu.public.events.title") }}'
            document.getElementById('content').innerHTML = '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                        '</div>' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                                '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                            '</div>';
            break;

        case 'message':
            document.title = '{{ __("miscellaneous.menu.messages") }}'
            document.getElementById('content').innerHTML = '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                        '</div>' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                                '<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                                '<div class="col-lg-3 mt-0">' +
                                                                    '<div class="card" aria-hidden="true">' +
                                                                        '<img src="..." class="card-img-top" alt="...">' +
                                                                        '<div class="card-body">' +
                                                                            '<h5 class="card-title placeholder-glow">' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                            '</h5>' +
                                                                            '<p class="card-text placeholder-glow">' +
                                                                                '<span class="placeholder col-7"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-4"></span>' +
                                                                                '<span class="placeholder col-6"></span>' +
                                                                                '<span class="placeholder col-8"></span>' +
                                                                            '</p>' +
                                                                            '<a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>' +
                                                                        '</div>' +
                                                                    '</div>' +
                                                                '</div>' +
                                                            '</div>';
            break;
        default:
            break;
    }

    fetch(url).then(response => {
        if (!response.ok) {
            console.error('*****Response error: ', response.status);
            throw new Error('<?= __("notifications.network_error") ?>');
        }

        console.log('*****url: ' + url);

        return response.text();

    }).then(html => {
        // Using DOMParser to parse HTML
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');

        const extractedPart1 = doc.querySelector('#partial1').innerHTML; 
        const extractedPart2 = doc.querySelector('#partial2').innerHTML; 
        const extractedPart3 = doc.querySelector('#partial3').innerHTML; 

        let columnsHtml = '';

        if (extractedPart3) {
            if (extractedPart1) {
                columnsHtml += `<div class="col-lg-3 mt-0">${extractedPart1}</div>`;
            }

            if (extractedPart2) {
                columnsHtml += `<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">${extractedPart2}</div>`;
            }

            if (extractedPart3) {
                columnsHtml += `<div class="col-lg-3 mt-0">${extractedPart3}</div>`;
            }

        } else {
            if (extractedPart1) {
                columnsHtml += `<div class="col-lg-9 mt-0">${extractedPart1}</div>`;
            }

            if (extractedPart2) {
                columnsHtml += `<div class="col-lg-3 mt-0">${extractedPart2}</div>`;
            }
        }

        // Insert columns into main content
        document.getElementById('content').innerHTML = columnsHtml;

        // Update history
        history.pushState({ url: url }, '', url);
        // loadScriptsInParallel(scripts).then(initializeComponents);
        loadScriptsInParallel(scripts).then(() => {
            initializeComponents();
            setActiveLink(element);
        }).catch(error => {
            console.error('*****Error loading scripts: ', error);
        });

        setActiveLink(element)

    }).catch(error => {
        document.getElementById('content').innerHTML = `<div class="col-sm-6 mx-auto pt-5"><div class="mt-5 bg-image d-flex justify-content-center"><img src="/assets/img/logo.png" width="160"><div class="mask"></div></div><h1 class="mb-0 text-center">${error}</h1></div>`;
    });
}

window.onpopstate = function(event) {
    if (event.state) {
        fetch(event.state.url).then(response => {
            if (!response.ok) {
                throw new Error('<?= __("notifications.network_error") ?>');
            }

            console.log('*****event.state.url: ' + event.state.url);
            console.log('*****response.text(): ' + response.text());

            return response.text();

        }).then(html => {
            // Using DOMParser to parse HTML
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');

            const extractedPart1 = doc.querySelector('#partial1').innerHTML; 
            const extractedPart2 = doc.querySelector('#partial2').innerHTML; 
            const extractedPart3 = doc.querySelector('#partial3').innerHTML; 

            let columnsHtml = '';

            if (extractedPart3) {
                if (extractedPart1) {
                    columnsHtml += `<div class="col-lg-3 mt-0">${extractedPart1}</div>`;
                }

                if (extractedPart2) {
                    columnsHtml += `<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">${extractedPart2}</div>`;
                }

                if (extractedPart3) {
                    columnsHtml += `<div class="col-lg-3 mt-0">${extractedPart3}</div>`;
                }

            } else {
                if (extractedPart1) {
                    columnsHtml += `<div class="col-lg-9 mt-0">${extractedPart1}</div>`;
                }

                if (extractedPart2) {
                    columnsHtml += `<div class="col-lg-3 mt-0">${extractedPart2}</div>`;
                }
            }

            // Insert columns into main content
            document.getElementById('content').innerHTML = columnsHtml;

            // loadScriptsInParallel(scripts).then(initializeComponents);
            loadScriptsInParallel(scripts).then(() => {
                initializeComponents();
                setActiveLink(element);
            }).catch(error => {
                console.error('*****Error loading scripts: ', error);
            });

            setActiveLink(element)

        }).catch(error => {
            console.error('*****Error while loading data: ', error);
        });

    } else {
        document.getElementById('content').innerHTML = `<div class="col-sm-6 mx-auto pt-5"><div class="mt-5 bg-image d-flex justify-content-center"><img src="/assets/img/logo.png" width="160"><div class="mask"></div></div><h1 class="mb-0 text-center"><div class="spinner-grow" role="status"><span class="visually-hidden">Loading...</span></div></h1></div>`;
    }
};

function setActiveLink(element) {
    // Retrieves the value of data-page
    const activePage = element.getAttribute('data-page');
    // All menu links
    const homeLink = document.getElementById('homeLink');
    const discoverLink = document.getElementById('discoverLink');
    const cartLink = document.getElementById('cartLink');
    const notificationLink = document.getElementById('notificationLink');
    const communityLink = document.getElementById('communityLink');
    const eventLink = document.getElementById('eventLink');
    const messageLink = document.getElementById('messageLink');
    // Each link icon
    const iconHome = homeLink.querySelector('i');
    const iconDiscover = discoverLink.querySelector('i');
    const iconCart = cartLink.querySelector('i');
    const iconNotification = notificationLink.querySelector('i');
    const iconCommunity = communityLink.querySelector('i');
    const iconEvent = eventLink.querySelector('i');
    const iconMessage = messageLink.querySelector('i');

    // Removes the "active" class from all links
    homeLink.classList.remove('active'); 
    discoverLink.classList.remove('active'); 
    cartLink.classList.remove('active'); 
    notificationLink.classList.remove('active'); 
    communityLink.classList.remove('active'); 
    eventLink.classList.remove('active'); 
    messageLink.classList.remove('active'); 
    // Reset the icons to their default states
    iconHome.classList.remove('bi-house-fill');
    iconHome.classList.add('bi-house');
    iconDiscover.classList.remove('bi-compass-fill');
    iconDiscover.classList.add('bi-compass');
    iconCart.classList.remove('bi-basket3-fill');
    iconCart.classList.add('bi-basket3');
    iconNotification.classList.remove('bi-bell-fill');
    iconNotification.classList.add('bi-bell');
    iconCommunity.classList.remove('bi-people-fill');
    iconCommunity.classList.add('bi-people');
    iconEvent.classList.remove( 'bi-calendar-event-fill');
    iconEvent.classList.add('bi-calendar-event');
    iconMessage.classList.remove('bi-chat-quote-fill');
    iconMessage.classList.add('bi-chat-quote');

    switch (activePage) {
        case 'home':
            homeLink.classList.add('active');
            iconHome.classList.add('bi-house-fill');
            iconHome.classList.remove('bi-house');
            break;

        case 'discover':
            discoverLink.classList.add('active');
            iconDiscover.classList.add('bi-compass-fill');
            iconDiscover.classList.remove('bi-compass');
            break;

        case 'cart':
            cartLink.classList.add('active');
            iconCart.classList.add('bi-basket3-fill');
            iconCart.classList.remove('bi-basket3');
            break;

        case 'notification':
            notificationLink.classList.add('active');
            iconNotification.classList.add('bi-bell-fill');
            iconNotification.classList.remove('bi-bell');
            break;

        case 'community':
            communityLink.classList.add('active');
            iconCommunity.classList.add('bi-people-fill');
            iconCommunity.classList.remove('bi-people');
            break;

        case 'event':
            eventLink.classList.add('active');
            iconEvent.classList.add('bi-calendar-event-fill');
            iconEvent.classList.remove('bi-calendar-event');
            break;

        case 'message':
            messageLink.classList.add('active');
            iconMessage.classList.add('bi-chat-quote-fill');
            iconMessage.classList.remove('bi-chat-quote');
            break;

        default:
            break;
    }
}
            // Initiate the reactions
            $('.FB_reactions').facebookReactions();

            /**
             * Functions
             */
            // Unable "submit" button
            function unableSubmit(element) {
                if (element.value.trim() === '') {
                    $('#newPost .send-post').removeClass('btn-primary');
                    $('#newPost .send-post').addClass('btn-primary-soft');
                    $('#newPost .send-post').addClass('disabled');

                } else {
                    $('#newPost .send-post').removeClass('disabled');
                    $('#newPost .send-post').removeClass('btn-primary-soft');
                    $('#newPost .send-post').addClass('btn-primary');
                }
            }

            $(function () {
                // Toggle post type
                $('#newPostType .form-check').each(function () {
                    $(this).on('click', function () {
                        $('[id^="check-category-"]').prop('checked', false);

                        if ($('#postService').is(':checked')) {
                            $('#serviceCategories, .service-type-title').removeClass('d-none');
                            $('#productCategories, .product-type-title').addClass('d-none');

                        } else {
                            $('#serviceCategories, .service-type-title').addClass('d-none');
                            $('#productCategories, .product-type-title').removeClass('d-none');
                        }
                    });
                });
                // Toggle visibility
                $('#visibility li a').each(function () {
                    $(this).on('click', function () {
                        var visibilityIcon = $(this).attr('data-icon');
                        var visibilityData = $(this).attr('id');
                        var visibilityDataArray = visibilityData.split('-');

                        // Change visibility
                        $('#post-visibility').val(visibilityDataArray[1]);
                        $('#toggleVisibility').html(`<i class="${visibilityIcon} fs-6"></i>`);
                    });
                });
            });
        </script>
    </body>
</html>
