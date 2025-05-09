@extends('layouts.guest', ['view_title' => 'Kulisha / ' . __('miscellaneous.menu.login_register')])

@section('guest-content')

                <div class="row g-lg-5 g-4">
                    <div class="col-lg-6 col-md-8 col-sm-10 col-12 mx-auto">
                        <!-- Sign in START -->
                        <div class="card card-body text-center p-4 p-sm-5">
                            <!-- Title -->
                            <h1 class="mb-4 kls-lime-green-text">@lang('miscellaneous.login_title2')</h1>

                            <!-- Form START -->
                            <form id="login_form" onkeyup="toggleSubmit('login');">
                                <!-- Email, Phone or Username -->
                                <div class="mt-4 mb-3 input-group-lg">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="@lang('miscellaneous.login_username')" autofocus>
                                </div>

                                <!-- Password -->
                                <div class="mb-3 position-relative">
                                    <!-- Password -->
                                    <div class="input-group input-group-lg">
                                        <input type="password" name="password" id="password" class="form-control fakepassword" placeholder="@lang('miscellaneous.password.label')">
                                        <span class="input-group-text p-0">
                                            <i class="fakepasswordicon fa-solid fa-eye-slash cursor-pointer p-2 w-40px"></i>
                                        </span>
                                    </div>
                                </div>

                                <!-- Remember me -->
                                <div class="mb-4 d-sm-flex justify-content-between">
                                    <div>
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                        <label class="form-check-label" for="remember">@lang('miscellaneous.remember_me')</label>
                                    </div>
                                    <a href="{{ route('password.request') }}" role="button">@lang('miscellaneous.forgotten_password')</a>
                                </div>

                                <!-- Button -->
                                <div class="d-grid">
                                    <button id="submit" class="btn btn-lg btn-primary-soft rounded-pill position-relative disabled">
                                        <span class="text-uppercase d-inline-block mb-1">@lang('auth.login')</span>
                                        <div class="spinner-border text-white position-absolute opacity-0" style="top: 9px; right: 11px;" role="status"><span class="visually-hidden">@lang('miscellaneous.loading')</span></div>
                                    </button>
                                </div>
                                <!-- Register -->
                                <p class="mt-4 mb-0" style="line-height: 20px;">@lang('miscellaneous.not_member')<a href="" role="button"> <br class="d-sm-none d-block">@lang('miscellaneous.register_title2')</a></p>
                            </form>
                            <!-- Form END -->
                        </div>
                        <!-- Sign in END -->
                    </div>

                    <div class="col-lg-6 col-sm-10 col-12 mx-auto">
                        <div class="row mt-2 d-lg-block d-none">
                            <div class="col-sm-6">
                                <div class="bg-image">
                                    <img src="{{ asset('assets/img/brand.png') }}" alt="Kulisha" class="img-fluid kulisha-brand">
                                    <div class="mask"><a href="{{ route('home') }}"></a></div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-lg-4">
                            <div class="col-12 text-sm-start text-center">
                                {{-- <h1 class="display-6 mt-0 mb-4 text-warning-emphasis fw-light">@lang('miscellaneous.welcome_title')</h1> --}}

                                <div class="row g-lg-0 g-sm-5 gy-4 mt-3 align-items-center">
                                    <div class="col-lg-3 col-sm-2 justify-content-center">
                                        <div class="card card-body rounded-circle mx-auto text-center" style="width: 6rem; height: 6rem;">
                                            <h2 class="m-0 pt-sm-2 pt-3"><i class="fa-solid fa-basket-shopping text-danger"></i></h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-sm-10">
                                        <p class="lh-sm fs-5 fw-light">@lang('miscellaneous.welcome_description.product.content')</p>
                                    </div>
                                </div>

                                <div class="row g-lg-0 g-sm-5 gy-4 mt-3 align-items-center">
                                    <div class="col-lg-3 col-sm-2 justify-content-center">
                                        <div class="card card-body rounded-circle mx-auto text-center" style="width: 6rem; height: 6rem;">
                                            <h2 class="m-0 pt-sm-2 pt-3"><i class="fa-solid fa-people-carry-box text-warning-emphasis"></i></h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-sm-10">
                                        <p class="lh-sm fs-5 fw-light">@lang('miscellaneous.welcome_description.service.content')</p>
                                    </div>
                                </div>

                                <div class="row g-lg-0 g-sm-5 gy-4 mt-3 align-items-center">
                                    <div class="col-lg-3 col-sm-2 justify-content-center">
                                        <div class="card card-body rounded-circle mx-auto text-center" style="width: 6rem; height: 6rem;">
                                            <h2 class="m-0 pt-sm-2 pt-3"><i class="fa-solid fa-plate-wheat text-primary"></i></h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-sm-10">
                                        <p class="lh-sm fs-5 fw-light">@lang('miscellaneous.welcome_description.food.content')</p>
                                    </div>
                                </div>

                                <div class="row g-lg-0 g-sm-5 gy-4 mt-3 align-items-center">
                                    <div class="col-lg-3 col-sm-2 justify-content-center">
                                        <div class="card card-body rounded-circle mx-auto text-center" style="width: 6rem; height: 6rem;">
                                            <h2 class="m-0 pt-sm-2 pt-3"><i class="fa-solid fa-comments text-success"></i></h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-sm-10">
                                        <p class="lh-sm fs-5 fw-light">@lang('miscellaneous.welcome_description.networking.content')</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Row END -->

@endsection