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
                    {{-- @mido_shriks --}}
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
                    </li>

                    {{-- @mido_shriks --}}
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
                    </li>

                    {{-- @mido_shriks dropdowen = {products , helpers} --}}
                    @if (app()->getLocale() == 'en')
                        <li
                            class="nav-item dropdown {{ Request::is('en/dashboard/products*') || Request::is('en/dashboard/helpers*') ? 'active' : '' }}">
                        @else
                        <li
                            class="nav-item dropdown {{ Request::is('ar/dashboard/products*') || Request::is('ar/dashboard/helpers*') ? 'active' : '' }}">
                            {{-- <li class="nav-item dropdown "> --}}
                    @endif
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                                <line x1="12" y1="12" x2="20" y2="7.5" />
                                <line x1="12" y1="12" x2="12" y2="21" />
                                <line x1="12" y1="12" x2="4" y2="7.5" />
                                <line x1="16" y1="5.25" x2="8" y2="9.75" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            {{ display('products') }}
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="{{ route('dashboard.products.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                                            <line x1="12" y1="12" x2="20" y2="7.5" />
                                            <line x1="12" y1="12" x2="12" y2="21" />
                                            <line x1="12" y1="12" x2="4" y2="7.5" />
                                            <line x1="16" y1="5.25" x2="8" y2="9.75" />
                                        </svg>
                                    </span>
                                    {{ display('products') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('dashboard.helpers.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-help" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <line x1="12" y1="17" x2="12" y2="17.01">
                                            </line>
                                            <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4"></path>
                                        </svg>
                                    </span>
                                    {{ display('helpers') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    </li>
                    {{-- @mido_shriks dropdowen = {questions } --}}
                    @if (app()->getLocale() == 'en')
                        <li class="nav-item dropdown {{ Request::is('en/dashboard/questions*') || Request::is('en/dashboard/answers*') ? 'active' : '' }}">
                        @else
                        <li class="nav-item dropdown {{ Request::is('ar/dashboard/questions*') || Request::is('ar/dashboard/answers*') ? 'active' : '' }}">
                            {{-- <li class="nav-item dropdown "> --}}
                    @endif
                    <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" role="button" aria-expanded="false">
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
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="{{ route('dashboard.questions.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-question-mark" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M8 8a3.5 3 0 0 1 3.5 -3h1a3.5 3 0 0 1 3.5 3a3 3 0 0 1 -2 3a3 4 0 0 0 -2 4">
                                            </path>
                                            <line x1="12" y1="19" x2="12" y2="19.01">
                                            </line>
                                        </svg>
                                    </span>
                                    {{ display('questions') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('dashboard.answers.index') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-brand-stackoverflow" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 17v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-1"></path>
                                            <path d="M8 16h8"></path>
                                            <path d="M8.322 12.582l7.956 .836"></path>
                                            <path d="M8.787 9.168l7.826 1.664"></path>
                                            <path d="M10.096 5.764l7.608 2.472"></path>
                                        </svg>
                                    </span>
                                    {{ display('answers') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <rect x="4" y="4" width="6" height="5"
                                        rx="2" />
                                    <rect x="4" y="13" width="6" height="7"
                                        rx="2" />
                                    <rect x="14" y="4" width="6" height="7"
                                        rx="2" />
                                    <rect x="14" y="15" width="6" height="5"
                                        rx="2" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Layout
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item" href="./layout-horizontal.html">
                                        Horizontal
                                    </a>
                                    <a class="dropdown-item" href="./layout-boxed.html">
                                        Boxed
                                        <span class="badge badge-sm bg-green text-uppercase ms-2">New</span>
                                    </a>
                                    <a class="dropdown-item" href="./layout-vertical.html">
                                        Vertical
                                    </a>
                                    <a class="dropdown-item" href="./layout-vertical-transparent.html">
                                        Vertical transparent
                                    </a>
                                    <a class="dropdown-item" href="./layout-vertical-right.html">
                                        Right vertical
                                    </a>
                                    <a class="dropdown-item" href="./layout-condensed.html">
                                        Condensed
                                    </a>
                                    <a class="dropdown-item" href="./layout-combo.html">
                                        Combined
                                    </a>
                                </div>
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item" href="./layout-navbar-dark.html">
                                        Navbar dark
                                    </a>
                                    <a class="dropdown-item" href="./layout-navbar-sticky.html">
                                        Navbar sticky
                                    </a>
                                    <a class="dropdown-item" href="./layout-navbar-overlap.html">
                                        Navbar overlap
                                    </a>
                                    <a class="dropdown-item" href="./layout-rtl.html">
                                        RTL mode
                                    </a>
                                    <a class="dropdown-item" href="./layout-fluid.html">
                                        Fluid
                                    </a>
                                    <a class="dropdown-item" href="./layout-fluid-vertical.html">
                                        Fluid vertical
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="4" />
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="15" y1="15" x2="18.35" y2="18.35" />
                                    <line x1="9" y1="15" x2="5.65" y2="18.35" />
                                    <line x1="5.65" y1="5.65" x2="9" y2="9" />
                                    <line x1="18.35" y1="5.65" x2="15" y2="9" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Help
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="./docs/index.html">
                                Documentation
                            </a>
                            <a class="dropdown-item" href="./changelog.html">
                                Changelog
                            </a>
                            <a class="dropdown-item" href="https://github.com/tabler/tabler" target="_blank"
                                rel="noopener">
                                Source code
                            </a>
                            <a class="dropdown-item text-pink" href="https://github.com/sponsors/codecalm"
                                target="_blank" rel="noopener">
                                <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                </svg>
                                Sponsor project!
                            </a>
                        </div>
                    </li>
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
                </ul>
                <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
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
                </div>
            </div>
        </div>
    </div>
</div>
