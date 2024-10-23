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
        <!-- Modal create story START -->
        <div class="modal fade" id="modalCreateStory" tabindex="-1" aria-labelledby="modalLabelCreateStory" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <form id="newPost">
                        <!-- Modal story header START -->
                        <div class="modal-header pb-0 border-bottom-0">
                            <button type="button" class="btn-close btn-secondary-soft p-3 rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal story header END -->

                        <!-- Modal story body START -->
                        <div class="modal-body pt-3">

                        </div>
                        <!-- Modal story body END -->

                        <!-- Modal story footer -->
                        <div class="modal-footer px-3 row justify-content-between">
                            <!-- Button -->
                            <div class="col-lg-6 text-sm-end">
                                <button type="submit" class="btn d-block w-100 btn-primary disabled">
                                    <i class="bi bi-send me-1"></i> @lang('miscellaneous.post')
                                </button>
                            </div>
                        </div>
                        <!-- Modal story footer -->
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal create story END -->

        <!-- Modal create post START -->
        <div class="modal fade" id="modalCreatePost" tabindex="-1" aria-labelledby="modalLabelCreatePost" aria-hidden="true">
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
        <script src="{{ asset('assets/js/classes.js') }}"></script>
@if (Route::is('home'))
        <!-- Zuck -->
        <script src="{{ asset('assets/addons/custom/zuck.js/dist/zuck.min.js') }}"></script>
        <script src="{{ asset('assets/js/social/zuck-stories.js') }}"></script>
@endif
        <script src="{{ asset('assets/js/script.app.js') }}"></script>
        <script src="{{ asset('assets/js/navigation.js') }}"></script>
        <script type="text/javascript">
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
