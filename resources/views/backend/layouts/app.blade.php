<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard')</title>

    <!-- All Css Links -->
    @include('backend.partials.links.style')
    @yield('styles')

</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @if (Request::is('dashboard*'))
            @include('backend.partials.sidebar')
        @endif
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @if (Request::is('dashboard*'))
                    @include('backend.partials.header')
                @endif

                @yield('content')
            </div>
            @if (Request::is('dashboard*'))
                @include('backend.partials.footer')
            @endif
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- All Js Links -->
    @include('backend.partials.links.script')
    @yield('scripts')

</body>
</html>
