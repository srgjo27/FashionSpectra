<!-- Page header -->
<div class="page-header">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h5 class="page-title mb-0">
                @if (isset($title))
                    <span class="font-weight-semibold"> {{ $title }}</span>
                @endif
            </h5>
            <a href="#page_header"
                class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                data-bs-toggle="collapse">
                <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
            </a>
        </div>
    </div>

    <div class="page-header-content d-lg-flex border-top">
        <div class="d-flex">
            <div class="breadcrumb py-2">
                <a href="{{ route('auth.admin.dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                @if (isset($title))
                    @php
                        $routeName = '';
                        if ($title === 'Dashboard') {
                            $routeName = 'auth.admin.dashboard';
                        } elseif ($title === 'Produk') {
                            $routeName = 'auth.admin.product-clothes';
                        } elseif ($title === 'Produk') {
                            $routeName = 'auth.admin.product-shoes';
                        }
                    @endphp
                    <a href="{{ route($routeName) }}" class="breadcrumb-item">{{ $title }}</a>
                @endif
                <!-- <span class="breadcrumb-item"></span> -->
            </div>

            <a href="#breadcrumb_elements"
                class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                data-bs-toggle="collapse">
                <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
            </a>
        </div>
    </div>
</div>
<!-- /page header -->
