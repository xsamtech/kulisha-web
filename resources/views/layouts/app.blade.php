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
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/zuck.js/dist/zuck.min.css') }}">

        <!-- Theme CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/social/css/style.css') }}">

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.custom.css') }}">
        <style>
            .kls-fs-7 { font-size: 0.7rem; }
            .kls-text-secondary { color: var(--bs-secondary-text-emphasis); }
            .btn-check:checked + .btn-secondary-soft, :not(.btn-check) + .btn-secondary-soft:active, .btn-secondary-soft:first-child:active, .btn-secondary-soft.active, .btn-secondary-soft.show { color: #fff!important; background-color: #14191e !important; border-color: #14191e !important; }
            [data-bs-theme=dark] .btn-check:checked + .btn-secondary-soft, [data-bs-theme=dark] :not(.btn-check) + .btn-secondary-soft:active, [data-bs-theme=dark] .btn-secondary-soft:first-child:active, [data-bs-theme=dark] .btn-secondary-soft.active, [data-bs-theme=dark] .btn-secondary-soft.show { color: var(--bs-body-bg)!important; background-color: rgba(var(--bs-secondary-rgb)) !important; border-color: transparent !important; }
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


        <!-- Modal create post START -->
        <div class="modal fade" id="modalCreateFeed" tabindex="-1" aria-labelledby="modalLabelCreateFeed" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <form id="newPost">
                        <!-- Modal post header START -->
                        <div class="modal-header pb-0 border-bottom-0">
                            <button type="button" class="btn-close btn-secondary-soft p-3 rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal post header END -->

                        <!-- Modal post body START -->
                        <div class="modal-body pt-3">
                            <!-- Check One Post Type -->
                            <div id="newPostType" class="mb-3 px-3 py-2 border rounded-pill">
                                <span class="d-inline-block me-3">@lang('miscellaneous.public.home.posts.choose_type')</span>
                                <div class="form-check form-check-inline float-end">
                                    <input class="form-check-input" type="radio" name="post-type" id="postService" value="service">
                                    <label role="button" class="form-check-label" for="postService">
                                        @lang('miscellaneous.public.home.posts.type.service')
                                    </label>
                                </div>
                                <div class="form-check form-check-inline float-end">
                                    <input class="form-check-input" type="radio" name="post-type" id="postProduct" value="product" checked>
                                    <label role="button" class="form-check-label" for="postProduct">
                                        @lang('miscellaneous.public.home.posts.type.product')
                                    </label>
                                </div>
                            </div>

                            <!-- Add Post Text -->
                            <div class="d-flex mb-3">
                                <!-- Avatar -->
                                <div class="avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="{{ asset('assets/img/template/avatar/07.jpg') }}" alt>
                                </div>
                                <!-- Post box  -->
                                <div class="w-100">
                                    <textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="3" placeholder="@lang('miscellaneous.public.home.posts.write')" autofocus></textarea>
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
                            <div class="mt-3 text-center">
                                <div id="productCategories">
                                    <input type="checkbox" class="btn-check" id="check-category-product-1" name="check-category-product-1" autocomplete="off" value="1">
                                    <label for="check-category-product-1" class="small btn btn-secondary-soft m-2 rounded-pill">Matériel d’agriculture</label>

                                    <input type="checkbox" class="btn-check" id="check-category-product-2" name="check-category-product-2" autocomplete="off" value="2">
                                    <label for="check-category-product-2" class="small btn btn-secondary-soft m-2 rounded-pill">Plante et semence</label>

                                    <input type="checkbox" class="btn-check" id="check-category-product-3" name="check-category-product-3" autocomplete="off" value="3">
                                    <label for="check-category-product-3" class="small btn btn-secondary-soft m-2 rounded-pill">Produit transformé</label>

                                    <input type="checkbox" class="btn-check" id="check-category-product-4" name="check-category-product-4" autocomplete="off" value="4">
                                    <label for="check-category-product-4" class="small btn btn-secondary-soft m-2 rounded-pill">Produit extrait</label>

                                    <input type="checkbox" class="btn-check" id="check-category-product-5" name="check-category-product-5" autocomplete="off" value="5">
                                    <label for="check-category-product-5" class="small btn btn-secondary-soft m-2 rounded-pill">Produit rafffiné</label>

                                    <input type="checkbox" class="btn-check" id="check-category-product-6" name="check-category-product-6" autocomplete="off" value="6">
                                    <label for="check-category-product-6" class="small btn btn-secondary-soft m-2 rounded-pill">Traitement des plantes</label>
                                </div>

                                <div id="serviceCategories" class="d-none">
                                    <input type="checkbox" class="btn-check" id="check-category-service-1" name="check-category-service-1" autocomplete="off" value="20">
                                    <label for="check-category-service-1" class="small btn btn-secondary-soft m-2 rounded-pill">Transport et livraison</label>

                                    <input type="checkbox" class="btn-check" id="check-category-service-2" name="check-category-service-2" autocomplete="off" value="21">
                                    <label for="check-category-service-2" class="small btn btn-secondary-soft m-2 rounded-pill">Stockage et conservation</label>

                                    <input type="checkbox" class="btn-check" id="check-category-service-3" name="check-category-service-3" autocomplete="off" value="22">
                                    <label for="check-category-service-3" class="small btn btn-secondary-soft m-2 rounded-pill">Transformation et raffinerie</label>

                                    <input type="checkbox" class="btn-check" id="check-category-service-4" name="check-category-service-4" autocomplete="off" value="23">
                                    <label for="check-category-service-4" class="small btn btn-secondary-soft m-2 rounded-pill">Gastronomie bio</label>
                                </div>
                            </div>
                        </div>
                        <!-- Modal post body END -->

                        <!-- Modal post footer -->
                        <div class="modal-footer px-3 row justify-content-between">
                            <!-- Select -->
                            <div class="col-lg-4">
                                <input type="hidden" id="post-visibility" name="post-visibility" value="everybody">
                                <div class="dropdown d-inline-block" title="@lang('miscellaneous.public.home.posts.choose_visibility')" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                    <a role="button" class="text-secondary dropdown-toggle btn btn-secondary-soft py-1 px-2 rounded-pill" id="toggleVisibility" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-globe-europe-africa fs-6"></i>
                                    </a>

                                    <!-- Visibility dropdown menu -->
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="toggleVisibility">
                                        <li>
                                            <a role="button" class="dropdown-item everybody"><i class="bi bi-globe-europe-africa me-2"></i>Tout le monde</a>
                                        </li>
                                        <li>
                                            <a role="button" class="dropdown-item incognito"><i class="bi bi-incognito me-2"></i>Moi uniquement</a>
                                        </li>
                                        <li>
                                            <a role="button" class="dropdown-item everybody_except"><i class="fa-solid fa-users-gear me-2"></i>Tout le monde, sauf ...</a>
                                        </li>
                                        <li>
                                            <a role="button" class="dropdown-item nobody_except"><i class="fa-solid fa-user-gear me-2"></i>Personne, sauf …</a>
                                        </li>
                                        <li>
                                            <a role="button" class="dropdown-item connections_only"><i class="fa-solid fa-user-check me-2"></i>Mes connexions uniquement</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="col-lg-6 text-sm-end">
                                <button type="submit" class="btn d-block w-100 btn-primary disabled">
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
        <!-- Zuck -->
        <script src="{{ asset('assets/addons/social/zuck.js/dist/zuck.min.js') }}"></script>
        <script src="{{ asset('assets/js/social/zuck-stories.js') }}"></script>
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
        <script src="{{ asset('assets/js/script.app.js') }}"></script>
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
                        throw new Error('<?= __("notifications.network_error") ?>');
                    }

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
					loadScriptsInParallel(scripts);
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

                        loadScriptsInParallel(scripts);
                        setActiveLink(element)

                    }).catch(error => {
                        console.error('Erreur lors du chargement :', error);
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

            $(function () {
                $('#newPostType .form-check').each(function () {
                    $(this).on('click', function () {
                        $('[id^="check-category-"]').prop('checked', false);

                        if ($('#postService').is(':checked')) {
                            $('#serviceCategories').removeClass('d-none');
                            $('#productCategories').addClass('d-none');

                        } else {
                            $('#serviceCategories').addClass('d-none');
                            $('#productCategories').removeClass('d-none');
                        }
                    });
                });
            });
        </script>
    </body>
</html>
