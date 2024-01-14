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



    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('/') ? 'active' : '' }}
        {{-- active open --}}
        ">
            <a href="{{ route('home') }}" class="menu-link 
            {{-- menu-toggle --}}
            ">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
                {{-- <div class="badge bg-primary rounded-pill ms-auto">5</div> --}}
            </a>
            {{-- <ul class="menu-sub">
                <li class="menu-item">
                    <a href="index-2.html" class="menu-link">
                        <div data-i18n="Analytics">Analytics</div>
                    </a>
                </li>
                <li class="menu-item active">
                    <a href="dashboards-crm.html" class="menu-link">
                        <div data-i18n="CRM">CRM</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-ecommerce-dashboard.html" class="menu-link">
                        <div data-i18n="eCommerce">eCommerce</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-logistics-dashboard.html" class="menu-link">
                        <div data-i18n="Logistics">Logistics</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-academy-dashboard.html" class="menu-link">
                        <div data-i18n="Academy">Academy</div>
                    </a>
                </li>
            </ul> --}}
        </li>
        <li class="menu-item">
            <a href="{{url('access-records')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-brand-whatsapp"></i>
                <div>Access records</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{url('share-list')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-share"></i></i>
                <div>Share list</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons ti ti-building-warehouse"></i>
              <div data-i18n="Properties">Properties</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{url('add-property')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div>Add Property</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{url('property-list')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div>Property List</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{url('admin-search')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user-search"></i>
                        <div>Admin Search</div>
                    </a>
                </li>
            </ul>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users-group"></i>
                <div data-i18n="Users">Users</div>
                </a>
                <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{url('create-agent')}}" class="menu-link">
                    <div data-i18n="Create Agent">Create Agent</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{url('user-list')}}" class="menu-link">
                    <div data-i18n="User list">User list</div>
                    </a>
                </li>
                </ul>
            </li>
        <li class="menu-item">
            <a href="{{url('all-views')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-view-360"></i>
                <div>All Views</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{url('terms-of-use')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-invoice"></i>
                <div>Terms of Use</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{url('online-form')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-forms"></i>
                <div>Online form</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{url('common-words')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-creative-commons-nd"></i>
                <div>Common words</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons ti ti-logout"></i>
                <div>Sign Out</div>
            </a>
        </li>
    </ul>

</aside>
<!-- / Menu -->