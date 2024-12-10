@extends('layouts.app', ['page_title' => 'Kulisha / ' . __('miscellaneous.menu.public.news_feed')])

@section('app-content')

					<!-- Sidenav START -->
					<div id="partial1" class="col-lg-3 mt-0 d-lg-inline-block d-sm-none d-block">
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
									{{-- CURRENT USER --}}
									<!-- Card START -->
									<div class="card overflow-hidden">
										<!-- Cover image -->
										<div class="h-50px" style="background-image:url({{ asset($current_user['cover_photo_path']) }}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
										<!-- Card body START -->
										<div class="card-body pt-0">
											<div class="text-center">
												<!-- Avatar -->
												<div class="avatar avatar-lg mt-n5 mb-3">
													<a href="{{ route('profile.home', ['username' => $current_user['username']]) }}">
														<img class="avatar-img rounded" src="{{ asset($current_user['profile_photo_path']) }}" alt>
													</a>
												</div>

												<!-- Info -->
												<h5 class="mb-0"> <a href="{{ route('profile.home', ['username' => $current_user['username']]) }}">{{ $current_user['firstname'] . ' ' . $current_user['lastname'] }}</a></h5>
												<small>{{ '@' . $current_user['username'] }}</small>
												<p class="mt-3">
													{{ $current_user['about_me'] }}
												</p>

												<!-- User stat START -->
												<div class="hstack gap-2 gap-xl-3 justify-content-center">
													<!-- User stat item -->
													<div title="{{ formatIntegerNumber(count($current_user['regular_posts'])) . ' ' . strtolower(trans_choice('miscellaneous.public.profile.statistics.post', count($current_user['regular_posts']))) }}" data-bs-toggle="tooltip" data-bs-placement="bottom">
														<h6 class="mb-0 small">{{ !empty($current_user['regular_posts']) ? thousandsCurrencyFormat(count($current_user['regular_posts'])) : 0 }}</h6>
														<small class="kls-fs-7">{{ Str::limit(trans_choice('miscellaneous.public.profile.statistics.post', count($current_user['regular_posts'])), (str_starts_with(app()->getLocale(), 'fr') ? 7 : 8), '...') }}</small>
													</div>
													<!-- Divider -->
													<div class="vr" style="z-index: 9999;"></div>
													<!-- User stat item -->
													<div title="{{ formatIntegerNumber(count($current_user['followers'])) . ' ' . strtolower(trans_choice('miscellaneous.public.profile.statistics.follower', count($current_user['followers']))) }}" data-bs-toggle="tooltip" data-bs-placement="bottom">
														<h6 class="mb-0 small">{{ !empty($current_user['followers']) ? thousandsCurrencyFormat(count($current_user['followers'])) : 0 }}</h6>
														<small class="kls-fs-7">{{ Str::limit(trans_choice('miscellaneous.public.profile.statistics.follower', count($current_user['followers'])), (str_starts_with(app()->getLocale(), 'fr') ? 7 : 8), '...') }}</small>
													</div>
													<!-- Divider -->
													<div class="vr" style="z-index: 9999;"></div>
													<!-- User stat item -->
													<div title="{{ formatIntegerNumber(count($current_user['following'])) . ' ' . strtolower(trans_choice('miscellaneous.public.profile.statistics.following', count($current_user['following']))) }}" data-bs-toggle="tooltip" data-bs-placement="bottom">
														<h6 class="mb-0 small">{{ !empty($current_user['following']) ? thousandsCurrencyFormat(count($current_user['following'])) : 0 }}</h6>
														<small class="kls-fs-7">{{ Str::limit(trans_choice('miscellaneous.public.profile.statistics.following', count($current_user['following'])), (str_starts_with(app()->getLocale(), 'fr') ? 7 : 8), '...') }}</small>
													</div>
												</div>

												<!-- Divider -->
												<hr>
											</div>

											<!-- Side Nav START -->
											<ul class="nav nav-link-secondary flex-column fw-bold gap-2">
												<li class="nav-item">
													<a class="nav-link" href="{{ route('profile.entity', ['username' => $current_user['username'], 'entity' => 'connections']) }}">
														<span class="d-inline-block" style="width: 32px;"><i class="fa-solid fa-users fs-5 text-danger"></i></span>
														@lang('miscellaneous.menu.public.profile.connections')
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="{{ route('profile.entity', ['username' => $current_user['username'], 'entity' => 'products']) }}">
														<span class="d-inline-block" style="width: 32px;"><i class="fa-solid fa-basket-shopping fs-5 text-success-emphasis"></i></span>
														@lang('miscellaneous.menu.public.profile.products')
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="{{ route('profile.entity', ['username' => $current_user['username'], 'entity' => 'services']) }}">
														<span class="d-inline-block" style="width: 32px;"><i class="fa-solid fa-people-carry-box fs-5 text-warning-emphasis"></i></span>
														@lang('miscellaneous.menu.public.profile.services')
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="{{ route('profile.entity', ['username' => $current_user['username'], 'entity' => 'my_activities']) }}">
														<span class="d-inline-block" style="width: 32px;"><i class="fa-regular fa-clock-four fs-5 text-primary"></i></span>
														@lang('miscellaneous.menu.public.profile.my_activities')
													</a>
												</li>
											</ul>
											<!-- Side Nav END -->
										</div>
										<!-- Card body END -->

										<!-- Card footer -->
										<div class="card-footer text-center py-2">
											<a class="btn btn-link btn-sm" href="{{ route('profile.home', ['username' => $current_user['username']]) }}">@lang('miscellaneous.public.home.view_profile')</a>
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
					<div id="partial2" class="col-lg-6 col-md-8 mx-auto vstack gap-4 mt-0">
						<!-- Story START -->
						<div class="d-flex gap-3 mb-n3">
							<div class="position-relative text-center">
								<!-- Card START -->
								<a role="button" class="small fw-normal text-secondary" data-bs-toggle="modal" data-bs-target="#modalCreateStory">
									<span class="stretched-link btn btn-dark rounded-circle icon-xxl rounded-circle">
										<i class="fa-solid fa-plus fs-6"></i>
									</span>
									<p class="mb-0 kls-line-height-1_25" style="margin-top: 0.55rem;">@lang('miscellaneous.public.home.stories.new')</p>
								</a>
								<!-- Card END -->
							</div>
							<!-- Stories -->
							<div id="stories" class="storiesWrapper stories user-icon carousel scroll-enable"></div>
						</div>
						<!-- Story END -->

						<!-- Share feed START -->
						<div id="newShare" class="card card-body">
							<div class="d-flex mb-3">
								<!-- Avatar -->
								<div class="avatar avatar-xs me-2">
									<a href="{{ route('profile.home', ['username' => $current_user['username']]) }}">
										<img class="avatar-img rounded-circle" src="{{ asset($current_user['profile_photo_path']) }}" alt>
									</a>
								</div>

								<!-- Post input -->
								<form class="w-100">
									<input id="post-text" class="form-control pe-4 border-0" placeholder="@lang('miscellaneous.public.home.posts.new.description')" data-bs-toggle="modal" data-bs-target="#modalCreatePost">
								</form>
							</div>

							<!-- Share feed toolbar START -->
							<div class="d-flex flex-row mb-2">
								<button class="flex-fill btn btn-sm btn-light me-2 py-1 px-2 mb-0 text-start text-truncate" data-bs-toggle="modal" data-bs-target="#newEventModal">
									<i class="bi bi-calendar2-event-fill pe-2 fs-6 text-danger"></i><span class="kls-text-secondary">@lang('miscellaneous.public.home.posts.type.event')</span>
								</button>
								<button class="flex-fill btn btn-sm btn-light py-1 px-2 mb-0 text-start text-truncate" data-bs-toggle="modal" data-bs-target="#pollModal">
									<i class="bi bi-list-check pe-2 fs-6 text-warning"></i><span class="kls-text-secondary">@lang('miscellaneous.public.home.posts.type.poll.label')</span>
								</button>
							</div>
							<div class="d-flex flex-row">
								<button class="flex-fill btn btn-sm btn-light me-2 py-1 px-2 mb-0 text-start text-truncate" data-bs-toggle="modal" data-bs-target="#anonymousQuestionRequestModal">
									<i class="bi bi-question-circle pe-2 fs-6 text-info"></i><span class="kls-text-secondary">@lang('miscellaneous.public.home.posts.type.anonymous_question.label')</span>
								</button>
								<button class="flex-fill btn btn-sm btn-light py-1 px-2 mb-0 text-start text-truncate" data-bs-toggle="modal" data-bs-target="#feedActionArticle">
									<i class="bi bi-newspaper pe-2 fs-6 text-success"></i><span class="kls-text-secondary">@lang('miscellaneous.public.home.posts.type.article.label')</span>
								</button>
							</div>
						</div>
						<!-- Share feed END -->

						<!-- Card waiting new post -->
						<div id="waitingNewPost" class="card card-body text-center d-none">
							<p class="card-text">@lang('miscellaneous.public.home.posts.new.waiting')</p>
							<div class="text-center loading-spinner">
                                <div class="spinner-grow spinner-grow-lg text-primary" role="status">
                                    <span class="visually-hidden">@lang('miscellaneous.loading')</span>
                                </div>
                            </div>
						</div>

						<div id="newFeedItems" class="d-none"></div>
						<div id="firstFeedItems">
	@forelse ($posts as $post)
		{{-- Design for the poll --}}
		@if ($post['type']['alias'] === 'poll')

		@else
			{{-- Design for anonymous question --}}
			@if ($post['type']['alias'] === 'anonymous_question_request')

			@else
							<div class="card">
								<!-- Card header START -->
								<div class="card-header border-0 pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<div class="d-flex align-items-center">
											<!-- Avatar -->
											<div class="avatar avatar-story me-2">
												<a href="{{ route('profile.home', ['username' => $post['user']['username']]) }}">
													<img class="avatar-img rounded-circle" src="{{ asset($post['user']['profile_photo_path']) }}" alt>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
			@endif
		@endif
	@empty
	@endforelse

						</div>
						<div id="formerFeedItems" class="d-none"></div>

						<!-- Load more button START -->
						<a href="#!" role="button" class="btn btn-loader btn-primary-soft" data-bs-toggle="button" aria-pressed="true">
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
					<div id="partial3" class="col-lg-3 col-md-4 mx-auto mt-0">
						<div class="row g-4">
							<!-- Card follow START -->
							<div class="col-lg-12">
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
												<a href="#!"><img class="avatar-img rounded-circle" src="assets/img/template/avatar/04.jpg" alt></a>
											</div>
											<!-- Title -->
											<div class="overflow-hidden">
												<a class="h6 mb-0" href="#!">Judy Nguyen </a>
												<p class="mb-0 small text-truncate">News anchor</p>
											</div>
											<!-- Button -->
											<a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i class="fa-solid fa-plus"> </i></a>
										</div>
										<!-- Connection item END -->

										<!-- Connection item START -->
										<div class="hstack gap-2 mb-3">
											<!-- Avatar -->
											<div class="avatar avatar-story">
												<a href="#!"><img class="avatar-img rounded-circle" src="assets/img/template/avatar/05.jpg" alt> </a>
											</div>
											<!-- Title -->
											<div class="overflow-hidden">
												<a class="h6 mb-0" href="#!">Amanda Reed </a>
												<p class="mb-0 small text-truncate">Web Developer</p>
											</div>
											<!-- Button -->
											<a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i class="fa-solid fa-plus"> </i></a>
										</div>
										<!-- Connection item END -->

										<!-- Connection item START -->
										<div class="hstack gap-2 mb-3">
											<!-- Avatar -->
											<div class="avatar">
												<a href="#"> <img class="avatar-img rounded-circle" src="assets/img/template/avatar/11.jpg" alt> </a>
											</div>
											<!-- Title -->
											<div class="overflow-hidden">
												<a class="h6 mb-0" href="#!">Billy Vasquez </a>
												<p class="mb-0 small text-truncate">News anchor</p>
											</div>
											<!-- Button -->
											<a class="btn btn-primary rounded-circle icon-md ms-auto" href="#"><i class="bi bi-person-check-fill"> </i></a>
										</div>
										<!-- Connection item END -->

										<!-- Connection item START -->
										<div class="hstack gap-2 mb-3">
											<!-- Avatar -->
											<div class="avatar">
												<a href="#"> <img class="avatar-img rounded-circle" src="assets/img/template/avatar/01.jpg" alt> </a>
											</div>
											<!-- Title -->
											<div class="overflow-hidden">
												<a class="h6 mb-0" href="#!">Lori Ferguson </a>
												<p class="mb-0 small text-truncate">Web Developer at Webestica</p>
											</div>
											<!-- Button -->
											<a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i class="fa-solid fa-plus"> </i></a>
										</div>
										<!-- Connection item END -->

										<!-- Connection item START -->
										<div class="hstack gap-2 mb-3">
											<!-- Avatar -->
											<div class="avatar">
												<a href="#"> <img class="avatar-img rounded-circle" src="assets/img/template/avatar/placeholder.jpg" alt> </a>
											</div>
											<!-- Title -->
											<div class="overflow-hidden">
												<a class="h6 mb-0" href="#!">Carolyn Ortiz </a>
												<p class="mb-0 small text-truncate">News anchor</p>
											</div>
											<!-- Button -->
											<a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i class="fa-solid fa-plus"> </i></a>
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
							<div class="col-lg-12">
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
											<h6 class="mb-0"><a href="blog-details.html">Ten questions you should answer truthfully</a></h6>
											<small>2hr</small>
										</div>
										<!-- News item -->
										<div class="mb-3">
											<h6 class="mb-0"><a href="blog-details.html">Five unbelievable facts about money</a></h6>
											<small>3hr</small>
										</div>
										<!-- News item -->
										<div class="mb-3">
											<h6 class="mb-0"><a href="blog-details.html">Best Pinterest Boards for learning about business</a></h6>
											<small>4hr</small>
										</div>
										<!-- News item -->
										<div class="mb-3">
											<h6 class="mb-0"><a href="blog-details.html">Skills that you can learn from business</a></h6>
											<small>6hr</small>
										</div>
										<!-- Load more comments -->
										<a href="#!" role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center" data-bs-toggle="button" aria-pressed="true">
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

@endsection
