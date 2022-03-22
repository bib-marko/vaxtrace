<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Vaxtracing</title>

    <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    {{-- <meta property="og:image" content=""> --}}

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
    <div id="page-container" class="page-header-fixed page-header-glass main-content-boxed">

      <!-- Header -->
      <header id="page-header" class="invisible" data-toggle="appear" data-class="animated fadeInDown">
        <!-- Header Content -->
        <div class="content-header">
          <!-- Left Section -->
          <div class="content-header-section">
            <!-- Logo -->
            <div class="content-header-item">
              <a class="link-effect font-w700 mr-5" href="/">
                <i class="si si-magnifier text-success"></i>
                <span class="font-size-h4 text-dual-primary-dark">vax</span><span class="font-size-h4 text-success">tracing</span>
              </a>
            </div>
            <!-- END Logo -->
          </div>
          <!-- END Left Section -->

          <!-- Right Section -->
          <div class="content-header-section">
            <a class="btn btn-sm btn-hero btn-noborder btn-alt-success px-20" href="{{ route('view-login') }}">
              <i class="si si-login"></i> <span class="ml-5 d-none d-sm-inline-block">{{ __('Login') }}</span>
            </a>
          </div>
          <!-- END Right Section -->
        </div>
        <!-- END Header Content -->
      </header>
      <!-- END Header -->

      <!-- Main Container -->
      <main id="main-container">

        <!-- Hero -->
        <div class="bg-white bg-pattern" style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
          <div class="d-flex align-items-center">
            <div class="content content-full">
              <div class="row no-gutters w-100 py-100 overflow-hidden">
                <div class="col-md-5 py-30 d-flex align-items-center invisible" data-toggle="appear">
                  <div class="text-center text-md-left">
                    {{-- <span class="d-inline-block bg-dark text-white rounded-pill py-5 px-15 mb-15 font-w600">v1</span> --}}
                    <h1 class="font-w600 font-size-h2 mb-20">
                      Be protected. Get Vaccinated.
                    </h1>
                    <p class="font-size-lg nice-copy text-muted mb-30">
                      We are tracking the progress of COVID-19 vaccine candidates to monitor the latest developments.
                    </p>
                    <a class="btn btn-hero btn-alt-secondary" href="{{ route('view-login') }}" target="_blank">
                      <i class="fa fa-arrow-right text-muted mr-5"></i> Enter Login
                    </a>
                  </div>
                </div>
                <div class="col-md-7 py-30 d-none d-md-flex align-items-md-center justify-content-md-end invisible" data-toggle="appear" data-class="animated fadeInRight">
                  <img class="img-fluid" src="assets/media/various/landing-promo-hero.png" srcset="{{ asset('assets/img/bgcovid.jpg') }}" alt="Hero Promo">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END Hero -->

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-light">
          <div class="content py-50">
            <div class="row font-size-sm">
              <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-right">
                Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">kodicode</a>
              </div>
              <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                <a class="font-w600" href="https://1.envato.market/95j" target="_blank">Enterprise Cabuyao</a> &copy; <span class="js-year-copy"></span>
              </div>
            </div>
          </div>
        </footer>
        <!-- END Footer -->
      </main>
      <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <script src="{{ asset('assets/vaxtrace_assets/assets/js/codebase.core.min.js') }}"></script>

 
    <script src="{{ asset('assets/vaxtrace_assets/assets/js/codebase.app.min.js') }}"></script>
  </body>
</html>