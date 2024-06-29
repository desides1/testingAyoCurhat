<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                <i class="ri-menu-line wrapper-menu"></i>
                <a href="index.html" class="header-logo">
                    <img src="{{ asset('assets/images/logo/logo-color.png') }}" class="img-fluid rounded-normal light-logo" alt="logo">
                    <img src="{{ asset('assets/images/logo/logo-white.png') }}" class="img-fluid rounded-normal darkmode-logo" alt="logo">
                </a>
            </div>

            <!-- Unused Search Bar -->
            <div class="iq-search-bar device-search">
            </div>

            <div class="d-flex align-items-center">
                <div class="change-mode">
                    <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                        <div class="custom-switch-inner">
                            <p class="mb-0"> </p>
                            <input type="checkbox" class="custom-control-input" id="dark-mode" data-active="true">
                            <label class="custom-control-label" for="dark-mode" data-mode="toggle">
                                <span class="switch-icon-left"><i class="a-left ri-moon-clear-line"></i></span>
                                <span class="switch-icon-right"><i class="a-right ri-sun-line"></i></span>
                            </label>
                        </div>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                    <i class="ri-menu-3-line"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list align-items-center">

                        <!-- Unused Search Bar -->
                        <li class="nav-item nav-icon search-content">
                        </li>

                        <!-- Unused Notifications -->
                        <li class="nav-item nav-icon dropdown">
                        </li>

                        <!-- Fullscreen -->
                        <li class="nav-item iq-full-screen"><a href="#" class="" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a></li>

                        <!-- Profile -->
                        <li class="caption-content">
                            <a href="#" class="iq-user-toggle">
                                <img src="../assets/images/user/1.jpg" class="img-fluid rounded" alt="user">
                            </a>
                            <div class="iq-user-dropdown">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center mb-0">
                                        <div class="header-title">
                                            <h4 class="card-title mb-0">Profil</h4>
                                        </div>
                                        <div class="close-data text-right badge badge-primary cursor-pointer"><i class="ri-close-fill"></i></div>
                                    </div>
                                    <div class="data-scrollbar" data-scroll="2">
                                        <div class="card-body">
                                            <div class="profile-header">
                                                <div class="cover-container ">
                                                    <div class="media align-items-center mb-4">
                                                        <img src="../assets/images/user/1.jpg" alt="profile-bg" class="rounded img-fluid avatar-80">
                                                        <div class="media-body profile-detail ml-3 rtl-mr-3 rtl-ml-0">
                                                            <h3>{{ auth()->user()->name }}</h3>
                                                            <div class="d-flex flex-wrap">
                                                                <p class="mb-1">{{ auth()->user()->getRoleNames()[0] }}</p><a href="{{ route('logout') }}" class=" ml-3 rtl-mr-3 rtl-ml-0">Sign Out</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6  col-6 pr-0">
                                                        <div class="profile-details text-center">
                                                            <a href="../app/user-profile.html" class="iq-sub-card bg-primary-light rounded-small p-2">
                                                                <div class="rounded iq-card-icon-small">
                                                                    <i class="ri-file-user-line"></i>
                                                                </div>
                                                                <h6 class="mb-0 ">My Profile</h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6  col-md-6 col-6">
                                                        <div class="profile-details text-center">
                                                            <a href="../app/user-profile-edit.html" class="iq-sub-card bg-danger-light rounded-small p-2">
                                                                <div class="rounded iq-card-icon-small">
                                                                    <i class="ri-profile-line"></i>
                                                                </div>
                                                                <h6 class="mb-0 ">Edit Profile</h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6  col-6 pr-0">
                                                        <div class="profile-details text-center">
                                                            <a href="../app/user-account-setting.html" class="iq-sub-card bg-success-light rounded-small p-2">
                                                                <div class="rounded iq-card-icon-small">
                                                                    <i class="ri-account-box-line"></i>
                                                                </div>
                                                                <h6 class="mb-0 ">Account</h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6  col-6">
                                                        <div class="profile-details text-center">
                                                            <a href="../app/user-privacy-setting.html" class="iq-sub-card bg-info-light rounded-small p-2">
                                                                <div class="rounded iq-card-icon-small">
                                                                    <i class="ri-lock-line"></i>
                                                                </div>
                                                                <h6 class="mb-0 ">Settings</h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="personal-details">
                                                    <h5 class="card-title mb-3 mt-3">Personal Details</h5>
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-sm-6">
                                                            <h6>Birthday</h6>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="mb-0">3rd March</p>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-sm-6">
                                                            <h6>Address</h6>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="mb-0">Landon</p>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-sm-6">
                                                            <h6>Phone</h6>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="mb-0">(010)987 543 201</p>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-sm-6">
                                                            <h6>Email</h6>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="mb-0">Barry@example.com</p>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-sm-6">
                                                            <h6>Twitter</h6>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="mb-0">@Barry</p>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-sm-6">
                                                            <h6>Facebook</h6>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="mb-0">@Barry_Tech</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>