<!doctype html>
<html class="no-js" lang="en" dir="ltr">


<!-- Mirrored from pixelwibes.com/template/my-task/html/dist/project-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2024 12:50:51 GMT -->
@yield('head')

<body data-mytask="theme-indigo">

    <div id="mytask-layout">

        <!-- sidebar -->
        @include('layouts.sidebar')

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            <!-- Body: Header -->
            @include('layouts.headerr')

            @yield('content')

            @yield('modal-member')
        </div>

        @include('layouts.settings')
    </div>

    @yield('scripts')

</body>

<!-- Mirrored from pixelwibes.com/template/my-task/html/dist/project-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2024 12:50:55 GMT -->

</html>
