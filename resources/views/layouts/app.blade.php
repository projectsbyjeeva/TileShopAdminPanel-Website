<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>



    {{-- Bootstrap CSS --}}
    <link rel="stylesheet"
    href="{{ asset('assets/css/bootstrap.css') }}">

    {{-- DataTables CSS --}}
    <link rel="stylesheet"
    href="{{ asset('assets/css/datatables.css') }}">

    {{-- Custom CSS --}}
    <link rel="stylesheet"

    href="{{ asset('assets/css/style.css') }}">




</head>

<body>

        @include('layouts.menubar')

    @yield('content')



    {{-- jQuery --}}
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    {{-- Bootstrap --}}
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>


    {{-- DataTables --}}
    <script src="{{ asset('assets/js/dataTables.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap5.min.js') }}"></script>

    <!-- <script src="{{ asset('assets/js/common.js') }}"></script> -->

</body>

@include('layouts.footer')

</html>