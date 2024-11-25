        <!-- ======================= Header START -->
        <header class="navbar-light bg-mode fixed-top">
            <!-- Logo Nav START -->
            <nav class="navbar navbar-icon navbar-expand-lg">
                <div class="container">
                    <!-- Logo START -->
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img class="navbar-brand-item" src="{{ asset('assets/img/logo-text.png') }}" alt="Kulisha">
                        {{-- <img class="light-mode-item navbar-brand-item" src="{{ asset('assets/img/brand.png') }}" alt="Kulisha">
                        <img class="dark-mode-item navbar-brand-item" src="{{ asset('assets/img/brand-reverse.png') }}" alt="Kulisha"> --}}
                    </a>
                    <!-- Logo END -->

                    <!-- Responsive navbar toggler -->
                    <button class="navbar-toggler ms-auto icon-md btn btn-light p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-animation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>

                    <!-- Main navbar START -->
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav navbar-nav-scroll mx-auto">
                            <!-- Home -->
                            <li class="nav-item">
                                {{-- <a id="homeLink" class="nav-link{{ Route::is('home') ? ' active' : '' }}" data-page="home" href="{{ route('home') }}" title="@lang('miscellaneous.menu.home')" onclick="navigate('/', this); setActiveLink(this); return false;"> --}}
                                <a id="homeLink" class="nav-link{{ Route::is('home') ? ' active' : '' }}" data-page="home" href="{{ route('home') }}" title="@lang('miscellaneous.menu.home')" data-bs-toggle="tooltip" data-bs-placement="bottom">
{{-- @if (!request()->route()->named('home'))
                                    <div class="badge-notif badge-notif-bottom"></div>
@endif --}}
                                    <i class="bi {{ Route::is('home') ? 'bi-house-fill' : 'bi-house' }}"></i> <span class="nav-text">@lang('miscellaneous.menu.home')</span>
                                </a>
                            </li>

                            <!-- Discover -->
                            <li class="nav-item dropdown">
                                {{-- <a id="discoverLink" class="nav-link{{ Route::is('discover.home') ? ' active' : '' }}" data-page="discover" href="{{ route('discover.home') }}" title="@lang('miscellaneous.menu.discover')" onclick="navigate('/discover', this); setActiveLink(this); return false;"> --}}
                                <a id="discoverLink" class="nav-link{{ Route::is('discover.home') ? ' active' : '' }}" data-page="discover" href="{{ route('discover.home') }}" title="@lang('miscellaneous.menu.discover')" data-bs-toggle="tooltip" data-bs-placement="bottom">
{{-- @if (!request()->route()->named('discover.home'))
                                    <div class="badge-notif badge-notif-bottom"></div>
@endif --}}
                                    <i class="bi {{ Route::is('discover.home') ? 'bi-compass-fill' : 'bi-compass' }}"></i> <span class="nav-text">@lang('miscellaneous.menu.discover')</span>
                                </a>
                            </li>

                            <!-- Orders -->
                            <li class="nav-item dropdown">
                                {{-- <a id="cartLink" class="nav-link{{ Route::is('cart.home') ? ' active' : '' }}" data-page="cart" href="{{ route('cart.home') }}" title="@lang('miscellaneous.menu.public.orders.title')" onclick="navigate('/cart', this); setActiveLink(this); return false;"> --}}
                                <a id="cartLink" class="nav-link{{ Route::is('cart.home') ? ' active' : '' }}" data-page="cart" href="{{ route('cart.home') }}" title="@lang('miscellaneous.menu.public.orders.title')" data-bs-toggle="tooltip" data-bs-placement="bottom">
{{-- @if (!request()->route()->named('cart.home'))
                                    <div class="badge-notif badge-notif-bottom"></div>
@endif --}}
                                    <i class="bi {{ Route::is('cart.home') ? 'bi-basket3-fill' : 'bi-basket3' }}"></i> <span class="nav-text">@lang('miscellaneous.menu.public.orders.title')</span>
                                </a>
                            </li>

                            <!-- Notifications -->
                            <li class="nav-item dropdown">
                                {{-- <a id="notificationLink" class="nav-link{{ Route::is('notification.home') ? ' active' : '' }}" data-page="notification" href="{{ route('notification.home') }}" title="@lang('miscellaneous.menu.notifications.title')" onclick="navigate('/notifications', this); setActiveLink(this); return false;"> --}}
                                <a id="notificationLink" class="nav-link{{ Route::is('notification.home') ? ' active' : '' }}" data-page="notification" href="{{ route('notification.home') }}" title="@lang('miscellaneous.menu.notifications.title')" data-bs-toggle="tooltip" data-bs-placement="bottom">
{{-- @if (!request()->route()->named('notification.home'))
                                    <div class="badge-notif badge-notif-bottom"></div>
@endif --}}
                                    <i class="bi {{ Route::is('notification.home') ? 'bi-bell-fill' : 'bi-bell' }}"></i> <span class="nav-text">@lang('miscellaneous.menu.notifications.title')</span>
                                </a>
                            </li>

                            <!-- Communties -->
                            <li class="nav-item">
                                {{-- <a id="communityLink" class="nav-link{{ Route::is('community.home') ? ' active' : '' }}" data-page="community" href="{{ route('community.home') }}" title="@lang('miscellaneous.menu.public.communities.title')" onclick="navigate('/communities', this); setActiveLink(this); return false;"> --}}
                                <a id="communityLink" class="nav-link{{ Route::is('community.home') ? ' active' : '' }}" data-page="community" href="{{ route('community.home') }}" title="@lang('miscellaneous.menu.public.communities.title')" data-bs-toggle="tooltip" data-bs-placement="bottom">
{{-- @if (!request()->route()->named('community.home'))
                                    <div class="badge-notif badge-notif-bottom"></div>
@endif --}}
                                    <i class="bi {{ Route::is('community.home') ? 'bi-people-fill' : 'bi-people' }}"></i> <span class="nav-text">@lang('miscellaneous.menu.public.communities.title')</span>
                                </a>
                            </li>

                            <!-- Events -->
                            <li class="nav-item">
                                {{-- <a id="eventLink" class="nav-link{{ Route::is('event.home') ? ' active' : '' }}" data-page="event" href="{{ route('event.home') }}" title="@lang('miscellaneous.menu.public.events.title')" onclick="navigate('/events', this); setActiveLink(this); return false;"> --}}
                                <a id="eventLink" class="nav-link{{ Route::is('event.home') ? ' active' : '' }}" data-page="event" href="{{ route('event.home') }}" title="@lang('miscellaneous.menu.public.events.title')" data-bs-toggle="tooltip" data-bs-placement="bottom">
{{-- @if (!request()->route()->named('event.home'))
                                    <div class="badge-notif badge-notif-bottom"></div>
@endif --}}
                                    <i class="bi {{ Route::is('event.home') ? 'bi-calendar-event-fill' : 'bi-calendar-event' }}"></i> <span class="nav-text">@lang('miscellaneous.menu.public.events.title')</span>
                                </a>
                            </li>

                            <!-- Messaging -->
                            <li class="nav-item">
                                {{-- <a id="messageLink" class="nav-link{{ Route::is('message.home') ? ' active' : '' }}" data-page="message" href="{{ route('message.home') }}" title="@lang('miscellaneous.menu.messages')" onclick="navigate('/messages', this); setActiveLink(this); return false;"> --}}
                                <a id="messageLink" class="nav-link{{ Route::is('message.home') ? ' active' : '' }}" data-page="message" href="{{ route('message.home') }}" title="@lang('miscellaneous.menu.messages')" data-bs-toggle="tooltip" data-bs-placement="bottom">
{{-- @if (!request()->route()->named('message.home'))
                                    <div class="badge-notif badge-notif-bottom"></div>
@endif --}}
                                    <i class="bi {{ Route::is('message.home') ? 'bi-chat-quote-fill' : 'bi-chat-quote' }}"></i> <span class="nav-text">@lang('miscellaneous.menu.messages')</span>
                                </a>
                            </li>

                            <li class="nav-item ms-3 opacity-0 d-md-inline-block d-none">
                                <a class="nav-link">
                                    <i class="bi bi-three-dots-vertical"></i> <span class="nav-text"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Main navbar END -->

                    <!-- Nav right START -->
                    <ul class="nav flex-nowrap align-items-center ms-auto list-unstyled">
                        {{-- SEARCH FORM --}}
                        <li class="nav-item ms-2 dropdown nav-search">
                            <a class="nav-link btn icon-md p-0" href="#" id="searchDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-search fs-5"> </i>
                            </a>

                            <div class="dropdown-menu dropdown-animation dropdown-menu-end p-3 small" aria-labelledby="searchDropdown">
                                <div class="nav flex-nowrap align-items-center">
                                    <div class="nav-item w-100">
                                        <form class="rounded position-relative">
                                            <input class="form-control ps-5 bg-light" type="search" placeholder="@lang('miscellaneous.search_label')" aria-label="Search" title="@lang('miscellaneous.search_label')">
                                            <button class="btn bg-transparent px-2 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- PROFILE INFO --}}
                        <li class="nav-item ms-2 dropdown">
                            <a role="button" class="nav-link btn icon-md p-0" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="avatar-img rounded-circle" src="{{ asset($current_user['profile_photo_path']) }}" alt>
                            </a>

                            <ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3" aria-labelledby="profileDropdown">
                                <li class="px-3">
                                    <div class="d-flex align-items-center position-relative">
                                        <!-- Avatar -->
                                        <div class="avatar me-3">
                                            <img class="avatar-img rounded-circle" src="{{ asset($current_user['profile_photo_path']) }}" alt="avatar">
                                        </div>
                                        <div>
                                            <a class="h6 stretched-link" href="{{ route('profile.home', ['username' => $current_user['username']]) }}">
                                                {{ Str::limit(($current_user['firstname'] . ' ' . $current_user['lastname']), 14, '...') }}
                                            </a>
                                            <p class="small m-0">{{ '@' . $current_user['username'] }}</p>
                                        </div>
                                    </div>

                                    <a class="dropdown-item btn btn-primary-soft btn-sm mt-3 mb-2 text-center rounded-pill" href="{{ route('profile.home', ['username' => $current_user['username']]) }}">@lang('miscellaneous.menu.public.profile.title')</a>
                                </li>

                                <!-- Links -->
                                <li>
                                    <a class="dropdown-item" href="{{ route('settings.home') }}"><i class="bi bi-gear fa-fw me-2"></i>@lang('miscellaneous.menu.public.settings.title')</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="https://xsamtech.com/messenger" target="_blank">
                                        <i class="fa-fw bi bi-telephone me-2"></i>@lang('miscellaneous.public.home.help')
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="https://xsamtech.com/products/kulisha" target="_blank">
                                        <i class="fa-fw bi bi-question-circle me-2"></i>@lang('miscellaneous.menu.about')
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
@csrf
                                        <input type="hidden" name="logged_out_user" value="">
                                        <button type="submit" id="logged_out_user" class="dropdown-item bg-danger-soft-hover">
                                            <i class="bi bi-power fa-fw me-2"></i>@lang('miscellaneous.logout')
                                        </button>
                                    </form>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <!-- Dark mode options START -->
                                <li>
                                    <div id="themeToggler" class="modeswitch-item theme-icon-active d-flex justify-content-center gap-2 align-items-center p-3 pb-0">
                                        <span>@lang('miscellaneous.theme')</span>
                                        <button type="button" class="btn btn-light light"  data-mdb-ripple-init><i class="bi bi-sun"></i></button>
                                        <button type="button" class="btn btn-light dark"  data-mdb-ripple-init><i class="bi bi-moon-fill"></i></button>
                                        <button type="button" class="btn btn-light auto"  data-mdb-ripple-init><i class="bi bi-circle-half"></i></button>
                                    </div>
                                </li>
                                <!-- Dark mode options END-->
                            </ul>
                        </li>
                    </ul>
                    <!-- Nav right END -->
                </div>
            </nav>
            <!-- Logo Nav END -->
        </header>
        <!-- ======================= Header END -->
