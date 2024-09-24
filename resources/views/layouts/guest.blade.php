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
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/custom/mdb/css/mdb.min.css') }}">

        <!-- Theme CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/social/css/style.css') }}">

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.custom.css') }}">

        <title>
@if (!empty($exception))
            {{ $exception->getStatusCode() . ' - ' . __('notifications.' . $exception->getStatusCode() . '_title') }}
@endif
@if (!empty($view_title))
            {{ $view_title }}
@endif
@if (!empty($error_title) || \Session::has('error_message') || \Session::has('error_message_login'))
            {{ !empty($error_title) ? $error_title : (\Session::has('error_message_login') ? preg_match('/~/', \Session::get('error_message_login')) ? explode(', ', explode('~', \Session::get('error_message_login'))[0])[2] : \Session::get('error_message_login') : (\Session::has('error_message') ? (preg_match('/~/', \Session::get('error_message')) ? explode('-', explode('~', \Session::get('error_message'))[0])[2] : \Session::get('error_message')) : '')) }}
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

        <!-- **************** MAIN CONTENT START **************** -->
        <main class="py-5">
            <!-- Container START -->
            <div class="container">
                <div id="successMessageWrapper" class="position-fixed w-100 top-0 start-0 z-index-99 d-none">
                    <div class="row">
                        <div class="col-lg-5 col-sm-6 col-11 mx-auto">
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <i class="bi bi-info-circle me-3 fs-5"></i>
                                <div class="custom-message"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="errorMessageWrapper" class="position-fixed w-100 top-0 start-0 z-index-99 d-none">
                    <div class="row">
                        <div class="col-lg-5 col-sm-6 col-11 mx-auto">
                            <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                                <i class="bi bi-exclamation-triangle me-3 fs-5"></i>
                                <div class="custom-message"></div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row{{ empty($exception) ? ' d-lg-none' : ''}} mb-4">
                    <div class="col-lg-3 col-sm-4 col-8 mx-auto">
                        <div class="bg-image">
                            <img src="{{ asset('assets/img/brand.png') }}" alt="Kulisha" class="img-fluid kulisha-brand">
                            <div class="mask"><a href="{{ route('home') }}"></a></div>
                        </div>
                    </div>
                </div>

@yield('guest-content')

            </div>
            <!-- Container END -->
        </main>
        <!-- **************** MAIN CONTENT END **************** -->

        <!-- =======================Footer START -->
        <footer class="pt-2 pb-4 position-relative bg-mode">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 small">
                        <div class="d-grid d-sm-flex justify-content-center justify-content-sm-between align-items-top mt-3">
                            <!-- Copyright -->
                            <p class="mb-3">&copy {{ date('Y') }} <a target="_blank" href="https://xsamtech.com/">Xsam Technologies</a> @lang('miscellaneous.all_right_reserved')</p>

                            <!-- Theme toggle -->
                            <div class="d-flex justify-content-center mb-3">
                                <div role="group" id="themeToggler" class="btn-group shadow-0" aria-label="Theme toggler">
                                    <button type="button" class="btn btn-light light"  data-mdb-ripple-init><i class="bi bi-sun"></i></button>
                                    <button type="button" class="btn btn-light dark"  data-mdb-ripple-init><i class="bi bi-moon-fill"></i></button>
                                    <button type="button" class="btn btn-light auto"  data-mdb-ripple-init><i class="bi bi-circle-half"></i></button>
                                </div>
                            </div>

                            <!-- Useful links -->
                            <ul class="nav">
                                <li class="nav-item"><a class="nav-link fw-bold ps-0 pe-2" href="#">@lang('miscellaneous.menu.terms_of_use')</a></li>
                                <li class="nav-item"><a class="nav-link fw-bold px-2" href="#">@lang('miscellaneous.menu.privacy_policy')</a></li>
                                <li class="nav-item"><a class="nav-link fw-bold ps-2" href="#">@lang('miscellaneous.menu.cookies')</a></li>
                                <li class="nav-item dropup">
                                    <a role="button" id="dropdownLanguage" class="nav-link fw-bold ps-2 pe-0" data-bs-toggle="dropdown" aria-expanded="false">
                                        @lang('miscellaneous.your_language') <i class="fa-solid fa-angle-down"></i>
                                    </a>

                                    <ul class="dropdown-menu mt-1 p-0" aria-labelledby="dropdownLanguage" style="max-height: 20rem;">
@foreach ($available_locales as $locale_name => $available_locale)
                                        <li class="w-100">
    @if ($available_locale != $current_locale)
                                            <a class="dropdown-item px-3 py-2" href="{{ route('change_language', ['locale' => $available_locale]) }}">
                                                {{ $locale_name }}
                                            </a>
    @else
                                            <span class="dropdown-item px-3 py-2 kls-lime-green-text">
                                                {{ $locale_name }}
                                            </span>
    @endif
                                        </li>
@endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ======================= Footer END -->

        <!-- ======================= JS libraries, plugins and custom scripts -->
        <!-- jQuery JS -->
        <script src="{{ asset('assets/addons/custom/jquery/js/jquery.min.js') }}"></script>
        <!-- Bootstrap JS -->
        <script src="{{ asset('assets/addons/social/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Vendors -->
        <script src="{{ asset('assets/addons/social/pswmeter/pswmeter.min.js') }}"></script>
        <!-- Theme Functions -->
        <script src="{{ asset('assets/js/social/functions.js') }}"></script>
        <!-- Autoresize textarea -->
        <script src="{{ asset('assets/addons/custom/autosize/js/autosize.min.js') }}"></script>
        <!-- Perfect scrollbar -->
        <script src="{{ asset('assets/addons/custom/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
        <!-- Scroll forever -->
        <script src="{{ asset('assets/addons/custom/jquery/scroll4ever/js/jquery.scroll4ever.js') }}"></script>
        <!-- Custom scripts -->
        <script src="{{ asset('assets/js/load-guest-scripts.js') }}"></script>
        <script src="{{ asset('assets/js/script.guest.js') }}"></script>
        <script type="text/javascript">
            const unableSubmit = (form) => {
                if (form == 'login') {
                    const loginUsername = document.getElementById('username');
                    const loginPassword = document.getElementById('password');
                    const loginSubmit = document.getElementById('submit');

                    if (loginUsername.value.trim() !== '' && loginPassword.value.trim() !== '') {
                        loginSubmit.classList.remove('disabled');

                    } else {
                        loginSubmit.classList.add('disabled');
                    }
                }
            };

            $(function () {
                /**
                 * Login
                */
                $('form#login_form').submit(function (e) {
                    e.preventDefault();

                    const formData = new FormData(this);

                    $.ajax({
						headers: { 'Accept': 'application/json', 'X-localization': navigator.language.split('-')[0] },
						type: 'POST',
						contentType: 'application/json',
						url: apiHost + '/user/login',
						data: formData,
						beforeSend: function () {
							$('#submit').addClass('disabled');
							$('#submit .spinner-border').removeClass('opacity-0');
						},
						success: function (res) {
							$('#submit').removeClass('disabled');
							$('#submit .spinner-border').addClass('opacity-0');

                            if (!$('#errorMessageWrapper').hasClass('d-none')) {
                                $('#errorMessageWrapper').addClass('d-none');
                            }

                            $('#successMessageWrapper').removeClass('d-none');
							$('#successMessageWrapper .custom-message').html(res.message);

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken
                                }
                            });

                            $.ajax({
                                type: 'POST',
                                url: currentHost + '/login',
                                data: {
                                    'username': res.data.username, 
                                    'password': formData.get('password'), 
                                    'remember': formData.get('remember') 
                                },
                                dataType: 'application/x-www-form-urlencoded',
                                complete: function () {
                                    window.location.href = window.location.href;
                                }
                            });
                        },
						cache: false,
						contentType: false,
						processData: false,
						error: function (xhr, error, status_description) {
							$('#submit').removeClass('disabled');
							$('#submit .spinner-border').addClass('opacity-0');

                            if (!$('#successMessageWrapper').hasClass('d-none')) {
                                $('#successMessageWrapper').addClass('d-none');
                            }

                            $('#errorMessageWrapper').removeClass('d-none');

                            if (xhr.responseJSON.reference) {
                                if (xhr.responseJSON.reference === 'email') {
                                    $('#errorMessageWrapper .custom-message').html(`${xhr.responseJSON.message}. <br class="d-lg-block d-sm-none d-block"><a href="${currentHost}/forgot-password?ref=${xhr.responseJSON.data.email}"><?= __('auth.verify-now') ?></a>`);
                                }

                                if (xhr.responseJSON.reference === 'phone') {
                                    $('#errorMessageWrapper .custom-message').html(`${xhr.responseJSON.message}. <br class="d-lg-block d-sm-none d-block"><a href="${currentHost}/forgot-password?ref=${xhr.responseJSON.data.phone}"><?= __('auth.verify-now') ?></a>`);
                                }

                            } else {
                                $('#errorMessageWrapper .custom-message').html(xhr.responseJSON.message);
                            }

							console.log(xhr.responseJSON);
							console.log(xhr.status);
							console.log(error);
							console.log(status_description);
						}
					});
                });
            });
        </script>
    </body>
</html>
