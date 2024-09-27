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
            Kulisha / @lang('miscellaneous.menu.public.news_feed')
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
                <div id="contents" class="row g-4" style="min-height: 40rem;">
					<!-- Sidenav START -->
					<div class="col-lg-3 mt-0">
						<!-- Advanced filter responsive toggler START -->
						<div class="d-flex align-items-center d-lg-none mb-3">
							<button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
								<span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
								<span class="h6 mb-0 fw-bold d-lg-none ms-2">@lang('miscellaneous.menu.public.profile.title')</span>
							</button>
						</div>

						<!-- Advanced filter responsive toggler END -->
						<!-- Navbar START-->
						<nav class="navbar navbar-expand-lg mx-0">
							<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSideNavbar">
								<!-- Offcanvas header -->
								<div class="offcanvas-header">
									<button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
								</div>

								<!-- Offcanvas body -->
								<div class="offcanvas-body d-block px-2 px-lg-0">
									<!-- Card START -->
									<div class="card overflow-hidden">
										<!-- Cover image -->
										<div class="h-50px" style="background-image:url({{ asset('assets/img/template/bg/01.jpg') }}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
										<!-- Card body START -->
										<div class="card-body pt-0">
											<div class="text-center">
												<!-- Avatar -->
												<div class="avatar avatar-lg mt-n5 mb-3">
													<a href="{{ route('profile.home', ['username' => 'tonystark']) }}">
														<img class="avatar-img rounded border border-white border-3" src="{{ asset('assets/img/template/avatar/07.jpg') }}" alt>
													</a>
												</div>

												<!-- Info -->
												<h5 class="mb-0"> <a href="{{ route('profile.home', ['username' => 'tonystark']) }}">Robert Downey Jr.</a></h5>
												<small>@tonystark</small>
												<p class="mt-3">
													I'd love to change the world, but they won’t give me the source code.
												</p>

												<!-- User stat START -->
												<div class="hstack gap-2 gap-xl-3 justify-content-center">
													<!-- User stat item -->
													<div>
														<h6 class="mb-0 small">{{ thousandsCurrencyFormat(256) }}</h6>
														<small class="kls-fs-7">{{ Str::limit(__('miscellaneous.public.profile.statistics.posts'), (str_starts_with(app()->getLocale(), 'fr') ? 7 : 8), '...') }}</small>
													</div>
													<!-- Divider -->
													<div class="vr" style="z-index: 9999;"></div>
													<!-- User stat item -->
													<div>
														<h6 class="mb-0 small">{{ thousandsCurrencyFormat(25829384) }}</h6>
														<small class="kls-fs-7">{{ Str::limit(__('miscellaneous.public.profile.statistics.followers'), (str_starts_with(app()->getLocale(), 'fr') ? 7 : 8), '...') }}</small>
													</div>
													<!-- Divider -->
													<div class="vr" style="z-index: 9999;"></div>
													<!-- User stat item -->
													<div>
														<h6 class="mb-0 small">{{ thousandsCurrencyFormat(36500) }}</h6>
														<small class="kls-fs-7">{{ Str::limit(__('miscellaneous.public.profile.statistics.following'), (str_starts_with(app()->getLocale(), 'fr') ? 7 : 8), '...') }}</small>
													</div>
												</div>

												<!-- Divider -->
												<hr>
											</div>

											<!-- Side Nav START -->
											<ul class="nav nav-link-secondary flex-column fw-bold gap-2">
												<li class="nav-item">
													<a class="nav-link" href="{{ route('profile.entity', ['username' => 'tonystark', 'entity' => 'connections']) }}">
														<i class="fa-solid fa-users me-2 fs-5 align-middle text-danger"></i>
														<span>@lang('miscellaneous.menu.public.profile.connections')</span>
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="{{ route('profile.entity', ['username' => 'tonystark', 'entity' => 'products']) }}">
														<i class="fa-solid fa-basket-shopping me-3 fs-5 align-middle text-success-emphasis"></i>
														<span>@lang('miscellaneous.menu.public.profile.products')</span>
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="{{ route('profile.entity', ['username' => 'tonystark', 'entity' => 'services']) }}">
														<i class="fa-solid fa-people-carry-box me-2 fs-5 align-middle text-warning-emphasis"></i>
														<span>@lang('miscellaneous.menu.public.profile.services')</span>
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="{{ route('profile.entity', ['username' => 'tonystark', 'entity' => 'my_activities']) }}">
														<i class="fa-regular fa-clock-four me-3 fs-5 align-middle text-primary"></i>
														<span>@lang('miscellaneous.menu.public.profile.my_activities')</span>
													</a>
												</li>
											</ul>
											<!-- Side Nav END -->
										</div>
										<!-- Card body END -->

										<!-- Card footer -->
										<div class="card-footer text-center py-2">
											<a class="btn btn-link btn-sm" href="{{ route('profile.home', ['username' => 'tonystark']) }}">@lang('miscellaneous.public.home.view_profile')</a>
										</div>
									</div>
									<!-- Card END -->

									<!-- Helper link START -->
									<ul class="nav small mt-4 justify-content-center lh-1">
										<li class="nav-item">
											<a class="nav-link" target="_blank" href="https://xsamtech.com/products/kulisha">@lang('miscellaneous.menu.about')</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="{{ route('settings.home') }}">@lang('miscellaneous.menu.public.settings.title')</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" target="_blank" href="https://xsamtech.com/messenger">@lang('miscellaneous.public.home.help')</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="https://xsamtech.com/products/kulisha/privacy_policy">@lang('miscellaneous.menu.privacy_policy')</a>
										</li>
										<li class="nav-item dropdown">
@include('components.locales')
										</li>
									</ul>
									<!-- Helper link END -->
									<!-- Copyright -->
									<p class="small text-center mt-1">&copy; {{ date('Y') }} <a class="text-reset" target="_blank" href="https://xsamtech.com/">Xsam Technologies</a></p>
								</div>
							</div>
						</nav>
						<!-- Navbar END-->
					</div>
					<!-- Sidenav END -->

					<!-- Main content START -->
					<div class="col-lg-6 col-md-8 vstack gap-4 mt-0">
						<!-- Story START -->
						<div class="d-flex gap-3 mb-n3">
							<div class="position-relative text-center">
								<!-- Card START -->
								<div class="mb-1">
									<label role="button" for="image_story" class="stretched-link btn btn-dark rounded-circle icon-xxl rounded-circle">
										<i class="fa-solid fa-plus fs-6"></i>
										<input type="file" name="image_story" id="image_story" class="d-none">
									</label>
									<input type="hidden" name="data_story" id="data_story">
								</div>

								<a href="#!" class="small fw-normal text-secondary">
									<p class="d-inline-block kls-line-height-1_25">@lang('miscellaneous.public.home.stories.new')</p>
								</a>
								<!-- Card END -->
							</div>
							<!-- Stories -->
							<div id="stories" class="storiesWrapper stories user-icon carousel scroll-enable"></div>
						</div>
						<!-- Story END -->

						<!-- Share feed START -->
						<div class="card card-body">
							<div class="d-flex mb-3">
								<!-- Avatar -->
								<div class="avatar avatar-xs me-2">
									<a href="#">
										<img class="avatar-img rounded-circle" src="{{ asset('assets/img/template/avatar/07.jpg') }}" alt>
									</a>
								</div>

								<!-- Post input -->
								<form class="w-100">
									<input class="form-control pe-4 border-0" placeholder="@lang('miscellaneous.public.home.posts.new')" data-bs-toggle="modal" data-bs-target="#modalCreateFeed">
								</form>
							</div>

							<!-- Share feed toolbar START -->
							<ul class="nav nav-pills nav-stack small fw-normal">
								<li class="nav-item">
									<a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#modalCreateEvents">
										<i class="bi bi-calendar2-event-fill pe-2 fs-6 text-danger"></i><span class="kls-text-secondary">@lang('miscellaneous.public.home.posts.type.event')</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#modalCreatePoll">
										<i class="bi bi-list-check pe-2 fs-6 text-warning"></i><span class="kls-text-secondary">@lang('miscellaneous.public.home.posts.type.poll.label')</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionAnonymousQuestion">
										<i class="bi bi-question-circle pe-2 fs-6 text-info"></i><span class="kls-text-secondary">@lang('miscellaneous.public.home.posts.type.anonymous_question')</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionArticle">
										<i class="bi bi-newspaper pe-2 fs-6 text-success"></i><span class="kls-text-secondary">@lang('miscellaneous.public.home.posts.type.article')</span>
									</a>
								</li>
							</ul>
							<!-- Share feed toolbar END -->
						</div>
						<!-- Share feed END -->

						<!-- Card feed item START -->
						<div class="card">
							<!-- Card header START -->
							<div class="card-header border-0 pb-0">
								<div class="d-flex align-items-center justify-content-between">
									<div class="d-flex align-items-center">
										<!-- Avatar -->
										<div class="avatar avatar-story me-2">
											<a href="#!">
												<img class="avatar-img rounded-circle" src="{{ asset('assets/img/template/avatar/04.jpg') }}" alt>
											</a>
										</div>

										<!-- Info -->
										<div>
											<div class="nav nav-divider">
												<h6 class="nav-item card-title mb-0">
													<a href="#!">Lori Ferguson</a>
												</h6>
												<span class="nav-item small">2hr</span>
											</div>

											<p class="mb-0 small">@loriferguson</p>
										</div>
									</div>

									<!-- Card feed action dropdown START -->
									<div class="dropdown">
										<a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction" data-bs-toggle="dropdown" aria-expanded="false">
											<i class="bi bi-chevron-down"></i>
										</a>

										<!-- Card feed action dropdown menu -->
										<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction">
											<li>
												<a class="dropdown-item" href="#"><i class="fa-regular fa-bookmark fa-fw me-2"></i>@lang('miscellaneous.public.home.posts.actions.save')</a>
											</li>
											<li>
												<a class="dropdown-item" href="#"><i class="fa-solid fa-user-large-slash fa-fw me-2"></i>@lang('miscellaneous.public.home.posts.actions.unfollow_owner', ['owner' => 'loriferguson'])</a>
											</li>
											<li>
												<a class="dropdown-item" href="#"><i class="fa-regular fa-eye-slash fa-fw me-2"></i>@lang('miscellaneous.public.home.posts.actions.hide')</a>
											</li>
											<li><hr class="dropdown-divider"></li>
											<li>
												<a class="dropdown-item" href="#"><i class="fa-regular fa-flag fa-fw me-2"></i>@lang('miscellaneous.public.home.posts.actions.report')</a>
											</li>
										</ul>
									</div>
									<!-- Card feed action dropdown END -->
								</div>
							</div>
							<!-- Card header END -->

							<!-- Card body START -->
							<div class="card-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

								<!-- Card img -->
								<img class="card-img" src="{{ asset('assets/img/template/post/3by2/01.jpg') }}" alt="Post">

								<!-- Feed react START -->
								<ul class="nav nav-pills nav-pills-light nav-fill nav-stack small border-top border-bottom py-1 my-3">
									<li class="nav-item">
										<a class="nav-link mb-0 active" href="#!" data-bs-container="body" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" data-bs-custom-class="tooltip-text-start" data-bs-title="Frances Guerrero<br> Lori Stevens<br> Billy Vasquez<br> Judy Nguyen<br> Larry Lawson<br> Amanda Reed<br> Louis Crawford">
											<i class="bi bi-heart pe-1"></i>Liked (56)
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link mb-0" href="#!">
											<i class="bi bi-chat-fill pe-1"></i>Comments (12)
										</a>
									</li>
									<!-- Card share action menu START -->
									<li class="nav-item dropdown">
										<a href="#" class="nav-link mb-0" id="cardShareAction" data-bs-toggle="dropdown" aria-expanded="false">
											<i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
										</a>
										<!-- Card share action dropdown menu -->
										<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction">
											<li>
												<a class="dropdown-item" href="#"><i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a>
											</li>
											<li>
												<a class="dropdown-item" href="#">
													<i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark
												</a>
											</li>
											<li>
												<a class="dropdown-item" href="#">
													<i class="bi bi-link fa-fw pe-2"></i>Copy link to post
												</a>
											</li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-share fa-fw pe-2"></i>Share post via
										…</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-pencil-square fa-fw pe-2"></i>Share to
										News Feed</a></li>
								</ul>
								</li>
								<!-- Card share action menu END -->
								<li class="nav-item">
								<a class="nav-link mb-0" href="#!"> <i
									class="bi bi-send-fill pe-1"></i>Send</a>
								</li>
							</ul>
							<!-- Feed react START -->
			
							<!-- Add comment -->
							<div class="d-flex mb-3">
								<!-- Avatar -->
								<div class="avatar avatar-xs me-2">
								<a href="#!"> <img class="avatar-img rounded-circle"
									src="assets/img/template/avatar/12.jpg" alt> </a>
								</div>
								<!-- Comment box  -->
								<form class="position-relative w-100">
								<textarea class="form-control pe-4 bg-light" data-autoresize
									rows="1" placeholder="Add a comment..."></textarea>
								<!-- Emoji button -->
								<div class="position-absolute top-0 end-0">
									<button class="btn" type="button">🙂</button>
								</div>
			
								<button class="btn btn-sm btn-primary mb-0 rounded mt-2"
									type="submit">Post</button>
								</form>
							</div>
							<!-- Comment wrap START -->
							<ul class="comment-wrap list-unstyled">
								<!-- Comment item START -->
								<li class="comment-item">
								<div class="d-flex position-relative">
									<div class="comment-line-inner"></div>
									<!-- Avatar -->
									<div class="avatar avatar-xs">
									<a href="#!"><img class="avatar-img rounded-circle"
										src="assets/img/template/avatar/05.jpg" alt></a>
									</div>
									<div class="ms-2">
									<!-- Comment by -->
									<div class="bg-light rounded-start-top-0 p-3 rounded">
										<div class="d-flex justify-content-between">
										<h6 class="mb-1"> <a href="#!"> Frances Guerrero
											</a></h6>
										<small class="ms-2">5hr</small>
										</div>
										<p class="small mb-0">Removed demands expense account
										in outward tedious do. Particular way thoroughly
										unaffected projection.</p>
									</div>
									<!-- Comment react -->
									<ul class="nav nav-divider py-2 small">
										<li class="nav-item">
										<a class="nav-link" href="#!"> Like (3)</a>
										</li>
										<li class="nav-item">
										<a class="nav-link" href="#!"> Reply</a>
										</li>
										<li class="nav-item">
										<a class="nav-link" href="#!"> View 5 replies</a>
										</li>
									</ul>
									</div>
								</div>
								<!-- Comment item nested START -->
								<ul class="comment-item-nested list-unstyled">
									<!-- Comment item START -->
									<li class="comment-item">
									<div class="comment-line-inner"></div>
									<div class="d-flex">
										<!-- Avatar -->
										<div class="avatar avatar-xs">
										<a href="#!"><img class="avatar-img rounded-circle"
											src="assets/img/template/avatar/06.jpg" alt></a>
										</div>
										<!-- Comment by -->
										<div class="ms-2">
										<div class="bg-light p-3 rounded">
											<div class="d-flex justify-content-between">
											<h6 class="mb-1"> <a href="#!"> Lori Stevens
												</a> </h6>
											<small>2hr</small>
											</div>
											<p class="small mb-0">See resolved goodness
											felicity shy civility domestic had but Drawings
											offended yet answered Jennings perceive.</p>
										</div>
										<!-- Comment react -->
										<ul class="nav nav-divider py-2 small">
											<li class="nav-item">
											<a class="nav-link" href="#!"> Like (5)</a>
											</li>
											<li class="nav-item">
											<a class="nav-link" href="#!"> Reply</a>
											</li>
										</ul>
										</div>
									</div>
									</li>
									<!-- Comment item END -->
									<!-- Comment item START -->
									<li class="comment-item">
									<div class="comment-line-inner"></div>
									<div class="d-flex">
										<!-- Avatar -->
										<div class="avatar avatar-story avatar-xs">
										<a href="#!"><img class="avatar-img rounded-circle"
											src="assets/img/template/avatar/07.jpg" alt></a>
										</div>
										<!-- Comment by -->
										<div class="ms-2">
										<div class="bg-light p-3 rounded">
											<div class="d-flex justify-content-between">
											<h6 class="mb-1"> <a href="#!"> Billy Vasquez
												</a> </h6>
											<small>15min</small>
											</div>
											<p class="small mb-0">Wishing calling is warrant
											settled was lucky.</p>
										</div>
										<!-- Comment react -->
										<ul class="nav nav-divider py-2 small">
											<li class="nav-item">
											<a class="nav-link" href="#!"> Like</a>
											</li>
											<li class="nav-item">
											<a class="nav-link" href="#!"> Reply</a>
											</li>
										</ul>
										</div>
									</div>
									</li>
									<!-- Comment item END -->
								</ul>
								<!-- Load more replies -->
								<a href="#!" role="button"
									class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center mb-3 ms-5"
									data-bs-toggle="button" aria-pressed="true">
									<div class="spinner-dots me-2">
									<span class="spinner-dot"></span>
									<span class="spinner-dot"></span>
									<span class="spinner-dot"></span>
									</div>
									Load more replies
								</a>
								<!-- Comment item nested END -->
								</li>
								<!-- Comment item END -->
								<!-- Comment item START -->
								<li class="comment-item">
								<div class="d-flex">
									<!-- Avatar -->
									<div class="avatar avatar-xs">
									<a href="#!"><img class="avatar-img rounded-circle"
										src="assets/img/template/avatar/05.jpg" alt></a>
									</div>
									<!-- Comment by -->
									<div class="ms-2">
									<div class="bg-light p-3 rounded">
										<div class="d-flex justify-content-between">
										<h6 class="mb-1"> <a href="#!"> Frances Guerrero
											</a> </h6>
										<small class="ms-2">4min</small>
										</div>
										<p class="small mb-0">Removed demands expense account
										in outward tedious do. Particular way thoroughly
										unaffected projection.</p>
									</div>
									<!-- Comment react -->
									<ul class="nav nav-divider pt-2 small">
										<li class="nav-item">
										<a class="nav-link" href="#!"> Like (1)</a>
										</li>
										<li class="nav-item">
										<a class="nav-link" href="#!"> Reply</a>
										</li>
										<li class="nav-item">
										<a class="nav-link" href="#!"> View 6 replies</a>
										</li>
									</ul>
									</div>
								</div>
								</li>
								<!-- Comment item END -->
							</ul>
							<!-- Comment wrap END -->
							</div>
							<!-- Card body END -->
							<!-- Card footer START -->
							<div class="card-footer border-0 pt-0">
							<!-- Load more comments -->
							<a href="#!" role="button"
								class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center"
								data-bs-toggle="button" aria-pressed="true">
								<div class="spinner-dots me-2">
								<span class="spinner-dot"></span>
								<span class="spinner-dot"></span>
								<span class="spinner-dot"></span>
								</div>
								Load more comments
							</a>
							</div>
							<!-- Card footer END -->
						</div>
						<!-- Card feed item END -->
			
						<!-- Card feed item START -->
						<div class="card">
							<!-- Card header START -->
							<div class="card-header">
							<div class="d-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-2">
									<a href="#!"> <img class="avatar-img rounded-circle"
										src="assets/img/template/logo/12.svg" alt> </a>
								</div>
								<!-- Info -->
								<div>
									<h6 class="card-title mb-0"><a href="#!"> Bootstrap:
										Front-end framework </a></h6>
									<a href="#!" class="mb-0 text-body">Sponsored <i
										class="bi bi-info-circle ps-1"
										data-bs-container="body" data-bs-toggle="popover"
										data-bs-placement="top"
										data-bs-content="You're seeing this ad because your activity meets the intended audience of our site."></i>
									</a>
								</div>
								</div>
								<!-- Card share action START -->
								<div class="dropdown">
								<a href="#"
									class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
									id="cardShareAction2" data-bs-toggle="dropdown"
									aria-expanded="false">
									<i class="bi bi-three-dots"></i>
								</a>
								<!-- Card share action dropdown menu -->
								<ul class="dropdown-menu dropdown-menu-end"
									aria-labelledby="cardShareAction2">
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-bookmark fa-fw pe-2"></i>Save
										post</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori
										ferguson </a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-x-circle fa-fw pe-2"></i>Hide
										post</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-flag fa-fw pe-2"></i>Report
										post</a></li>
								</ul>
								</div>
								<!-- Card share action START -->
							</div>
							</div>
							<!-- Card header START -->
			
							<!-- Card body START -->
							<div class="card-body">
							<p class="mb-0">Quickly design and customize responsive
								mobile-first sites with Bootstrap.</p>
							</div>
							<img src="assets/img/template/post/3by2/02.jpg" alt>
							<!-- Card body END -->
							<!-- Card footer START -->
							<div
							class="card-footer border-0 d-flex justify-content-between align-items-center">
							<p class="mb-0">Currently v5.1.3 </p>
							<a class="btn btn-primary-soft btn-sm" href="#"> Download now
							</a>
							</div>
							<!-- Card footer END -->
			
						</div>
						<!-- Card feed item END -->
			
						<!-- Card feed item START -->
						<div class="card">
							<!-- Card header START -->
							<div class="card-header border-0 pb-0">
							<div class="d-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-2">
									<a href="#"> <img class="avatar-img rounded-circle"
										src="assets/img/template/avatar/04.jpg" alt> </a>
								</div>
								<!-- Info -->
								<div>
									<h6 class="card-title mb-0"> <a href="#"> Judy Nguyen
									</a></h6>
									<div class="nav nav-divider">
									<p class="nav-item mb-0 small">Web Developer at
										Webestica</p>
									<span class="nav-item small" data-bs-toggle="tooltip"
										data-bs-placement="top" title="Public"> <i
										class="bi bi-globe"></i> </span>
									</div>
								</div>
								</div>
								<!-- Card share action START -->
								<div class="dropdown">
								<a href="#"
									class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
									id="cardShareAction3" data-bs-toggle="dropdown"
									aria-expanded="false">
									<i class="bi bi-three-dots"></i>
								</a>
								<!-- Card share action dropdown menu -->
								<ul class="dropdown-menu dropdown-menu-end"
									aria-labelledby="cardShareAction3">
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-bookmark fa-fw pe-2"></i>Save
										post</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori
										ferguson </a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-x-circle fa-fw pe-2"></i>Hide
										post</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-flag fa-fw pe-2"></i>Report
										post</a></li>
								</ul>
								</div>
								<!-- Card share action END -->
							</div>
							</div>
							<!-- Card header START -->
							<!-- Card body START -->
							<div class="card-body">
							<p>I'm so privileged to be involved in the <a
								href="#!">@bootstrap </a>hiring process! Interviewing with
								their team was fun and I hope this can be a valuable resource
								for folks! <a href="#!"> #inclusivebusiness</a> <a href="#!">
								#internship</a> <a href="#!"> #hiring</a> <a href="#">
								#apply </a></p>
							<!-- Card feed grid START -->
							<div class="d-flex justify-content-between">
								<div class="row g-3">
								<div class="col-6">
									<!-- Grid img -->
									<a href="assets/img/template/post/1by1/03.jpg" data-glightbox
									data-gallery="image-popup">
									<img class="rounded img-fluid"
										src="assets/img/template/post/1by1/03.jpg" alt="Image">
									</a>
								</div>
								<div class="col-6">
									<!-- Grid img -->
									<a href="assets/img/template/post/3by2/01.jpg" data-glightbox
									data-gallery="image-popup">
									<img class="rounded img-fluid"
										src="assets/img/template/post/3by2/01.jpg" alt="Image">
									</a>
									<!-- Grid img -->
									<div class="position-relative bg-dark mt-3 rounded">
									<div
										class="hover-actions-item position-absolute top-50 start-50 translate-middle z-index-9">
										<a class="btn btn-link text-white" href="#"> View all
										</a>
									</div>
									<a href="assets/img/template/post/3by2/02.jpg" data-glightbox
										data-gallery="image-popup">
										<img class="img-fluid opacity-50 rounded"
										src="assets/img/template/post/3by2/02.jpg" alt>
									</a>
									</div>
								</div>
								</div>
							</div>
							<!-- Card feed grid END -->
			
							<!-- Feed react START -->
							<ul class="nav nav-stack py-3 small">
								<li class="nav-item">
								<a class="nav-link active text-secondary" href="#!"> <i
									class="bi bi-heart-fill me-1 icon-xs bg-danger text-white rounded-circle"></i>
									Louis, Billy and 126 others </a>
								</li>
								<li class="nav-item ms-sm-auto">
								<a class="nav-link" href="#!"> <i
									class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
								</li>
							</ul>
							<!-- Feed react END -->
			
							<!-- Feed react START -->
							<ul
								class="nav nav-pills nav-pills-light nav-fill nav-stack small border-top border-bottom py-1 mb-3">
								<li class="nav-item">
								<a class="nav-link mb-0 active" href="#!"> <i
									class="bi bi-heart pe-1"></i>Liked (56)</a>
								</li>
								<li class="nav-item">
								<a class="nav-link mb-0" href="#!"> <i
									class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
								</li>
								<!-- Card share action menu START -->
								<li class="nav-item dropdown">
								<a href="#" class="nav-link mb-0" id="cardShareAction4"
									data-bs-toggle="dropdown" aria-expanded="false">
									<i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share
									(3)
								</a>
								<!-- Card share action dropdown menu -->
								<ul class="dropdown-menu dropdown-menu-end"
									aria-labelledby="cardShareAction4">
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-envelope fa-fw pe-2"></i>Send via
										Direct Message</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark
									</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-link fa-fw pe-2"></i>Copy link to
										post</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-share fa-fw pe-2"></i>Share post via
										…</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-pencil-square fa-fw pe-2"></i>Share to
										News Feed</a></li>
								</ul>
								</li>
								<!-- Card share action menu END -->
								<li class="nav-item">
								<a class="nav-link mb-0" href="#!"> <i
									class="bi bi-send-fill pe-1"></i>Send</a>
								</li>
							</ul>
							<!-- Feed react START -->
			
							<!-- Comment wrap START -->
							<ul class="comment-wrap list-unstyled">
								<!-- Comment item START -->
								<li class="comment-item">
								<div class="d-flex">
									<!-- Avatar -->
									<div class="avatar avatar-xs">
									<a href="#"> <img class="avatar-img rounded-circle"
										src="assets/img/template/avatar/05.jpg" alt> </a>
									</div>
									<div class="ms-2">
									<!-- Comment by -->
									<div class="bg-light rounded-start-top-0 p-3 rounded">
										<div class="d-flex justify-content-between">
										<h6 class="mb-1"> <a href="#!"> Frances Guerrero
											</a></h6>
										<small class="ms-2">5hr</small>
										</div>
										<p class="small mb-0">Removed demands expense account
										in outward tedious do. Particular way thoroughly
										unaffected projection.</p>
									</div>
									<!-- Comment rect -->
									<ul class="nav nav-divider py-2 small">
										<li class="nav-item">
										<a class="nav-link" href="#!"> Like (3)</a>
										</li>
										<li class="nav-item">
										<a class="nav-link" href="#!"> Reply</a>
										</li>
										<li class="nav-item">
										<a class="nav-link" href="#!"> View 5 replies</a>
										</li>
									</ul>
									</div>
								</div>
								<!-- Comment item nested START -->
								<ul class="comment-item-nested list-unstyled">
									<!-- Comment item START -->
									<li class="comment-item">
									<div class="d-flex">
										<!-- Avatar -->
										<div class="avatar avatar-xs">
										<a href="#!"><img class="avatar-img rounded-circle"
											src="assets/img/template/avatar/06.jpg" alt></a>
										</div>
										<!-- Comment by -->
										<div class="ms-2">
										<div class="bg-light p-3 rounded">
											<div class="d-flex justify-content-between">
											<h6 class="mb-1"> <a href="#!"> Lori Stevens
												</a> </h6>
											<small>2hr</small>
											</div>
											<p class="small mb-0">See resolved goodness
											felicity shy civility domestic had but Drawings
											offended yet answered Jennings perceive.</p>
										</div>
										<!-- Comment rect -->
										<ul class="nav nav-divider py-2 small">
											<li class="nav-item">
											<a class="nav-link" href="#!"> Like (5)</a>
											</li>
											<li class="nav-item">
											<a class="nav-link" href="#!"> Reply</a>
											</li>
										</ul>
										</div>
									</div>
									</li>
									<!-- Comment item END -->
									<!-- Comment item START -->
									<li class="comment-item">
									<div class="d-flex">
										<!-- Avatar -->
										<div class="avatar avatar-xs">
										<a href="#!"><img class="avatar-img rounded-circle"
											src="assets/img/template/avatar/07.jpg" alt></a>
										</div>
										<!-- Comment by -->
										<div class="ms-2">
										<div class="bg-light p-3 rounded">
											<div class="d-flex justify-content-between">
											<h6 class="mb-1"> <a href="#!"> Billy Vasquez
												</a> </h6>
											<small class="ms-2">15min</small>
											</div>
											<p class="small mb-0">Wishing calling is warrant
											settled was lucky.</p>
										</div>
										<!-- Comment rect -->
										<ul class="nav nav-divider py-2 small">
											<li class="nav-item">
											<a class="nav-link" href="#!"> Like</a>
											</li>
											<li class="nav-item">
											<a class="nav-link" href="#!"> Reply</a>
											</li>
										</ul>
										</div>
									</div>
									</li>
								</ul>
								<!-- Load more replies -->
								<a href="#!" role="button"
									class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center mb-3 ms-5"
									data-bs-toggle="button" aria-pressed="true">
									<div class="spinner-dots me-2">
									<span class="spinner-dot"></span>
									<span class="spinner-dot"></span>
									<span class="spinner-dot"></span>
									</div>
									Load more replies
								</a>
								</li>
								<!-- Comment item END -->
								<!-- Comment item START -->
								<li class="comment-item">
								<div class="d-flex">
									<!-- Avatar -->
									<div class="avatar avatar-xs">
									<a href="#!"><img class="avatar-img rounded-circle"
										src="assets/img/template/avatar/05.jpg" alt></a>
									</div>
									<!-- Comment by -->
									<div class="ms-2">
									<div class="bg-light p-3 rounded">
										<div class="d-flex justify-content-between">
										<h6 class="mb-1"> <a href="#!"> Frances Guerrero
											</a> </h6>
										<small class="ms-2">4min</small>
										</div>
										<p class="small mb-0">Congratulations:)</p>
										<div
										class="card shadow-none p-2 border border-2 rounded mt-2">
										<img src="assets/img/template/elements/11.svg" alt>
										</div>
									</div>
									<!-- Comment rect -->
									<ul class="nav nav-divider pt-2 small">
										<li class="nav-item">
										<a class="nav-link" href="#!"> Like (1)</a>
										</li>
										<li class="nav-item">
										<a class="nav-link" href="#!"> Reply</a>
										</li>
										<li class="nav-item">
										<a class="nav-link" href="#!"> View 6 replies</a>
										</li>
									</ul>
									</div>
								</div>
								</li>
								<!-- Comment item END -->
							</ul>
							<!-- Comment wrap END -->
							</div>
							<!-- Card body END -->
							<!-- Card footer START -->
							<div class="card-footer border-0 pt-0">
							<!-- Load more comments -->
							<a href="#!" role="button"
								class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center"
								data-bs-toggle="button" aria-pressed="true">
								<div class="spinner-dots me-2">
								<span class="spinner-dot"></span>
								<span class="spinner-dot"></span>
								<span class="spinner-dot"></span>
								</div>
								Load more comments
							</a>
							</div>
							<!-- Card footer END -->
						</div>
						<!-- Card feed item END -->
			
						<!-- Card feed item START -->
						<div class="card">
							<!-- Card header START -->
							<div class="card-header border-0 pb-0">
							<div class="d-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-2">
									<a href="#"> <img class="avatar-img rounded-circle"
										src="assets/img/template/logo/13.svg" alt> </a>
								</div>
								<!-- Title -->
								<div>
									<h6 class="card-title mb-0"> <a href="#!"> Apple Education
									</a></h6>
									<p class="mb-0 small">9 November at 23:29</p>
								</div>
								</div>
								<!-- Card share action menu -->
								<a href="#"
								class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
								id="cardShareAction5" data-bs-toggle="dropdown"
								aria-expanded="false">
								<i class="bi bi-three-dots"></i>
								</a>
								<!-- Card share action dropdown menu -->
								<ul class="dropdown-menu dropdown-menu-end"
								aria-labelledby="cardShareAction5">
								<li><a class="dropdown-item" href="#"> <i
										class="bi bi-bookmark fa-fw pe-2"></i>Save
									post</a></li>
								<li><a class="dropdown-item" href="#"> <i
										class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori
									ferguson </a></li>
								<li><a class="dropdown-item" href="#"> <i
										class="bi bi-x-circle fa-fw pe-2"></i>Hide
									post</a></li>
								<li><a class="dropdown-item" href="#"> <i
										class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="#"> <i
										class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
								</ul>
							</div>
							<!-- Card share action END -->
							</div>
							<!-- Card header START -->
			
							<!-- Card body START -->
							<div class="card-body pb-0">
							<p>Find out how you can save time in the classroom this year.
								Earn recognition while you learn new skills on iPad and Mac.
								Start recognition your first Apple Teacher badge today!</p>
							<!-- Feed react START -->
							<ul class="nav nav-stack pb-2 small">
								<li class="nav-item">
								<a class="nav-link active text-secondary" href="#!"> <i
									class="bi bi-heart-fill me-1 icon-xs bg-danger text-white rounded-circle"></i>
									Louis, Billy and 126 others </a>
								</li>
								<li class="nav-item ms-sm-auto">
								<a class="nav-link" href="#!"> <i
									class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
								</li>
							</ul>
							<!-- Feed react END -->
							</div>
							<!-- Card body END -->
							<!-- Card Footer START -->
							<div class="card-footer py-3">
							<!-- Feed react START -->
							<ul class="nav nav-fill nav-stack small">
								<li class="nav-item">
								<a class="nav-link mb-0 active" href="#!"> <i
									class="bi bi-heart pe-1"></i>Liked (56)</a>
								</li>
								<!-- Card share action dropdown START -->
								<li class="nav-item dropdown">
								<a href="#" class="nav-link mb-0" id="cardShareAction6"
									data-bs-toggle="dropdown" aria-expanded="false">
									<i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share
									(3)
								</a>
								<!-- Card share action dropdown menu -->
								<ul class="dropdown-menu dropdown-menu-end"
									aria-labelledby="cardShareAction6">
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-envelope fa-fw pe-2"></i>Send via
										Direct Message</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark
									</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-link fa-fw pe-2"></i>Copy link to
										post</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-share fa-fw pe-2"></i>Share post via
										…</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-pencil-square fa-fw pe-2"></i>Share to
										News Feed</a></li>
								</ul>
								</li>
								<!-- Card share action dropdown END -->
								<li class="nav-item">
								<a class="nav-link mb-0" href="#!"> <i
									class="bi bi-send-fill pe-1"></i>Send</a>
								</li>
							</ul>
							<!-- Feed react END -->
							</div>
							<!-- Card Footer END -->
						</div>
						<!-- Card feed item END -->
			
						<!-- Card feed item START -->
						<div class="card">
							<!-- Card header START -->
							<div
							class="card-header d-flex justify-content-between align-items-center border-0 pb-0">
							<h6 class="card-title mb-0">People you may know</h6>
							<button class="btn btn-sm btn-primary-soft"> See all </button>
							</div>
							<!-- Card header START -->
			
							<!-- Card body START -->
							<div class="card-body">
							<div class="tiny-slider arrow-hover">
								<div class="tiny-slider-inner ms-n4" data-arrow="true"
								data-dots="false" data-items-xl="3" data-items-lg="2"
								data-items-md="2" data-items-sm="2" data-items-xs="1"
								data-gutter="12" data-edge="30">
								<!-- Slider items -->
								<div>
									<!-- Card add friend item START -->
									<div class="card shadow-none text-center">
									<!-- Card body -->
									<div class="card-body p-2 pb-0">
										<div class="avatar avatar-xl">
										<img class="avatar-img rounded-circle"
											src="assets/img/template/avatar/09.jpg" alt>
										</div>
										<h6 class="card-title mb-1 mt-3">Amanda Reed</h6>
										<p class="mb-0 small lh-sm">50 mutual connections</p>
									</div>
									<!-- Card footer -->
									<div class="card-footer p-2 border-0">
										<button class="btn btn-sm btn-primary-soft w-100"> Add
										friend </button>
									</div>
									</div>
									<!-- Card add friend item END -->
								</div>
								<div>
									<!-- Card add friend item START -->
									<div class="card shadow-none text-center">
									<!-- Card body -->
									<div class="card-body p-2 pb-0">
										<div class="avatar avatar-story avatar-xl">
										<img class="avatar-img rounded-circle"
											src="assets/img/template/avatar/10.jpg" alt>
										</div>
										<h6 class="card-title mb-1 mt-3">Larry Lawson</h6>
										<p class="mb-0 small lh-sm">33 mutual connections</p>
									</div>
									<!-- Card footer -->
									<div class="card-footer p-2 border-0">
										<button class="btn btn-sm btn-primary-soft w-100"> Add
										friend </button>
									</div>
									</div>
									<!-- Card add friend item END -->
								</div>
								<div>
									<!-- Card add friend item START -->
									<div class="card shadow-none text-center">
									<!-- Card body -->
									<div class="card-body p-2 pb-0">
										<div class="avatar avatar-xl">
										<img class="avatar-img rounded-circle"
											src="assets/img/template/avatar/11.jpg" alt>
										</div>
										<h6 class="card-title mb-1 mt-3">Louis Crawford</h6>
										<p class="mb-0 small lh-sm">45 mutual connections</p>
									</div>
									<!-- Card footer -->
									<div class="card-footer p-2 border-0">
										<button class="btn btn-sm btn-primary-soft w-100"> Add
										friend </button>
									</div>
									</div>
									<!-- Card add friend item END -->
								</div>
								<div>
									<!-- Card add friend item START -->
									<div class="card shadow-none text-center">
									<!-- Card body -->
									<div class="card-body p-2 pb-0">
										<div class="avatar avatar-xl">
										<img class="avatar-img rounded-circle"
											src="assets/img/template/avatar/12.jpg" alt>
										</div>
										<h6 class="card-title mb-1 mt-3">Dennis Barrett</h6>
										<p class="mb-0 small lh-sm">21 mutual connections</p>
									</div>
									<!-- Card footer -->
									<div class="card-footer p-2 border-0">
										<button class="btn btn-sm btn-primary-soft w-100"> Add
										friend </button>
									</div>
									</div>
									<!-- Card add friend item END -->
								</div>
								</div>
							</div>
							</div>
							<!-- Card body END -->
						</div>
						<!-- Card feed item END -->
			
						<!-- Card feed item START -->
						<div class="card">
							<!-- Card header START -->
							<div class="card-header border-0 pb-0">
							<div class="d-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-2">
									<a href="#"> <img class="avatar-img rounded-circle"
										src="assets/img/template/avatar/04.jpg" alt> </a>
								</div>
								<!-- Title -->
								<div>
									<h6 class="card-title mb-0"> <a href="#!"> Apple Education
									</a></h6>
									<p class="mb-0 small">9 November at 23:29</p>
								</div>
								</div>
								<!-- Card share action menu -->
								<a href="#"
								class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
								id="cardShareAction7" data-bs-toggle="dropdown"
								aria-expanded="false">
								<i class="bi bi-three-dots"></i>
								</a>
								<!-- Card share action dropdown menu -->
								<ul class="dropdown-menu dropdown-menu-end"
								aria-labelledby="cardShareAction7">
								<li><a class="dropdown-item" href="#"> <i
										class="bi bi-bookmark fa-fw pe-2"></i>Save
									post</a></li>
								<li><a class="dropdown-item" href="#"> <i
										class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori
									ferguson </a></li>
								<li><a class="dropdown-item" href="#"> <i
										class="bi bi-x-circle fa-fw pe-2"></i>Hide
									post</a></li>
								<li><a class="dropdown-item" href="#"> <i
										class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="#"> <i
										class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
								</ul>
							</div>
							<!-- Card share action END -->
							</div>
							<!-- Card header START -->
			
							<!-- Card body START -->
							<div class="card-body pb-0">
							<p>How do you protect your business against cyber-crime?</p>
							<div class="vstack gap-2">
								<!-- Feed poll item -->
								<div>
								<input type="radio" class="btn-check" name="poll"
									id="option">
								<label class="btn btn-outline-primary w-100" for="option">We
									have cybersecurity insurance coverage</label>
								</div>
								<!-- Feed poll item -->
								<div>
								<input type="radio" class="btn-check" name="poll"
									id="option2">
								<label class="btn btn-outline-primary w-100"
									for="option2">Our dedicated staff will protect us</label>
								</div>
								<!-- Feed poll item -->
								<div>
								<input type="radio" class="btn-check" name="poll"
									id="option3">
								<label class="btn btn-outline-primary w-100"
									for="option3">We give regular training for best
									practices</label>
								</div>
								<!-- Feed poll item -->
								<div>
								<input type="radio" class="btn-check" name="poll"
									id="option4">
								<label class="btn btn-outline-primary w-100"
									for="option4">Third-party vendor protection</label>
								</div>
							</div>
			
							<!-- Feed poll votes START -->
							<ul class="nav nav-divider mt-2 mb-0">
								<li class="nav-item">
								<a class="nav-link" href="#">263 votes</a>
								</li>
								<li class="nav-item">
								<a class="nav-link" href="#">2d left</a>
								</li>
							</ul>
							<!-- Feed poll votes ED -->
			
							<!-- Feed react START -->
							<ul class="nav nav-stack pb-2 small mt-4">
								<li class="nav-item">
								<a class="nav-link active text-secondary" href="#!"> <i
									class="bi bi-heart-fill me-1 icon-xs bg-danger text-white rounded-circle"></i>
									Louis, Billy and 126 others </a>
								</li>
								<li class="nav-item ms-sm-auto">
								<a class="nav-link" href="#!"> <i
									class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
								</li>
							</ul>
							<!-- Feed react END -->
							</div>
							<!-- Card body END -->
							<!-- Card Footer START -->
							<div class="card-footer py-3">
							<!-- Feed react START -->
							<ul class="nav nav-fill nav-stack small">
								<li class="nav-item">
								<a class="nav-link mb-0 active" href="#!"> <i
									class="bi bi-heart pe-1"></i>Liked (56)</a>
								</li>
								<!-- Card share action dropdown START -->
								<li class="nav-item dropdown">
								<a href="#" class="nav-link mb-0" id="feedActionShare6"
									data-bs-toggle="dropdown" aria-expanded="false">
									<i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share
									(3)
								</a>
								<!-- Card share action dropdown menu -->
								<ul class="dropdown-menu dropdown-menu-end"
									aria-labelledby="feedActionShare6">
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-envelope fa-fw pe-2"></i>Send via
										Direct Message</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark
									</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-link fa-fw pe-2"></i>Copy link to
										post</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-share fa-fw pe-2"></i>Share post via
										…</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-pencil-square fa-fw pe-2"></i>Share to
										News Feed</a></li>
								</ul>
								</li>
								<!-- Card share action dropdown END -->
								<li class="nav-item">
								<a class="nav-link mb-0" href="#!"> <i
									class="bi bi-send-fill pe-1"></i>Send</a>
								</li>
							</ul>
							<!-- Feed react END -->
							</div>
							<!-- Card Footer END -->
						</div>
						<!-- Card feed item END -->
			
						<!-- Card feed item START -->
						<div class="card">
							<!-- Card header START -->
							<div class="card-header">
							<div class="d-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-2">
									<a href="#!"> <img class="avatar-img rounded-circle"
										src="assets/img/template/logo/11.svg" alt> </a>
								</div>
								<!-- Info -->
								<div>
									<h6 class="card-title mb-0"> <a href="#!"> Webestica
									</a></h6>
									<p class="small mb-0">9 december at 10:00 </p>
								</div>
								</div>
								<!-- Card share action START -->
								<div class="dropdown">
								<a href="#"
									class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
									id="cardShareAction8" data-bs-toggle="dropdown"
									aria-expanded="false">
									<i class="bi bi-three-dots"></i>
								</a>
								<!-- Card share action dropdown menu -->
								<ul class="dropdown-menu dropdown-menu-end"
									aria-labelledby="cardShareAction8">
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-bookmark fa-fw pe-2"></i>Save
										post</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori
										ferguson </a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-x-circle fa-fw pe-2"></i>Hide
										post</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-flag fa-fw pe-2"></i>Report
										post</a></li>
								</ul>
								</div>
								<!-- Card share action START -->
							</div>
							</div>
							<!-- Card header START -->
			
							<!-- Card body START -->
							<div class="card-body">
							<p class="mb-0">The next-generation blog, news, and magazine
								theme for you to start sharing your content today with
								beautiful aesthetics! This minimal & clean Bootstrap 5 based
								theme is ideal for all types of sites that aim to provide
								users with content. <a href="#!"> #bootstrap</a> <a href="#!">
								#webestica </a> <a href="#!"> #getbootstrap</a> <a href="#">
								#bootstrap5 </a></p>
							</div>
							<!-- Card body END -->
							<a href="#!"> <img src="assets/img/template/post/3by2/03.jpg" alt> </a>
							<!-- Card body START -->
							<div class="card-body position-relative bg-light">
							<a href="#!"
								class="small stretched-link">https://blogzine.webestica.com</a>
							<h6 class="mb-0 mt-1">Blogzine - Blog and Magazine Bootstrap 5
								Theme</h6>
							<p class="mb-0 small">Bootstrap based News, Magazine and Blog
								Theme</p>
							</div>
							<!-- Card body END -->
			
							<!-- Card Footer START -->
							<div class="card-footer py-3">
							<!-- Feed react START -->
							<ul class="nav nav-fill nav-stack small">
								<li class="nav-item">
								<a class="nav-link mb-0 active" href="#!"> <i
									class="bi bi-heart pe-1"></i>Liked (56)</a>
								</li>
								<li class="nav-item">
								<a class="nav-link mb-0" href="#!"> <i
									class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
								</li>
								<!-- Card share action dropdown START -->
								<li class="nav-item dropdown">
								<a href="#" class="nav-link mb-0" id="feedActionShare7"
									data-bs-toggle="dropdown" aria-expanded="false">
									<i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share
									(3)
								</a>
								<!-- Card share action dropdown menu -->
								<ul class="dropdown-menu dropdown-menu-end"
									aria-labelledby="feedActionShare7">
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-envelope fa-fw pe-2"></i>Send via
										Direct Message</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark
									</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-link fa-fw pe-2"></i>Copy link to
										post</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-share fa-fw pe-2"></i>Share post via
										…</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-pencil-square fa-fw pe-2"></i>Share to
										News Feed</a></li>
								</ul>
								</li>
								<!-- Card share action dropdown END -->
								<li class="nav-item">
								<a class="nav-link mb-0" href="#!"> <i
									class="bi bi-send-fill pe-1"></i>Send</a>
								</li>
							</ul>
							<!-- Feed react END -->
							</div>
							<!-- Card Footer END -->
			
						</div>
						<!-- Card feed item END -->
			
						<!-- Card feed item START -->
						<div class="card">
							<!-- Card header START -->
							<div class="card-header border-0 pb-0">
							<div class="d-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar avatar-story me-2">
									<a href="#!"> <img class="avatar-img rounded-circle"
										src="assets/img/template/avatar/12.jpg" alt> </a>
								</div>
								<!-- Info -->
								<div>
									<div class="nav nav-divider">
									<h6 class="nav-item card-title mb-0"> <a href="#!"> Joan
										Wallace </a></h6>
									<span class="nav-item small"> 1day</span>
									</div>
									<p class="mb-0 small">12 January at 12:00</p>
								</div>
								</div>
								<!-- Card feed action dropdown START -->
								<div class="dropdown">
								<a href="#"
									class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
									id="cardFeedAction2" data-bs-toggle="dropdown"
									aria-expanded="false">
									<i class="bi bi-three-dots"></i>
								</a>
								<!-- Card feed action dropdown menu -->
								<ul class="dropdown-menu dropdown-menu-end"
									aria-labelledby="cardFeedAction2">
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-bookmark fa-fw pe-2"></i>Save
										post</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori
										ferguson </a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-x-circle fa-fw pe-2"></i>Hide
										post</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-flag fa-fw pe-2"></i>Report
										post</a></li>
								</ul>
								</div>
								<!-- Card feed action dropdown END -->
							</div>
							</div>
							<!-- Card header END -->
							<!-- Card body START -->
							<div class="card-body pb-0">
							<p>Comfort reached gay perhaps chamber his <a
								href="#!">#internship</a> <a href="#!">#hiring</a> <a
								href="#!">#apply</a> </p>
							</div>
							<!-- Card img -->
							<div class="overflow-hidden fullscreen-video w-100">
			
							<!-- HTML video START -->
							<div class="player-wrapper overflow-hidden">
								<video class="player-html" controls crossorigin="anonymous"
								poster="assets/img/template/videos/poster.jpg">
								<source src="assets/img/template/videos/video-feed.mp4"
									type="video/mp4">
								</video>
							</div>
							<!-- HTML video END -->
			
							<!-- Plyr resources and browser polyfills are specified in the pen settings -->
							</div>
							<!-- Feed react START -->
							<div class="card-body pt-0">
							<!-- Feed react START -->
							<ul
								class="nav nav-pills nav-pills-light nav-fill nav-stack small border-top border-bottom py-1 my-3">
								<li class="nav-item">
								<a class="nav-link mb-0 active" href="#!"> <i
									class="bi bi-heart pe-1"></i>Liked (56)</a>
								</li>
								<li class="nav-item">
								<a class="nav-link mb-0" href="#!"> <i
									class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
								</li>
								<!-- Card share action menu START -->
								<li class="nav-item dropdown">
								<a href="#" class="nav-link mb-0" id="cardShareAction9"
									data-bs-toggle="dropdown" aria-expanded="false">
									<i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share
									(3)
								</a>
								<!-- Card share action dropdown menu -->
								<ul class="dropdown-menu dropdown-menu-end"
									aria-labelledby="cardShareAction9">
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-envelope fa-fw pe-2"></i>Send via
										Direct Message</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark
									</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-link fa-fw pe-2"></i>Copy link to
										post</a></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-share fa-fw pe-2"></i>Share post via
										…</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#"> <i
										class="bi bi-pencil-square fa-fw pe-2"></i>Share to
										News Feed</a></li>
								</ul>
								</li>
								<!-- Card share action menu END -->
								<li class="nav-item">
								<a class="nav-link mb-0" href="#!"> <i
									class="bi bi-send-fill pe-1"></i>Send</a>
								</li>
							</ul>
							<!-- Feed react START -->
			
							<!-- Add comment -->
							<div class="d-flex mb-3">
								<!-- Avatar -->
								<div class="avatar avatar-xs me-2">
								<a href="#!"> <img class="avatar-img rounded-circle"
									src="assets/img/template/avatar/12.jpg" alt> </a>
								</div>
								<!-- Comment box  -->
								<!-- Comment box  -->
								<form class="position-relative w-100">
								<textarea class="form-control pe-4 bg-light" data-autoresize
									rows="1" placeholder="Add a comment..."></textarea>
								<!-- Emoji button -->
								<div class="position-absolute top-0 end-0">
									<button class="second-btn btn" type="button">🙂</button>
								</div>
								</form>
							</div>
							<!-- Comment wrap START -->
							<ul class="comment-wrap list-unstyled mb-0">
								<!-- Comment item START -->
								<li class="comment-item">
								<div class="d-flex">
									<!-- Avatar -->
									<div class="avatar avatar-xs">
									<a href="#!"><img class="avatar-img rounded-circle"
										src="assets/img/template/avatar/05.jpg" alt></a>
									</div>
									<div class="ms-2">
									<!-- Comment by -->
									<div class="bg-light rounded-start-top-0 p-3 rounded">
										<div class="d-flex justify-content-between">
										<h6 class="mb-1"> <a href="#!"> Frances Guerrero
											</a></h6>
										<small class="ms-2">5hr</small>
										</div>
										<p class="small mb-0">Preference any astonished
										unreserved Mrs.</p>
									</div>
									<!-- Comment react -->
									<ul class="nav nav-divider py-2 small">
										<li class="nav-item">
										<a class="nav-link" href="#!"> Like (3)</a>
										</li>
										<li class="nav-item">
										<a class="nav-link" href="#!"> Reply</a>
										</li>
										<li class="nav-item">
										<a class="nav-link" href="#!"> View 5 replies</a>
										</li>
									</ul>
									</div>
								</div>
								<!-- Comment item nested START -->
								<ul class="comment-item-nested list-unstyled">
									<!-- Comment item START -->
									<li class="comment-item">
									<div class="d-flex">
										<!-- Avatar -->
										<div class="avatar avatar-xs">
										<a href="#!"><img class="avatar-img rounded-circle"
											src="assets/img/template/avatar/06.jpg" alt></a>
										</div>
										<!-- Comment by -->
										<div class="ms-2">
										<div class="bg-light p-3 rounded">
											<div class="d-flex justify-content-between">
											<h6 class="mb-1"> <a href="#!"> Lori Stevens
												</a> </h6>
											<small class="ms-2">2hr</small>
											</div>
											<p class="small mb-0">Dependent on so extremely
											delivered by. Yet no jokes worse her why.</p>
										</div>
										<!-- Comment react -->
										<ul class="nav nav-divider py-2 small">
											<li class="nav-item">
											<a class="nav-link" href="#!"> Like (5)</a>
											</li>
											<li class="nav-item">
											<a class="nav-link" href="#!"> Reply</a>
											</li>
										</ul>
										</div>
									</div>
									</li>
									<!-- Comment item END -->
								</ul>
								<!-- Comment item nested END -->
								</li>
								<!-- Comment item END -->
							</ul>
							<!-- Comment wrap END -->
							</div>
							<!-- Card body END -->
							<!-- Card footer START -->
							<div class="card-footer border-0 pt-0">
							<!-- Load more comments -->
							<a href="#!" role="button"
								class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center"
								data-bs-toggle="button" aria-pressed="true">
								<div class="spinner-dots me-2">
								<span class="spinner-dot"></span>
								<span class="spinner-dot"></span>
								<span class="spinner-dot"></span>
								</div>
								Load more comments
							</a>
							</div>
							<!-- Card footer END -->
						</div>
						<!-- Card feed item END -->
			
						<!-- Load more button START -->
						<a href="#!" role="button" class="btn btn-loader btn-primary-soft"
							data-bs-toggle="button" aria-pressed="true">
							<span class="load-text"> Load more </span>
							<div class="load-icon">
							<div class="spinner-grow spinner-grow-sm" role="status">
								<span class="visually-hidden">Loading...</span>
							</div>
							</div>
						</a>
						<!-- Load more button END -->
			
					</div>
					<!-- Main content END -->

					<!-- Right sidebar START -->
					<div class="col-lg-3 mt-0">
						<div class="row g-4">
							<!-- Card follow START -->
							<div class="col-sm-6 col-lg-12">
								<div class="card">
									<!-- Card header START -->
									<div class="card-header pb-0 border-0">
										<h5 class="card-title mb-0">Who to follow</h5>
									</div>
									<!-- Card header END -->
									<!-- Card body START -->
									<div class="card-body">
										<!-- Connection item START -->
										<div class="hstack gap-2 mb-3">
											<!-- Avatar -->
											<div class="avatar">
												<a href="#!"><img class="avatar-img rounded-circle"
														src="assets/img/template/avatar/04.jpg" alt></a>
											</div>
											<!-- Title -->
											<div class="overflow-hidden">
												<a class="h6 mb-0" href="#!">Judy Nguyen </a>
												<p class="mb-0 small text-truncate">News anchor</p>
											</div>
											<!-- Button -->
											<a class="btn btn-primary-soft rounded-circle icon-md ms-auto"
												href="#"><i class="fa-solid fa-plus"> </i></a>
										</div>
										<!-- Connection item END -->
										<!-- Connection item START -->
										<div class="hstack gap-2 mb-3">
											<!-- Avatar -->
											<div class="avatar avatar-story">
												<a href="#!"> <img class="avatar-img rounded-circle"
														src="assets/img/template/avatar/05.jpg" alt> </a>
											</div>
											<!-- Title -->
											<div class="overflow-hidden">
												<a class="h6 mb-0" href="#!">Amanda Reed </a>
												<p class="mb-0 small text-truncate">Web Developer</p>
											</div>
											<!-- Button -->
											<a class="btn btn-primary-soft rounded-circle icon-md ms-auto"
												href="#"><i class="fa-solid fa-plus"> </i></a>
										</div>
										<!-- Connection item END -->

										<!-- Connection item START -->
										<div class="hstack gap-2 mb-3">
											<!-- Avatar -->
											<div class="avatar">
												<a href="#"> <img class="avatar-img rounded-circle"
														src="assets/img/template/avatar/11.jpg" alt> </a>
											</div>
											<!-- Title -->
											<div class="overflow-hidden">
												<a class="h6 mb-0" href="#!">Billy Vasquez </a>
												<p class="mb-0 small text-truncate">News anchor</p>
											</div>
											<!-- Button -->
											<a class="btn btn-primary rounded-circle icon-md ms-auto" href="#"><i
													class="bi bi-person-check-fill"> </i></a>
										</div>
										<!-- Connection item END -->

										<!-- Connection item START -->
										<div class="hstack gap-2 mb-3">
											<!-- Avatar -->
											<div class="avatar">
												<a href="#"> <img class="avatar-img rounded-circle"
														src="assets/img/template/avatar/01.jpg" alt> </a>
											</div>
											<!-- Title -->
											<div class="overflow-hidden">
												<a class="h6 mb-0" href="#!">Lori Ferguson </a>
												<p class="mb-0 small text-truncate">Web Developer at Webestica</p>
											</div>
											<!-- Button -->
											<a class="btn btn-primary-soft rounded-circle icon-md ms-auto"
												href="#"><i class="fa-solid fa-plus"> </i></a>
										</div>
										<!-- Connection item END -->

										<!-- Connection item START -->
										<div class="hstack gap-2 mb-3">
											<!-- Avatar -->
											<div class="avatar">
												<a href="#"> <img class="avatar-img rounded-circle"
														src="assets/img/template/avatar/placeholder.jpg" alt> </a>
											</div>
											<!-- Title -->
											<div class="overflow-hidden">
												<a class="h6 mb-0" href="#!">Carolyn Ortiz </a>
												<p class="mb-0 small text-truncate">News anchor</p>
											</div>
											<!-- Button -->
											<a class="btn btn-primary-soft rounded-circle icon-md ms-auto"
												href="#"><i class="fa-solid fa-plus"> </i></a>
										</div>
										<!-- Connection item END -->

										<!-- View more button -->
										<div class="d-grid mt-3">
											<a class="btn btn-sm btn-primary-soft" href="#!">View more</a>
										</div>
									</div>
									<!-- Card body END -->
								</div>
							</div>
							<!-- Card follow START -->

							<!-- Card News START -->
							<div class="col-sm-6 col-lg-12">
								<div class="card">
									<!-- Card header START -->
									<div class="card-header pb-0 border-0">
										<h5 class="card-title mb-0">Today’s news</h5>
									</div>
									<!-- Card header END -->
									<!-- Card body START -->
									<div class="card-body">
										<!-- News item -->
										<div class="mb-3">
											<h6 class="mb-0"><a href="blog-details.html">Ten questions you should
													answer truthfully</a></h6>
											<small>2hr</small>
										</div>
										<!-- News item -->
										<div class="mb-3">
											<h6 class="mb-0"><a href="blog-details.html">Five unbelievable facts
													about money</a></h6>
											<small>3hr</small>
										</div>
										<!-- News item -->
										<div class="mb-3">
											<h6 class="mb-0"><a href="blog-details.html">Best Pinterest Boards
													for learning about business</a></h6>
											<small>4hr</small>
										</div>
										<!-- News item -->
										<div class="mb-3">
											<h6 class="mb-0"><a href="blog-details.html">Skills that you can
													learn from business</a></h6>
											<small>6hr</small>
										</div>
										<!-- Load more comments -->
										<a href="#!" role="button"
											class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center"
											data-bs-toggle="button" aria-pressed="true">
											<div class="spinner-dots me-2">
												<span class="spinner-dot"></span>
												<span class="spinner-dot"></span>
												<span class="spinner-dot"></span>
											</div>
											View all latest news
										</a>
									</div>
									<!-- Card body END -->
								</div>
							</div>
							<!-- Card News END -->
						</div>
					</div>
					<!-- Right sidebar END -->
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
                        document.getElementById('contents').innerHTML = '<div class="col-lg-3 mt-0">' +
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
                                                                            '</div>';
                        break;
                    case 'discover':
                        document.title = '{{ __("miscellaneous.menu.discover") }}'
                        document.getElementById('contents').innerHTML = '<div class="col-lg-3 mt-0">' +
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
                                                                            '</div>';
                        break;
                    case 'cart':
                        document.title = '{{ __("miscellaneous.menu.public.orders.cart.title") }}'
                        document.getElementById('contents').innerHTML = '<div class="col-lg-3 mt-0">' +
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
                                                                            '</div>';
                        break;
                    case 'notifications':
                        document.title = '{{ __("miscellaneous.menu.notifications.title") }}'
                        document.getElementById('contents').innerHTML = '<div class="col-lg-3 mt-0">' +
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
                                                                            '</div>';
                        break;
                    case 'communities':
                        document.title = '{{ __("miscellaneous.menu.public.communities.title") }}'
                        document.getElementById('contents').innerHTML = '<div class="col-lg-3 mt-0">' +
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
                                                                            '</div>';
                        break;
                    case 'events':
                        document.title = '{{ __("miscellaneous.menu.public.events.title") }}'
                        document.getElementById('contents').innerHTML = '<div class="col-lg-3 mt-0">' +
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
                                                                            '</div>';
                        break;
                    case 'messages':
                        document.title = '{{ __("miscellaneous.menu.messages") }}'
                        document.getElementById('contents').innerHTML = '<div class="col-lg-3 mt-0">' +
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
                    document.getElementById('contents').innerHTML = html;

                    // Update history
                    history.pushState({ url: url }, '', url);
					loadScriptsInParallel(scripts);
					setActiveLink(ref)

                }).catch(error => {
                    document.getElementById('contents').innerHTML = `<div class="col-sm-6 mx-auto pt-5"><div class="mt-5 bg-image d-flex justify-content-center"><img src="/assets/img/logo.png" width="160"><div class="mask"></div></div><h1 class="mb-0 text-center">${error}</h1></div>`;
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
                        document.getElementById('contents').innerHTML = html;

                    }).catch(error => {
                        console.error('Erreur lors du chargement :', error);
                    });

                } else {
                    // Shows the page with the logo if the status is null
                    document.getElementById('contents').innerHTML = '<h1>Bienvenue sur la page d\'accueil</h1>';
                }
            };

			function setActiveLink(activePage) {
				const navLinks = document.querySelectorAll('.nav-link');

				navLinks.forEach(link => {
					link.classList.remove('active'); // Removes the "active" class from all links

					const icon = link.children[0]; // Select the icon in the link

					console.log(icon);

					// Reset the icon to its default state
					icon.classList.remove('bi-house-fill', 'bi-compass-fill', 'bi-basket3-fill', 'bi-bell-fill', 'bi-people-fill', 'bi-calendar-event-fill', 'bi-chat-quote-fill');
					icon.classList.add(icon.classList[1]); // Resets the default class without "-fill"

					if (link.getAttribute('data-page') === activePage) {
						link.classList.add('active'); // Adds the "active" class to the corresponding link

						// Change the icon class
						switch (activePage) {
							case 'home':
								const icon = link.children[0]; // Select the icon in the link

								icon.classList.remove('bi-house');
								icon.classList.add('bi-house-fill');
								break;

							case 'discover':
								icon.classList.remove('bi-compass');
								icon.classList.add('bi-compass-fill');
								break;

							case 'cart':
								icon.classList.remove('bi-basket3');
								icon.classList.add('bi-basket3-fill');
								break;

							case 'notification':
								icon.classList.remove('bi-bell');
								icon.classList.add('bi-bell-fill');
								break;

							case 'community':
								icon.classList.remove('bi-people');
								icon.classList.add('bi-people-fill');
								break;

							case 'event':
								icon.classList.remove('bi-calendar-event');
								icon.classList.add('bi-calendar-event-fill');
								break;

							case 'message':
								icon.classList.remove('bi-chat-quote');
								icon.classList.add('bi-chat-quote-fill');
								break;

							default:
								break;
						}
					}
				});
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
