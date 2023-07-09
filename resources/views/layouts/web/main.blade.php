<!DOCTYPE html>
<html lang="en">
@include('layouts.web.head')

<body>
    @include('layouts.web.load')
    @include('layouts.web.mobile')
    @include('layouts.web.search')
    @include('layouts.web.cart')
    @include('layouts.web.header')
    <main>
        {{ $slot }}
    </main>
    @include('layouts.web.footer')
    @include('layouts.web.script')
</body>

</html>
