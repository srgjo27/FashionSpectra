<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.head')

<body>
    {{-- @include('notify::messages') --}}
    <!-- Page content -->
    <div class="page-content">
        @include('layouts.admin.sidebar')
        <!-- Main content -->
        <div class="content-wrapper">
            @include('layouts.admin.navbar')
            <!-- Inner content -->
            <div class="content-inner">
                @include('layouts.admin.header')
                {{ $slot }}
                @include('layouts.admin.footer')
            </div>
            <!-- /inner content -->
        </div>
        <!-- /main content-->
    </div>
    <!-- /page content -->
    @include('layouts.admin.config')
    @include('layouts.admin.js')
</body>

</html>
