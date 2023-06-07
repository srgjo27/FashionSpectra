<!DOCTYPE html>
<html lang="en">
@include('layouts.error.head')

<body>
    <!-- Page content -->
    <div class="page-content">
        {{ $slot }}
    </div>
    <!-- /page content -->
    @include('layouts.error.js')
</body>

</html>
