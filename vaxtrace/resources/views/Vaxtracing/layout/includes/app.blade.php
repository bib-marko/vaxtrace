<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Vaxtracing</title>

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/vaxtrace_assets/assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/vaxtrace_assets/assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/vaxtrace_assets/assets/css/codebase.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
  </head>
  <body>

    <div id="page-container" class="main-content-boxed">

      <!-- Main Container -->
      <main id="main-container">
          
            @yield('content')
      </main>
      <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
  
    <script src="{{ asset('assets/vaxtrace_assets/assets/js/codebase.core.min.js') }}"></script>

    <script src="{{ asset('assets/vaxtrace_assets/assets/js/codebase.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/vaxtrace_assets/assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/vaxtrace_assets/assets/js/pages/op_auth_signin.min.js') }}"></script>
  </body>
</html>