                                    <a role="button" id="dropdownLanguage" class="nav-link fw-bold ps-2 pe-0" data-bs-toggle="dropdown" aria-expanded="false">
                                        @lang('miscellaneous.your_language') <i class="fa-solid fa-angle-down"></i>
                                    </a>

                                    <ul class="dropdown-menu mt-1 p-0" aria-labelledby="dropdownLanguage">
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
