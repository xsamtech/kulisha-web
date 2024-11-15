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
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/reactions.css') }}">

        <style>
            .kls-fs-7 { font-size: 0.7rem; }
            .kls-text-secondary { color: var(--bs-secondary-text-emphasis); }
            .btn-check:checked + .btn-secondary-soft, :not(.btn-check) + .btn-secondary-soft:active, .btn-secondary-soft:first-child:active, .btn-secondary-soft.active, .btn-secondary-soft.show { color: #fff!important; background-color: #14191e !important; border-color: #14191e !important; }
            [data-bs-theme=dark] .btn-check:checked + .btn-secondary-soft, [data-bs-theme=dark] :not(.btn-check) + .btn-secondary-soft:active, [data-bs-theme=dark] .btn-secondary-soft:first-child:active, [data-bs-theme=dark] .btn-secondary-soft.active, [data-bs-theme=dark] .btn-secondary-soft.show { color: var(--bs-body-bg)!important; background-color: rgba(var(--bs-secondary-rgb)) !important; border-color: transparent !important; }
            /* Stories */
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
@include('layouts.modals')
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
            /**
             * Native functions
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

            /**
             * jQuery data
             */
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
                        var isChecked = $(this).find('.is-checked');
                        var alias = $(this).data('alias');

                        $('#visibility li a .is-checked').removeClass('opacity-100').addClass('opacity-0');
                        isChecked.removeClass('opacity-0').addClass('opacity-100');
                        $('#visibility li a').removeClass('active');
                        $(this).addClass('active');

                        var visibilityIcon = $(this).attr('data-icon');
                        var visibilityData = $(this).attr('id');
                        var visibilityDataArray = visibilityData.split('-');

                        // Change visibility
                        $('#post-visibility').val(visibilityDataArray[1]);
                        $('#toggleVisibility').html(`<i class="${visibilityIcon} fs-6"></i>`);

                        // Choose restrictions from users list
                        if (alias === 'everybody_except' || alias === 'nobody_except') {
                            // Create an instance of the User class
                            const userModal = new User('modalCreatePost', 'modalSelectRestrictions', 'modalSelectRestrictions .user-list', 'modalSelectRestrictions .loading-spinner');

                            // Opens the modal and loads users
                            userModal.openModal();
                        }
                    });
                });

                // Reactions
                $('.reaction-btn').each(function () {
                    var reactionIcon = $(this).find('.reaction-icon');
                    var currentReaction = $(this).find('.current-reaction');
                    var currentReactionData = currentReaction.attr('data-current-reaction');
                    var reactionName = $(this).find('.reaction-name');

                    $(this).hover(function() {
                        reactionIcon.each(function(i, e) {
                            setTimeout(function() {
                                $(e).addClass('show');
                            }, i * 100);
                        });
                    }, function() {
                        reactionIcon.removeClass('show');
                    });

                    $(this).on('click', '.reaction-icon', function() {
                        var reactionIconDataId = $(this).attr('data-reaction-id');
                        var reactionIconDataAlias = $(this).attr('data-reaction-alias');
                        var reactionIconDataName = $(this).attr('data-reaction-name');
                        var reactionIconDataColor = $(this).attr('data-reaction-color');

                        currentReaction.html(`<img src="${currentHost}/assets/img/reaction/${reactionIconDataAlias}.png" alt="">`);
                        currentReaction.attr('data-current-reaction', currentReactionData);
                        reactionName.html(reactionIconDataName);
                        reactionName.css('color', reactionIconDataColor);
                    });

                    $(this).on('click', function(e) {
                        e.stopPropagation();

                        // if (currentReactionData.trim() !== null) {
                        //     $(currentReaction).html('<i class="fa-solid fa-thumbs-up"></i>');
                        //     $(reactionName).html(`<?= __('miscellaneous.like') ?>`);
                        // }

                        reactionIcon.each(function(i, e) {
                            setTimeout(function() {
                                $(e).addClass('show');
                            }, i * 100);
                        });
                    });
                });
            });
        </script>
    </body>
</html>
