<!-- Main navbar -->
<div class="navbar navbar-expand-lg navbar-static shadow">
    <div class="container-fluid">
        <div class="d-flex d-lg-none me-2">
            <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
                <i class="ph-list"></i>
            </button>
        </div>

        <div class="navbar-collapse flex-lg-1 order-2 order-lg-1 collapse" id="navbar_search">
            <!--
            <div class="navbar-search flex-fill dropdown mt-2 mt-lg-0">
                <div class="form-control-feedback form-control-feedback-start flex-grow-1">
                    <input type="text" class="form-control" placeholder="Search" data-bs-toggle="dropdown">
                    <div class="form-control-feedback-icon">
                        <i class="ph-magnifying-glass"></i>
                    </div>
                </div>
            </div>
            -->
        </div>

        <ul class="nav hstack gap-sm-1 flex-row justify-content-end order-1 order-lg-2">
            <li class="nav-item nav-item-dropdown-lg dropdown">
                <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="dropdown">
                    <i class="ph-squares-four"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-end dropdown-menu-scrollable-sm wmin-lg-600 p-0">
                    <!-- TODO -->
                </div>
            </li>

            <li class="nav-item nav-item-dropdown-lg dropdown">
                <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside">
                    <i class="ph-chats"></i>
                    <span
                        class="badge bg-yellow text-black position-absolute top-0 end-0 translate-middle-top zindex-1 rounded-pill mt-1 me-1">8</span>
                </a>

                <div class="dropdown-menu dropdown-menu-end dropdown-menu-scrollable-sm wmin-lg-400 p-0">
                    <div class="d-flex align-items-center p-3">
                        <h6 class="mb-0">Pesan</h6>
                        <div class="ms-auto">
                            <a href="#" class="text-body">
                                <i class="ph-plus-circle"></i>
                            </a>
                            <a href="#search_messages" class="collapsed text-body ms-2" data-bs-toggle="collapse">
                                <i class="ph-magnifying-glass"></i>
                            </a>
                        </div>
                    </div>

                    <div class="collapse" id="search_messages">
                        <div class="px-3 mb-2">
                            <div class="form-control-feedback form-control-feedback-start">
                                <input type="text" class="form-control" placeholder="Search messages">
                                <div class="form-control-feedback-icon">
                                    <i class="ph-magnifying-glass"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown-menu-scrollable pb-2">
                        <!-- TODO -->
                    </div>

                    <div class="d-flex border-top py-2 px-3">
                        <a href="#" class="text-body">
                            <i class="ph-checks me-1"></i>
                            Baca Semua
                        </a>
                        <a href="#" class="text-body ms-auto">
                            Lihat Semua
                            <i class="ph-arrow-circle-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="offcanvas"
                    data-bs-target="#notifications">
                    <i class="ph-bell"></i>
                    <span
                        class="badge bg-yellow text-black position-absolute top-0 end-0 translate-middle-top zindex-1 rounded-pill mt-1 me-1">2</span>
                </a>
            </li>

            <li class="nav-item nav-item-dropdown-lg dropdown">
                <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                    <div class="status-indicator-container">
                        <img src="{{ asset('admin/assets/images/demo/users/face11.jpg') }}"
                            class="w-32px h-32px rounded-pill" alt="">
                        <span class="status-indicator bg-success"></span>
                    </div>
                    <span class="d-none d-lg-inline-block mx-lg-2">{{ Auth::user()->name }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <a href="#" class="dropdown-item">
                        <i class="ph-user-circle me-2"></i>
                        Profil
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ph-envelope-open me-2"></i>
                        Kotak Masuk
                        <span class="badge bg-primary rounded-pill ms-auto">26</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="ph-gear me-2"></i>
                        Pengaturan Akun
                    </a>
                    <a href="{{ route('do_logout') }}" class="dropdown-item">
                        <i class="ph-sign-out me-2"></i>
                        Keluar
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->
