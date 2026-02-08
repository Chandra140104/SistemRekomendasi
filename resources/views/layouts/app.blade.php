<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    {{-- NAVBAR + SIDEBAR --}}
    @include('layouts.sidebar')

    {{-- CONTENT --}}
    <div class="content-wrapper">
        @include('layouts.breadcrumb')
        @yield('content')
    </div>

    {{-- FOOTER --}}
    @include('layouts.footer')

</div>
</body>
</html>
