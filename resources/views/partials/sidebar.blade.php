<div class="iq-sidebar sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="3" class="header-logo">
            <img src="{{ asset('assets/images/logo/logo-color.png') }}" class="img-fluid rounded-normal light-logo" alt="logo">
            <img src="{{ asset('assets/images/logo/logo-white.png') }}" class="img-fluid rounded-normal darkmode-logo" alt="logo">
        </a>
        <div class="iq-menu-bt-sidebar">
            <i class="las la-bars wrapper-menu"></i>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                @can('dashboard_access')
                <li class="{{ Request::is('/') ? 'active' : ''}}">
                    <a href="{{ url('/') }}">
                        <i class="las la-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @endcan

                @can('emergency_call_access')
                <li class="{{ isActiveSidebar(route('emergency_call')) }}">
                    <a href="{{ route('emergency_call') }}">
                        <i class="ri-whatsapp-line"></i>
                        <span>Panggilan Darurat</span>
                    </a>
                </li>
                @endcan

                @can('read_all_reportings')
                <li class="{{ isActiveSidebar(route('reportings.all')) }}">
                    <a href="{{ route('reportings.all') }}">
                        <i class="ri-edit-box-line"></i>
                        <span>Pengaduan</span>
                    </a>
                </li>
                @endcan

                @can('read_reportings')
                <li class="{{ isActiveSidebar(route('reportings.user')) }}">
                    <a href="{{ route('reportings.user') }}">
                        <i class="ri-edit-box-line"></i>
                        <span>Pengaduan</span>
                    </a>
                </li>
                @endcan

                @can('read_counselings')
                <li class="{{ isActiveSidebar(route('users.index')) }}">
                    <a href="{{ route('users.index') }}">
                        <i class="ri-message-line"></i>
                        <span>Konseling</span>
                    </a>
                </li>
                @endcan

                @can('read_users')
                <li class="{{ isActiveSidebar(route('users.index')) }}">
                    <a href="{{ route('users.index') }}">
                        <i class="ri-group-line"></i>
                        <span>Manajemen Petugas</span>
                    </a>
                </li>
                @endcan

                @can('logout')
                <li class="{{ isActiveSidebar(route('logout')) }}">
                    <a href="{{ route('logout') }}">
                        <i class="ri-logout-box-r-line"></i>
                        <span>Logout</span>
                    </a>
                </li>
                @endcan
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>