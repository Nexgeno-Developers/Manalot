<!DOCTYPE html>
<html lang="en">

<head>

    <!----------Meta Information---------->
    @include('frontend.partials.meta')

    <!-----------Stylesheets------------>
    @include('frontend.partials.css')

</head>

<body id="index">



    <!---========Header======----->

        @include('frontend.partials.header')

    <!---========end Header======----->

    <!---======== page content ====-------->

        @yield('page.content')

    <!---======== page content ===== -------->

    <!-----------------------Footer Start------------------------------------------->

        @include('frontend.partials.footer')

    <!--Footer Ends-->


    <!--javascript-->
    @include('frontend.partials.js')
    @yield('page.scripts')
    @yield('component.scripts')

    @yield('forgot.scripts')

    @if (session('toastr'))
        <script>
            $(document).ready(function() {
                var type = "{{ session('toastr.type') }}";
                var message = "{{ session('toastr.message') }}";
                var title = "{{ session('toastr.title') }}";

                toastr[type](message, title);
            });
        </script>
    @endif

</body>

</html>