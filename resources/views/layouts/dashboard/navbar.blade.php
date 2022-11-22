<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    {{-- @mido_shriks --}}
                    @if (app()->getLocale() == 'en')
                        <li class="nav-item {{ Request::is('en/dashboard/index*') ? 'active' : '' }}">
                        @else
                        <li class="nav-item {{ Request::is('ar/dashboard/index*') ? 'active' : '' }}">
                    @endif
                    <a class="nav-link" href="{{ route('dashboard.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Home
                        </span>
                    </a>
                    </li>


                    {{-- =====================USERS======================= --}}
                    @if (app()->getLocale() == 'en')
                        <li
                            class="nav-item dropdown {{ Request::is('en/dashboard/users*') || Request::is('en/dashboard/user/admin*') || Request::is('en/dashboard/user/gaming*') ? 'active' : '' }}">
                        @else
                        <li
                            class="nav-item dropdown {{ Request::is('ar/dashboard/users*') || Request::is('ar/dashboard/user/admin*') || Request::is('ar/dashboard/user/gaming*') ? 'active' : '' }}">
                            {{-- <li class="nav-item dropdown "> --}}
                    @endif
                    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/users -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            {{ display('users') }}
                        </span>
                    </a>
                    {{-- dropdown-menu users --}}
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('dashboard.users.index') }}">
                            {{ display('owners ') }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <circle cx="12" cy="10" r="3"></circle>
                                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                </svg>
                        </a>
                        <a class="dropdown-item" href="{{ route('dashboard.users.admin') }}">
                            {{ display('admin ') }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                <path d="M16 11l2 2l4 -4"></path>
                            </svg>
                        </a>
                        <a class="dropdown-item" href="{{ route('dashboard.users.gaming') }}">
                            {{ display('gaming user ') }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-gamepad-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5h3.5a5 5 0 0 1 0 10h-5.5l-4.015 4.227a2.3 2.3 0 0 1 -3.923 -2.035l1.634 -8.173a5 5 0 0 1 4.904 -4.019h3.4z"></path>
                                <path d="M14 15l4.07 4.284a2.3 2.3 0 0 0 3.925 -2.023l-1.6 -8.232"></path>
                                <path d="M8 9v2"></path>
                                <path d="M7 10h2"></path>
                                <path d="M14 10h2"></path>
                            </svg>
                        </a>

                    </div>
                    </li>
                    {{-- =======================USERS===================== --}}

                    {{-- @mido_shriks old users
                    @if (app()->getLocale() == 'en')
                        <li class="nav-item {{ Request::is('en/dashboard/users*') ? 'active' : '' }}">
                        @else
                        <li class="nav-item {{ Request::is('ar/dashboard/users*') ? 'active' : '' }}">
                    @endif
                    <a class="nav-link" href="{{ route('dashboard.users.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/users -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            {{ display('Users') }}
                        </span>
                    </a>
                    </li> --}}

                    {{-- @mido_shriks  levels_nav --}}
                    @if (app()->getLocale() == 'en')
                        <li class="nav-item {{ Request::is('en/dashboard/levels*') ? 'active' : '' }}">
                        @else
                        <li class="nav-item {{ Request::is('ar/dashboard/levels*') ? 'active' : '' }}">
                    @endif
                    <a class="nav-link" href="{{ route('dashboard.levels.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-check"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3.5 5.5l1.5 1.5l2.5 -2.5"></path>
                                <path d="M3.5 11.5l1.5 1.5l2.5 -2.5"></path>
                                <path d="M3.5 17.5l1.5 1.5l2.5 -2.5"></path>
                                <line x1="11" y1="6" x2="20" y2="6"></line>
                                <line x1="11" y1="12" x2="20" y2="12"></line>
                                <line x1="11" y1="18" x2="20" y2="18"></line>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            {{ display('levels') }}
                        </span>
                    </a>
                    {{-- @mido_shriks -> prodect(coin helper)  --}}
                    @if (app()->getLocale() == 'en')
                        <li
                            class="nav-item {{ Request::is('en/dashboard/products*') && request()->type == 'coin' ? 'active' : '' }}">
                        @else
                        <li
                            class="nav-item {{ Request::is('ar/dashboard/products*') && request()->type == 'coin' ? 'active' : '' }}">
                    @endif
                    <a class="nav-link" href="{{ route('dashboard.products.index', ['type' => 'coin']) }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coin-bitcoin"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="12" r="9"></circle>
                                <path
                                    d="M9 8h4.09c1.055 0 1.91 .895 1.91 2s-.855 2 -1.91 2c1.055 0 1.91 .895 1.91 2s-.855 2 -1.91 2h-4.09">
                                </path>
                                <path d="M10 12h4"></path>
                                <path d="M10 7v10v-9"></path>
                                <path d="M13 7v1"></path>
                                <path d="M13 16v1"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            {{ display('coins') }}
                        </span>
                    </a>
                    </li>

                    @if (app()->getLocale() == 'en')
                        <li
                            class="nav-item {{ Request::is('en/dashboard/products*') && request()->type == 'helper' ? 'active' : '' }}">
                        @else
                        <li
                            class="nav-item {{ Request::is('ar/dashboard/products*') && request()->type == 'helper' ? 'active' : '' }}">
                    @endif
                    <a class="nav-link" href="{{ route('dashboard.products.index', ['type' => 'helper']) }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="12" r="9"></circle>
                                <line x1="12" y1="17" x2="12" y2="17.01">
                                </line>
                                <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            {{ display('helpers') }}
                        </span>
                    </a>
                    </li>
                    {{-- @mido_shriks -> prodect(coin helper)  --}}



                    {{-- @mido_shriks dropdowen = {questions } --}}
                    @if (app()->getLocale() == 'en')
                        <li class="nav-item {{ Request::is('en/dashboard/questions*') ? 'active' : '' }}">
                        @else
                        <li class="nav-item {{ Request::is('ar/dashboard/questions*') ? 'active' : '' }}">
                    @endif
                    <a class="nav-link" href="{{ route('dashboard.questions.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-question"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M20.136 11.136l-8.136 -8.136l-9 9h2v7a2 2 0 0 0 2 2h7"></path>
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2c.467 0 .896 .16 1.236 .428"></path>
                                <path d="M19 22v.01"></path>
                                <path d="M19 19a2.003 2.003 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            {{ display('questions') }}
                        </span>
                    </a>
                    </li>
                    {{-- @mido_shriks dropdowen = {questions } --}}



                    @if (auth()->user()->code_membership == '001')
                        {{-- @mido_shriks dropdowen = {orders } --}}
                        @if (app()->getLocale() == 'en')
                            <li class="nav-item {{ Request::is('en/dashboard/orders*') ? 'active' : '' }}">
                            @else
                            <li class="nav-item {{ Request::is('ar/dashboard/orders*') ? 'active' : '' }}">
                        @endif
                        <a class="nav-link" href="{{ route('dashboard.orders.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="3" y="4" width="18" height="4"
                                        rx="2">
                                    </rect>
                                    <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                                    <line x1="10" y1="12" x2="14" y2="12"></line>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{ display('orders') }}
                            </span>
                        </a>
                        </li>
                        {{-- @mido_shriks dropdowen = {orders } --}}

                        {{-- =========================NOTIFICATION=========================== --}}
                        @if (app()->getLocale() == 'en')
                            <li
                                class="nav-item dropdown {{ Request::is('en/dashboard/settings*') || Request::is('en/dashboard/languages*') ? 'active' : '' }}">
                            @else
                            <li
                                class="nav-item dropdown {{ Request::is('ar/dashboard/settings*') || Request::is('ar/dashboard/languages*') ? 'active' : '' }}">
                                {{-- <li class="nav-item dropdown "> --}}
                        @endif
                        <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell-ringing" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
                                    <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                                    <path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727"></path>
                                    <path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{ display('notification') }}
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('dashboard.mail.index') }}">
                                {{ display('notification mail ') }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-forward" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 18h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v7.5"></path>
                                    <path d="M3 6l9 6l9 -6"></path>
                                    <path d="M15 18h6"></path>
                                    <path d="M18 15l3 3l-3 3"></path>
                                </svg>
                            </a>
                        </div>
                        </li>
                        {{-- ===========================NOTIFICATION======================= --}}

                        {{-- =========================PAGES=========================== --}}
                        @if (app()->getLocale() == 'en')
                            <li
                                class="nav-item dropdown {{ Request::is('en/dashboard/pages*') || Request::is('en/dashboard/pages*') ? 'active' : '' }}">
                            @else
                            <li
                                class="nav-item dropdown {{ Request::is('ar/dashboard/pages*') || Request::is('ar/dashboard/pages*') ? 'active' : '' }}">
                                {{-- <li class="nav-item dropdown "> --}}
                        @endif
                        <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-app-window" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                                    <path d="M6 8h.01"></path>
                                    <path d="M9 8h.01"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{ display('pages') }}
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('dashboard.pages.index') }}">
                                {{ display('pages') }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-orientation" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M10 21h-3a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v2"></path>
                                    <path d="M13 20h5a2 2 0 0 0 2 -2v-5"></path>
                                    <path d="M15 22l-2 -2l2 -2"></path>
                                    <path d="M18 15l2 -2l2 2"></path>
                                </svg>
                            </a>
                        </div>
                        </li>
                        {{-- ===========================PAGES======================= --}}

                        {{-- =========================SETTINGS=========================== --}}
                        @if (app()->getLocale() == 'en')
                            <li
                                class="nav-item dropdown {{ Request::is('en/dashboard/settings*') || Request::is('en/dashboard/languages*') ? 'active' : '' }}">
                            @else
                            <li
                                class="nav-item dropdown {{ Request::is('ar/dashboard/settings*') || Request::is('ar/dashboard/languages*') ? 'active' : '' }}">
                                {{-- <li class="nav-item dropdown "> --}}
                        @endif
                        <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                    </path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{ display('settings') }}
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('dashboard.settings.index') }}">
                                {{ display('settings projects') }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments-alt" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="4" y="8" width="4" height="4"></rect>
                                    <line x1="6" y1="4" x2="6" y2="8"></line>
                                    <line x1="6" y1="12" x2="6" y2="20"></line>
                                    <rect x="10" y="14" width="4" height="4"></rect>
                                    <line x1="12" y1="4" x2="12" y2="14"></line>
                                    <line x1="12" y1="18" x2="12" y2="20"></line>
                                    <rect x="16" y="5" width="4" height="4"></rect>
                                    <line x1="18" y1="4" x2="18" y2="5"></line>
                                    <line x1="18" y1="9" x2="18" y2="20"></line>
                                </svg>
                            </a>
                            <a class="dropdown-item" href="{{ route('dashboard.languages.index') }}">
                                {{ display('translate') }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-language-katakana" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 5h6.586a1 1 0 0 1 .707 1.707l-1.293 1.293"></path>
                                    <path d="M8 8c0 1.5 .5 3 -2 5"></path>
                                    <path d="M12 20l4 -9l4 9"></path>
                                    <path d="M19.1 18h-6.2"></path>
                                </svg>
                            </a>
                        </div>
                        </li>
                        {{-- ===========================SETTINGS======================= --}}

                        {{-- @mido_shriks dropdowen = {languages , developers} --}}
                        @if (app()->getLocale() == 'en')
                            <li
                                class="nav-item dropdown {{ Request::is('en/dashboard/languages*') || Request::is('en/dashboard/developers*') ? 'active' : '' }}">
                            @else
                            <li
                                class="nav-item dropdown {{ Request::is('ar/dashboard/languages*') || Request::is('ar/dashboard/developers*') ? 'active' : '' }}">
                                {{-- <li class="nav-item dropdown "> --}}
                        @endif
                        <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-visual-studio" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 8l2 -1l10 13l4 -2v-12l-4 -2l-10 13l-2 -1z"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                {{ display('developer') }}
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('dashboard.languages.index') }}">
                                {{ display('lang developer') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('dashboard.developers.index') }}">
                                {{ display('Route Api') }}
                            </a>
                        </div>
                        </li>
                    @endif
                </ul>


                {{-- <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                    <form action="." method="get">
                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="10" cy="10" r="7" />
                                    <line x1="21" y1="21" x2="15" y2="15" />
                                </svg>
                            </span>
                            <input type="text" value="" class="form-control" placeholder="Search…"
                                aria-label="Search in website">
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
</div>
