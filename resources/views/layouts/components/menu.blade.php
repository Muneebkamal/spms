<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
        <a href="{{ route('home') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{asset('assets/img/default-imgs/logo.png')}}" width="50" alt="Logo">
                {{-- <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                        fill="#7367F0" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                        fill="#161616" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                        fill="#161616" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                        fill="#7367F0" />
                </svg> --}}
            </span>
            <span class="app-brand-text demo menu-text fw-bold">SPMS</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>


    @if(auth()->user()->role == 'admin')
        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ request()->is('/') ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div>{{ __('menu.dashboard') }}</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ url('access-records') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-brand-whatsapp"></i>
                    <div>{{ __('menu.access_records') }}</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ url('share-list') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-share"></i>
                    <div>{{ __('menu.share_list') }}</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-building-warehouse"></i>
                    <div>{{ __('menu.properties') }}</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ url('add-property') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-smart-home"></i>
                            <div>{{ __('menu.add_property') }}</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('property-list') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-smart-home"></i>
                            <div>{{ __('menu.property_list') }}</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('property-details') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-smart-home"></i>
                            <div>{{ __('Property Details') }}</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('admin-search') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-user-search"></i>
                            <div>{{ __('menu.admin_search') }}</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users-group"></i>
                    <div>{{ __('menu.users') }}</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ url('create-agent') }}" class="menu-link">
                            <div>{{ __('menu.create_agent') }}</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('user-list') }}" class="menu-link">
                            <div>{{ __('menu.user_list') }}</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="{{ url('all-views') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-view-360"></i>
                    <div>{{ __('menu.all_views') }}</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ url('terms-of-use') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-file-invoice"></i>
                    <div>{{ __('menu.terms_of_use') }}</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ url('online-form') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-forms"></i>
                    <div>{{ __('menu.online_form') }}</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ url('common-words') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-creative-commons-nd"></i>
                    <div>{{ __('menu.common_words') }}</div>
                </a>
            </li>
            <li class="menu-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="menu-link bg-transparent border-0">
                        <i class="menu-icon tf-icons ti ti-logout"></i>
                        <div>{{ __('menu.sign_out') }}</div>
                    </button>
                </form>
            </li>
        </ul>
    @endif
    @if(auth()->user()->role == 'agent')
        <ul class="menu-inner py-1">
            <li class="menu-item {{ request()->is('/') ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div>{{ __('menu.dashboard') }}</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{url('access-records')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-brand-whatsapp"></i>
                    <div>{{ __('menu.access_records') }}</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{url('share-list')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-share"></i></i>
                    <div>{{ __('menu.share_list') }}</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-building-warehouse"></i>
                    <div data-i18n="Properties">{{ __('menu.properties') }}</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{url('add-property')}}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-smart-home"></i>
                            <div>{{ __('menu.add_property') }}</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('property-details') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-smart-home"></i>
                            <div>{{ __('Property Details') }}</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{url('admin-search')}}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-user-search"></i>
                            <div>{{ __('menu.admin_search') }}</div>
                        </a>
                    </li>
                </ul>


            <li class="menu-item">
                <a href="{{url('all-views')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-view-360"></i>
                    <div>{{ __('menu.all_views') }}</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{url('terms-of-use')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-file-invoice"></i>
                    <div>{{ __('menu.terms_of_use') }}</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{url('online-form')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-forms"></i>
                    <div>{{ __('menu.online_form') }}</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{url('common-words')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-creative-commons-nd"></i>
                    <div>{{ __('menu.common_words') }}</div>
                </a>
            </li>
            <li class="menu-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="menu-link bg-transparent border-0">
                        <i class="menu-icon tf-icons ti ti-logout"></i>
                        <div>{{ __('menu.sign_out') }}</div>
                    </button>
                </form>
            </li>
        </ul>
    @endif
</aside>
<!-- / Menu -->
