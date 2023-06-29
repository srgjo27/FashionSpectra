<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar header -->
    <div class="sidebar-section bg-black bg-opacity-10 border-bottom border-bottom-white border-opacity-10">
        <div class="sidebar-logo d-flex justify-content-center align-items-center">
            <a href="#" class="d-inline-flex align-items-center py-2">
                <img src="{{ asset('admin/assets/images/logo_icon.svg') }}" class="sidebar-logo-icon" alt="">
            </a>

            <a href="#"
                class="d-inline-flex align-items-center fs-5 fw-semibold text-white text-hover-primary py-2 ms-3">
                {{ config('app.name') }}</a>

            <div class="sidebar-resize-hide ms-auto">
                <button type="button"
                    class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                    <i class="ph-arrows-left-right"></i>
                </button>

                <button type="button"
                    class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                    <i class="ph-x"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- /sidebar header -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User -->
        <div class="sidebar-section sidebar-resize-hide dropdown mx-2">
            <div class="hstack gap-2 flex-grow-1 lh-1 p-2 my-1 w-100 d-inline-flex align-items-center">
                <a href="#" class="status-indicator-container">
                    <img src="{{ asset('admin/assets/images/brands/shell.svg') }}" class="w-32px h-32px" alt="">
                    <span class="status-indicator bg-success"></span>
                </a>
                <div class="me-auto">
                    <div class="fs-sm text-white opacity-75 mb-1">{{ Auth::user()->role }}</div>
                    <div class="fw-semibold">{{ Auth::user()->name }}</div>
                </div>
            </div>
        </div>
        <!-- /user -->


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">ONLINE</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('auth.admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('auth.admin.dashboard') ? ' active' : '' }}">
                        <i class="ph-house"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-package"></i>
                        <span>Produk</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="{{ route('auth.admin.product-clothes') }}"
                                class="nav-link {{ request()->routeIs('auth.admin.product-clothes') ? ' active' : '' }}">
                                <i class="ph-table"></i>Pakaian</a></li>
                        <li class="nav-item"><a href="{{ route('auth.admin.product-shoes') }}"
                                class="nav-link {{ request()->routeIs('auth.admin.product-shoes') ? ' active' : '' }}"><i
                                    class="ph-table"></i>Sepatu</a>
                        </li>
                        <li class="nav-item"><a href="" class="nav-link"><i
                                    class="ph-table"></i>Aksesoris/Perhiasan</a>
                        </li>
                        <li class="nav-item"><a href="" class="nav-link"><i class="ph-table"></i>Produk
                                Kecantikan</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link disabled">Fitur Selanjutnya
                                <span class="badge align-self-center ms-auto">Coming soon</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-list"></i>
                        <span>Pesanan</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 1</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 2</a></li>
                        <li class="nav-item"><a href="#" class="nav-link disabled">Fitur Selanjutnya
                                <span class="badge align-self-center ms-auto">Coming soon</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-list"></i>
                        <span>Pembayaran</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 1</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 2</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 3</a>
                        <li class="nav-item"><a href="#" class="nav-link disabled">Fitur Selanjutnya
                                <span class="badge align-self-center ms-auto">Coming soon</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">ONSITE</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <!-- /main -->
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->
</div>
<!-- /main sidebar -->
