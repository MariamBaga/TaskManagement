@php
    $notifications = Auth::user()->notifications()->latest()->get();
@endphp
<!doctype html>
<html class="no-js" lang="en" dir="ltr">


@yield('head')

<body data-mytask="theme-indigo">

    <div id="mytask-layout">

        <!-- sidebar -->
        @include('layouts.sidebar')

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            <!-- Body: Header -->
            @include('layouts.headerr', ['notifications' => $notifications])


            @yield('content')

            @yield('modal-member')
        </div>


    </div>

    @yield('scripts')

</body>

<
</html>
