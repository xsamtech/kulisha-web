@extends('layouts.app', ['page_title' => 'Kulisha / ' . __('miscellaneous.menu.public.orders.cart.title')])

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
											</div>
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
					<div id="partial2" class="col-lg-6 col-md-8 mx-auto vstack gap-4 mt-0">
						<!-- Discovery START
						<div class="">
                        </div> -->
                        <p class="lead">@lang('miscellaneous.menu.public.orders.cart.title')</p>
						<!-- Discovery END -->

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
					<div id="partial3" class="col-lg-3 col-md-4 mx-auto mt-0">
						<div class="row g-4">
							<!-- Card follow START -->
							<div class="col-lg-12">
								<div class="card">
									<!-- Card header START -->
									<div class="card-header pb-0 border-0">
										<h5 class="card-title mb-0">Suggestions</h5>
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
						</div>
					</div>
					<!-- Right sidebar END -->

@endsection
