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
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
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
                        <li class="nav-item"><a href="#" class="nav-link active">Default Sub-menu</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 2</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 3</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 4</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 5</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 6</a>
                        </li>
                        <li class="nav-item"><a href="#x" class="nav-link disabled">Sub-menu 7
                                <span class="badge align-self-center ms-auto">Coming soon</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-list"></i>
                        <span>Menu</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="#" class="nav-link active">Default Sub-menu</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 2</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 3</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 4</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 5</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 6</a>
                        </li>
                        <li class="nav-item"><a href="#x" class="nav-link disabled">Sub-menu 7
                                <span class="badge align-self-center ms-auto">Coming soon</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-list"></i>
                        <span>Menu</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="#" class="nav-link active">Default Sub-menu</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 2</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 3</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 4</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 5</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Sub-menu 6</a>
                        </li>
                        <li class="nav-item"><a href="#x" class="nav-link disabled">Sub-menu 7
                                <span class="badge align-self-center ms-auto">Coming soon</span></a>
                        </li>
                    </ul>
                </li>
                <!-- /main -->
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->
</div>
<!-- /main sidebar -->
