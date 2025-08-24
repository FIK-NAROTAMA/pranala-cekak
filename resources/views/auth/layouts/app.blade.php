
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <meta property="og:title" content="{{ config('app.name') }} - 404" />
    <meta property="og:description" content="URL tidak ditemukan atau sudah kadaluwarsa. Silakan dikonfirmasi pada pemberi URL ini." />
    <meta property="og:type" content="a private URL shortener" />
    <meta property="og:url" content="{{ $url }}" />
    <meta property="og:image" content="{{ asset('images/logo.png') }}" />

    <link href="{{ asset('apps/app.css') }}" rel="stylesheet">
    <!--link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-icons/font/css/bootstrap-icon.min.css') }}" rel="stylesheet"-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:ital,wght@0,100..900;1,100..900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/assets/auth/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/auth/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/auth/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/auth/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/auth/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="/assets/auth/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="/assets/auth/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/auth/js/config.js"></script>
  </head>

  <body>
    @yield('content')

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/assets/auth/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/auth/vendor/libs/popper/popper.js"></script>
    <script src="/assets/auth/vendor/js/bootstrap.js"></script>
    <script src="/assets/auth/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/assets/auth/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="/assets/auth/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>