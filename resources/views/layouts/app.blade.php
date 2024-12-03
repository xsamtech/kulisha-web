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
        <meta name="kls-visitor" content="{{ $current_user['id'] }}">
        <meta name="kls-ip" content="{{ Request::ip() }}">
        <meta name="kls-emoji-ref" content="{{ config('services.open_emoji.api_key') }}">
        <meta name="kls-ref" content="{{ $current_user['api_token'] }}">
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

        <!-- Plugins -->
        {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"> --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/font-awesome/css/all.min.css') }}">
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> --}}
        <link rel="stylesheet" href="{{ asset('assets/addons/social/bootstrap-icons/bootstrap-icons.min.css') }}">

        <!-- Material Design for Boostrap -->
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/custom/mdb/css/mdb.min.css') }}"> --}}
        <!-- Overlay Scrollbars -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/OverlayScrollbars-master/css/OverlayScrollbars.min.css') }}">
        <!-- Tiny Slider -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/tiny-slider/dist/tiny-slider.css') }}">
        <!-- Choices -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/choices.js/public/assets/styles/choices.min.css') }}">
        <!-- Glightbox -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/glightbox-master/dist/css/glightbox.min.css') }}">
        <!-- Dropzone -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/dropzone/dist/min/dropzone.min.css') }}">
        <!-- Flatpickr -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/flatpickr/dist/flatpickr.min.css') }}">
        <!-- CropperJS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/custom/cropper/css/cropper.min.css') }}">
        <!-- Quill -->
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
        <!-- Plyr -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/social/plyr/plyr.css') }}">
        <!-- Zuck -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/custom/zuck.js/dist/zuck.min.css') }}">
        <!-- Theme -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/social/css/style.css') }}">
        <!-- Custom -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.custom.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/reactions.css') }}">

        <style>
            .btn, .btn-close { transition: .5s ease all; }
            .kls-fs-7 { font-size: 0.7rem; }
            .kls-text-secondary { color: var(--bs-secondary-text-emphasis); }
            .kls-border-default { border-color: rgba(0, 0, 0, 0.1)!important; }
            [data-bs-theme=dark] .kls-border-default { border-color: #29292e!important; }
            .btn-check:checked + .btn-secondary-soft, :not(.btn-check) + .btn-secondary-soft:active, .btn-secondary-soft:first-child:active, .btn-secondary-soft.active, .btn-secondary-soft.show { color: #fff!important; background-color: #14191e !important; border-color: #14191e !important; }
            [data-bs-theme=dark] .btn-check:checked + .btn-secondary-soft, [data-bs-theme=dark] :not(.btn-check) + .btn-secondary-soft:active, [data-bs-theme=dark] .btn-secondary-soft:first-child:active, [data-bs-theme=dark] .btn-secondary-soft.active, [data-bs-theme=dark] .btn-secondary-soft.show { color: var(--bs-body-bg)!important; background-color: rgba(var(--bs-secondary-rgb)) !important; border-color: transparent !important; }
            #zuck-modal-content .story-viewer .tip { text-transform: inherit!important; }
            @media (min-width: 768px) {
                #addEndDateHour > .btn { margin-top: 0.7rem; }
                #modalCreatePost .modal-body, #newEventModal .modal-body, #pollModal .modal-body { max-height: 370px; }
            }
            /* Emojis */
            .emoji-dropdown { display: none; position: absolute; width: 300px; max-height: 250px; background-color: white; padding: 5px; border: 1px solid #ccc; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden; overflow-y: auto; }
            [data-bs-theme=dark] .emoji-dropdown { background-color: var(--bs-black); border: 1px solid var(--bs-black); }
            .emoji { font-size: 24px; cursor: pointer; padding: 5px; margin: 5px; }
            .emoji:hover { background-color: #f0f0f0; }
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

        <!-- Responsive navbar toggler -->
        <div id="successMessageWrapper" class="position-fixed w-100 top-0 start-0 d-none" style="z-index: 99999; transition: opacity 1s ease-out;">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-11 mx-auto">
                    <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
                        <i class="bi bi-info-circle me-3 fs-5"></i>
                        <div class="custom-message"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
        <div id="warningMessageWrapper" class="position-fixed w-100 top-0 start-0 d-none" style="z-index: 99999; transition: opacity 1s ease-out;">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-11 mx-auto">
                    <div class="alert alert-warning alert-dismissible d-flex align-items-center" role="alert">
                        <i class="bi bi-exclamation-triangle me-3 fs-5"></i>
                        <div class="custom-message"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
        <div id="errorMessageWrapper" class="position-fixed w-100 top-0 start-0 d-none" style="z-index: 99999; transition: opacity 1s ease-out;">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-11 mx-auto">
                    <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                        <i class="bi bi-exclamation-triangle me-3 fs-5"></i>
                        <div class="custom-message"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>

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
        <!-- jQuery -->
        <script src="{{ asset('assets/addons/custom/jquery/js/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
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
        <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/l10n/fr.js"></script>
        <!-- CropperJS -->
        <script src="{{ asset('assets/addons/custom/cropper/js/cropper.min.js') }}"></script>
        <!-- Quill -->
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
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
        <!-- PDF.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
        <!-- Custom scripts -->
@include('layouts.injected_datas')
        <script src="{{ asset('assets/js/load-app-scripts.js') }}"></script>
        <script src="{{ asset('assets/js/classes.js') }}"></script>
@if (Route::is('home'))
        <!-- Zuck -->
        <script src="{{ asset('assets/addons/custom/zuck.js/dist/zuck.min.js') }}"></script>
        <script src="{{ asset('assets/js/social/zuck-stories.js') }}"></script>
@endif
        <script src="{{ asset('assets/js/script.app.js') }}"></script>
        <script type="text/javascript">
            // Run some scripts on DOM content is loaded
            document.addEventListener('DOMContentLoaded', function() {
                handleEmoji('selectEmoji', 'post-textarea', '#modalCreatePost [type="submit"]');
                toggleSubmitCheckboxes('modalSelectRestrictions .users-list', 'sendCheckedUsers1');
                toggleSubmitCheckboxes('modalSelectSpeakers .users-list', 'sendCheckedUsers2');
            });

            $(function () {
                // --------------
                // XII. Send post
                // --------------
                $('form#newPost').submit(function (e) { 
                    e.preventDefault();

                    var formData = new FormData(this);
                    var post = new Post();

                    post.setUniqueVariables(
                        null, null, formData.get('post_content'),
                        null, (price ? price.value : null), (currency ? currency.value : null),
                        (quantity ? quantity.value : null), (answeredFor ? answeredFor.value : null), (latitude ? latitude.value : null),
                        (longitude ? longitude.value : null), (city ? city.value : null), (region ? region.value : null), (country ? country.value : null),
                        (typeId ? typeId.value : null), (categoryId ? categoryId.value : null), (statusId ? statusId.value : null),
                        (visibilityId ? visibilityId.value : null), (coverageAreaId ? coverageAreaId.value : null), (budgetId ? budgetId.value : null),
                        (communityId ? communityId.value : null), (eventId ? eventId.value : null), (userId ? userId.value : null)
                    );
                    console.log(formData.get('post_content'));

                });

                // ---------------
                // XIII. Reactions
                // ---------------
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
        <script src="{{ asset('assets/js/navigation.js') }}"></script>
    </body>
</html>
