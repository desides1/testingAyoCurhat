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

                @can('read-users')
                <li class="">
                    <a href="{{ route('users') }}">
                        <i class="ri-stethoscope-line"></i>
                        <span>Manajemen Petugas</span>
                    </a>
                </li>
                @endcan
                <li class=" ">
                    <a href="#Dashboards" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <i class="las la-home"></i><span>Sub Menu</span>
                        <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                        <i class="las la-angle-down iq-arrow-right arrow-hover"></i></a>
                    <ul id="Dashboards" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class=" ">
                            <a href="../backend/index.html">
                                <i class="lab la-blogger-b"></i><span>Dashboard 1</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="../backend/dashboard-2.html">
                                <i class="las la-share-alt"></i><span>Dashboard 2</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="../backend/dashboard-3.html">
                                <i class="las la-icons"></i><span>Dashboard 3</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>