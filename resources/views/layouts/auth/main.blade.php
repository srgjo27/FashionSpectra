<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.head')

<body>

    <!-- Page content -->
    <div class="page-content">
        {{ $slot }}
    </div>
    <!-- /page content -->

    @include('layouts.admin.js')
</body>

</html>
