<!DOCTYPE html>
{{-- light-style --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="{{ session('theme', 'light') }}-style  layout-menu-fixed"
    dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" data-theme="theme-default" data-admin-assets-path="../admin-assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <title>{{ @$title }}</title>


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
        href="{{ asset('admin-assets/img/favicon/favicon.ico') }}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/fonts/boxicons.css') }}" />
    <link href="{{ asset('admin-assets/fontawesome/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/fontawesome/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/fontawesome/solid.css') }}" rel="stylesheet">

    <!-- Core CSS -->
        <style>
            .light-style .dropzone {
                border: 2px dashed #d9dee3;
            }
        </style>
        @if (session('theme') == 'dark')
            <link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/dark-core.css') }}"
                class="template-customizer-core-css" />

            <link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/theme-default-dark.css') }}"
                class="template-customizer-theme-css">
        @else
            <link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/rtl/core.css') }}"
                class="template-customizer-core-css" />
            <link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/rtl/theme-default.css') }}"
                class="template-customizer-theme-css">
        @endif

    <link rel="stylesheet" href="{{ asset('admin-assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/css/bs-stepper.css') }}" />
    {{-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/dropzone/basic.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/dropzone/dropzone.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/dropzone/custom-dropzone.css') }}" /> --}}

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/quill/editor.css') }}" />

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/dropzone/custom-dropzone.css') }}" />

    @stack('component-styles')

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('admin-assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('admin-assets/js/config.js') }}"></script>

    <!-- Scripts -->
    {{-- @vite('resources/css/app.css') --}}


    @stack('styles')

</head>

<body class="font-sans antialiased">

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- sidebar -->
            @include('layouts.admin.sidebar')
            <!-- / sidebar -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                @include('layouts.admin.navbar')
                <!-- / Navbar -->

                <div class="content-wrapper">

                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <x-dashboard.alert />
                        <livewire:dashboard.alert />

                        {{ $slot }}
                    </div>
                    <!-- / Content -->


                    <!-- Footer -->
                    @include('layouts.admin.footer')
                    <!-- / Footer -->

                    <div class="layout-overlay layout-menu-toggle"></div>

                </div>

            </div>
            <!-- / Layout container -->

        </div>
    </div>

    <!-- Core JS -->
    <!-- build:js admin-assets/vendor/js/core.js -->
    <script src="{{ asset('admin-assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/js/menu.js') }}"></script>
    {{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> --}}
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin-assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <!-- Main JS -->
    <script src="{{ asset('admin-assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('admin-assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->

    <script src="{{ asset('admin-assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/quill/quill.js') }}"></script>

    @stack('component-scripts')

    {{-- @vite('resources/js/app.js') --}}
    <script src="{{ asset('build/admin-assets/app2.js') }}"></script>

    @stack('scripts')

    <script src="{{ asset('admin-assets/js/uploader.js') }}"></script>
</body>

</html>
