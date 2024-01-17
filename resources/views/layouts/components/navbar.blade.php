<!-- Navbar -->
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Language -->
            <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <i class='ti ti-language rounded-circle ti-md'></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item"  href="{{ route('switch.language', ['language' => 'en']) }}">
                            <span class="align-middle">English</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item"  href="{{ route('switch.language', ['language' => 'de']) }}">
                            <span class="align-middle">{{__('navbar.chinese')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ Language -->
            <!-- Style Switcher -->
            @php
                $user = \auth()->user()
            @endphp
            <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                @if($user->theme == 'dark')
                    <form method="POST" action="{{ route('toggleTheme', ['theme' => 'light']) }}">
                        @csrf
                        @method('PUT')
                        <button class="bg-transparent border-0 bg-navbar-theme" type="submit">
                            <i class='ti ti-md ti-moon'></i>
                        </button>
                    </form>
                @endif

                @if($user->theme == 'light')
                    <form method="POST" action="{{ route('toggleTheme', ['theme' => 'dark']) }}">
                        @csrf
                        @method('PUT')
                        <button class="bg-transparent border-0 bg-navbar-theme" type="submit">
                            <i class='ti ti-md ti-sun'></i>
                        </button>
                    </form>
                @endif



                {{-- <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                            <span class="align-middle"><i class='ti ti-sun me-2'></i>Light</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                            <span class="align-middle"><i class="ti ti-moon me-2"></i>Dark</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                            <span class="align-middle"><i
                                    class="ti ti-device-desktop me-2"></i>System</span>
                        </a>
                    </li>
                </ul> --}}
            </li>
            <!-- / Style Switcher-->

            <!-- Quick links  -->
            <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <i class='ti ti-layout-grid-add ti-md'></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end py-0">
                    <div class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h5 class="text-body mb-0 me-auto">{{__('navbar.shortcuts')}}</h5>
                            <a href="javascript:void(0)" class="dropdown-shortcuts-add text-body"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Add shortcuts"><i class="ti ti-sm ti-apps"></i></a>
                        </div>
                    </div>
                    <div class="dropdown-shortcuts-list scrollable-container">
                        <div class="row row-bordered overflow-visible g-0">
                            <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                                    <i class="ti ti-user-circle fs-4"></i>
                                </span>
                                <a href="app-calendar.html" class="stretched-link">{{__('navbar.create_agent')}}</a>
                            </div>
                            <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                                    <i class="ti ti-plus fs-4"></i>
                                </span>
                                <a href="app-invoice-list.html" class="stretched-link">{{__('navbar.add_property')}}</a>
                            </div>
                        </div>
                        <div class="row row-bordered overflow-visible g-0">
                            <div class="dropdown-shortcuts-item col">
                              <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                                <i class="ti ti-home-search fs-4"></i>
                              </span>
                              <a href="app-user-list.html" class="stretched-link">{{__('navbar.search_property')}}</a>
                            </div>
                            <div class="dropdown-shortcuts-item col">
                              <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                                <i class="ti ti-home-share fs-4"></i>
                              </span>
                              <a href="app-access-roles.html" class="stretched-link">{{__('navbar.share_property')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!-- Quick links -->

            <!-- Notification -->
            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <i class="ti ti-bell ti-md"></i>
                    <span class="badge bg-danger rounded-pill badge-notifications">5</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end py-0">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h5 class="text-body mb-0 me-auto">{{__('navbar.notification')}}</h5>
                            <a href="javascript:void(0)" class="dropdown-notifications-all text-body"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Mark all as read"><i class="ti ti-mail-opened fs-4"></i></a>
                        </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container">
                        <ul class="list-group list-group-flush">
                            <li
                                class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <img src="../../assets/img/avatars/1.png" alt
                                                class="h-auto rounded-circle">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Congratulation Lettie 🎉</h6>
                                        <p class="mb-0">Won the monthly best seller gold badge</p>
                                        <small class="text-muted">1h ago</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                        <a href="javascript:void(0)"
                                            class="dropdown-notifications-read"><span
                                                class="badge badge-dot"></span></a>
                                        <a href="javascript:void(0)"
                                            class="dropdown-notifications-archive"><span
                                                class="ti ti-x"></span></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-menu-footer border-top">
                        <a href="javascript:void(0);"
                            class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                            {{__('navbar.view_all_notifications')}}
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ Notification -->

            <!-- User -->
            @php
                $user = \auth()->user()
            @endphp
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        @if($user->image)
                            <img id="user_img_nav" src="{{ asset('storage/user_images/' . $user->image) }}" alt
                                class="rounded-circle">
                        @else
                            <img id="user_img_nav" src="{{ asset('assets/img/avatars/user.jpg') }}" alt
                                class="rounded-circle">
                        @endif
                     </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        @if($user->image)
                                            <img id="user_img_nav_menu" src="{{ asset('storage/user_images/' . $user->image) }}" alt
                                                class="rounded-circle">
                                        @else
                                            <img id="user_img_nav_menu" src="{{ asset('assets/img/avatars/user.jpg') }}" alt
                                                class="rounded-circle">
                                        @endif

                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-medium d-block">{{ strtoupper($user->name) }}</span>
                                    <small class="text-muted">{{ $user->role }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('profile') }}">
                            <i class="ti ti-user-check me-2 ti-sm"></i>
                            <span class="align-middle">{{__('navbar.my-profile')}}</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="ti ti-logout me-2 ti-sm"></i>
                                <span class="align-middle">{{__('navbar.log_out')}}</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
<!-- / Navbar -->
