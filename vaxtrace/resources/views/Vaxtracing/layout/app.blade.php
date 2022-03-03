<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Vaxtracing</title>

   
    <!-- Fonts -->

    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}">

    {{--Favicon--}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icon') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('icon/site.webmanifest') }}">


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }} ">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon/favicon-32x32.png') }} ">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icon/favicon-16x16.png') }} ">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('icon/favicon.ico') }} ">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }} ">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }} ">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('assets/js/config.js') }} "></script>
    <script src="{{ asset('assets/vendors/overlayscrollbars/OverlayScrollbars.min.js') }} "></script>

    
    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('assets/vendors/swiper/swiper-bundle.min.css') }} " rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('assets/vendors/overlayscrollbars/OverlayScrollbars.min.css') }} " rel="stylesheet">
    <link href="{{ asset('assets/css/theme-rtl.min.css') }} " rel="stylesheet" id="style-rtl">
    <link href="{{ asset('assets/css/theme.min.css') }} " rel="stylesheet" id="style-default">
    <link href="{{ asset('assets/css/user-rtl.min.css') }} " rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('assets/css/user.min.css') }} " rel="stylesheet" id="user-style-default">
    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>


    <style>
      .crop-image{
          position: relative;
          width: 345px;
          height: 310px;
          overflow: hidden;
      }

      .crop{
          position: absolute;
          top: -9999px;
          left: -9999px;
          right: -9999px;
          bottom: -9999px;
          margin: auto;
          border-radius: 5px !important;
      }

      .default::before {  
        transform: scaleX(0);
        transform-origin: bottom right;
      }

      .default:hover::before {
        transform: scaleX(1);
        transform-origin: bottom left;
      }

      .default::before {
        content: " ";
        display: block;
        position: absolute;
        top: 0; right: 0; bottom: 0; left: 0;
        inset: 0 0 0 0;
        background: #a5ffd9;
        z-index: -1;
        transition: transform .3s ease;
      }

      .default {
        position: relative;
      }


      .deals::before {  
        transform: scaleX(0);
        transform-origin: bottom right;
      }

      .deals:hover::before {
        transform: scaleX(1);
        transform-origin: bottom left;
      }

      .deals::before {
        content: " ";
        display: block;
        position: absolute;
        top: 0; right: 0; bottom: 0; left: 0;
        inset: 0 0 0 0;
        background: #ffd8a5;
        z-index: -1;
        transition: transform .3s ease;
      }

      .deals {
        position: relative;
      }



    </style>
  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        
      <nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-light" data-navbar-darken-on-scroll="data-navbar-darken-on-scroll">
        <div class="container"><a class="navbar-brand" href="/"><span class="text-success dark__text-white">Cabarter</span></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
            <ul class="navbar-nav" data-top-nav-dropdowns="data-top-nav-dropdowns">
              <li class="nav-item">
                  <a class="nav-link text-muted default" href="/">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-muted default" href="#pricing">Pricing</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-muted default" href="{{ route('faq.index') }}">FAQs</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-muted deals" href="{{ route('trade.index') }}"><b class="text-success">Top Trading Today!</b></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-muted deals" href="{{ route('flashbarter.index') }}"><b class="text-warning">F<i class="fas fa-bolt"></i>ASH BARTER</b></a>
              </li>
              <li class="nav-item active">
                  <a class="nav-link text-muted deals" href="{{ route('trade.more_posts') }}"><b class="text-success">Start Barter Here..</b></a>
              </li>
            </ul>
    
            <ul class="navbar-nav ms-auto">
              @if (url()->current() == route('trade.index'))
                      
              <form class="form-inline my-2 my-lg-0 mr-5"  action="{{ route('trade.index') }}" method="GET">
                  <input class="form-control mr-sm-2 search text-dark" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request()->query('search')}}">
              </form>
    
              @endif
    
              @if (url()->current() == route('trade.more_posts'))
              
              <form class="form-inline my-2 my-lg-0 mr-5"  action="{{ route('trade.more_posts') }}" method="GET">
                  <input class="form-control mr-sm-2 search text-dark" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request()->query('search')}}">
              </form>
    
              @endif
    
              <!-- Authentication Links -->
              @guest
                      <li class="nav-item mr-3">
                          <a class="nav-link p-2 text-muted default" href="{{ route('get_login') }}"><center>{{ __('Login') }}</center></a>
                      </li><br>
                      <li class="nav-item">
                          <a class="nav-link text-muted default" href="{{ route('get_register') }}"><center>{{ __('Create Account') }}</center></a>
                      </li>
              @else
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-success dark__text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="userDropdown">
                      {{ Auth::user()->fname }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-card border-0 mt-0" aria-labelledby="userDropdown">
                      <div class="bg-white dark__bg-1000 rounded-3 py-2">
                        <a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a>
    
                          @if(auth()->user()->hasRole('0'))
                              <a class="dropdown-item" href="{{ route('dashboard.index')}}">Dashboard</a>
                          @else
                              <a class="dropdown-item" href="{{ route('admin.home.index')}}">Dashboard</a>
                          @endif
                          
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>
    
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                       
                      </div>
                    </div>
                  </li>
              @endguest
            </ul>
          </div>
        </div>
      </nav>
  
   
      @yield('content')
   
      </main>


       
  
  
  
        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="bg-dark pt-8 pb-4 light">
  
          <div class="container">
            <div class="position-absolute btn-back-to-top bg-dark"><a class="text-600" href="#banner" data-bs-offset-top="0" data-scroll-to="#banner"><span class="fas fa-chevron-up" data-fa-transform="rotate-45"></span></a></div>
            <div class="row">
            <div class="col-lg-4">
              <h5 class="text-uppercase text-white opacity-85 mb-3">Our Mission</h5>
              <p class="text-600">Trading is one of the oldest social activities of human beings.  Our vision is a world in which trading, through the internet helps promote peace and social change.</p>
              
            </div>
            <div class="col ps-lg-6 ps-xl-8">
              <div class="row mt-5 mt-lg-0">
                <div class="col-6 col-md-3">
                  <h5 class="text-uppercase text-white opacity-85 mb-3">Main Menu</h5>
                  <ul class="list-unstyled">
                    <li class="mb-1"><a class="link-600" href="/">Home</a></li>
                    <li class="mb-1"><a class="link-600" href="#pricing">Pricing</a></li>
                    <li class="mb-1"><a class="link-600" href="{{ route('faq.index') }}">FAQs</a></li>
                  </ul>
                </div>
                <div class="col-6 col-md-5">
                  <h5 class="text-uppercase text-white opacity-85 mb-3">Special Features</h5>
                  <ul class="list-unstyled">
                    <li class="mb-1"><a class="link-600" href="{{ route('trade.index') }}">Trading Today!</a></li>
                    <li class="mb-1"><a class="link-600" href="{{ route('flashbarter.index') }}">FLASH BARTER</i></a></li>
                    <li class="mb-1"><a class="link-600" href="{{ route('trade.more_posts') }}">Start Barter Here..</a></li>
                  </ul>
                </div>

                 <!-- Authentication Links -->
              @guest
                <div class="col mt-5 mt-md-0">
                  <h5 class="text-uppercase text-white opacity-85 mb-3">Accounts</h5>
                  <ul class="list-unstyled">
                    <li>
                      <h5 class="fs-0 mb-0"><a class="link-600" href="{{ route('get_login') }}"> Login</a></h5>
                      <p class="text-600 opacity-50">Free or Pro Account</p>
                    </li>
                    <li>
                      <h5 class="fs-0 mb-0"><a class="link-600" href="{{ route('get_register') }}"> Create an Account</a></h5>
                      <p class="text-600 opacity-50">Registration Process</p>
                    </li>
                  </ul>
                </div>
                @endguest
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-0 bg-dark light">

          <div>
            <hr class="my-0 text-600 opacity-25" />
            <div class="container py-3">
              <div class="row justify-content-between fs--1">
                <div class="col-12 col-sm-auto text-center">
                  <p class="mb-0 text-600 opacity-85">All right reserve <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> 2021 &copy; <a class="text-success opacity-85" href="/"> CABARTER</a></p>
                </div>
                <div class="col-12 col-sm-auto text-center">
                  <p class="mb-0 text-600 opacity-85">BATCH 2020-2021</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->
 


    <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1" aria-labelledby="settings-offcanvas">
      <div class="offcanvas-header settings-panel-header bg-shape">
        <div class="z-index-1 py-1 light">
          <h5 class="text-white"> <span class="fas fa-palette me-2 fs-0"></span>Settings</h5>
          <p class="mb-0 fs--1 text-white opacity-75"> Set your own customized style</p>
        </div>
        <button class="btn-close btn-close-white z-index-1 mt-0" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body scrollbar-overlay px-card" id="themeController">
        <h5 class="fs-0">Color Scheme</h5>
        <p class="fs--1">Choose the perfect color mode for your app.</p>
        <div class="btn-group d-block w-100 btn-group-navbar-style">
          <div class="row gx-2">
            <div class="col-6">
              <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio" value="light" data-theme-control="theme" />
              <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherLight"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="../assets/img/generic/falcon-mode-default.jpg" alt=""/></span><span class="label-text">Light</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark" data-theme-control="theme" />
              <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherDark"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="../assets/img/generic/falcon-mode-dark.jpg" alt=""/></span><span class="label-text"> Dark</span></label>
            </div>
          </div>
        </div>
        <hr />
        <div class="d-flex justify-content-between">
          <div class="d-flex align-items-start"><img class="me-2" src="../assets/img/icons/left-arrow-from-left.svg" width="20" alt="" />
            <div class="flex-1">
              <h5 class="fs-0">RTL Mode</h5>
              <p class="fs--1 mb-0">Switch your language direction </p><a class="fs--1" href="../documentation/customization/configuration.html">RTL Documentation</a>
            </div>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input ms-0" id="mode-rtl" type="checkbox" data-theme-control="isRTL" />
          </div>
        </div>
        <hr />
        <div class="d-flex justify-content-between">
          <div class="d-flex align-items-start"><img class="me-2" src="../assets/img/icons/arrows-h.svg" width="20" alt="" />
            <div class="flex-1">
              <h5 class="fs-0">Fluid Layout</h5>
              <p class="fs--1 mb-0">Toggle container layout system </p><a class="fs--1" href="../documentation/customization/configuration.html">Fluid Documentation</a>
            </div>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input ms-0" id="mode-fluid" type="checkbox" data-theme-control="isFluid" />
          </div>
        </div>
        <hr />
        <div class="btn-group d-block w-100 btn-group-navbar-style">
          <div class="row gx-2">
            <div class="col-6">
              <input class="btn-check" id="navbar-style-transparent" type="radio" name="navbarStyle" value="transparent" data-theme-control="navbarStyle" />
              <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-transparent"> <img class="img-fluid img-prototype" src="../assets/img/generic/default.png" alt="" /><span class="label-text"> Transparent</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbar-style-inverted" type="radio" name="navbarStyle" value="inverted" data-theme-control="navbarStyle" />
              <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-inverted"> <img class="img-fluid img-prototype" src="../assets/img/generic/inverted.png" alt="" /><span class="label-text"> Inverted</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbar-style-card" type="radio" name="navbarStyle" value="card" data-theme-control="navbarStyle" />
              <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-card"> <img class="img-fluid img-prototype" src="../assets/img/generic/card.png" alt="" /><span class="label-text"> Card</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbar-style-vibrant" type="radio" name="navbarStyle" value="vibrant" data-theme-control="navbarStyle" />
              <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-vibrant"> <img class="img-fluid img-prototype" src="../assets/img/generic/vibrant.png" alt="" /><span class="label-text"> Vibrant</span></label>
            </div>
          </div>
        </div>
      </div>
    </div><a class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
      <div class="card-body d-flex align-items-center py-md-2 px-2 py-1">
        <div class="bg-soft-primary position-relative rounded-start" style="height:34px;width:28px">
          <div class="settings-popover"><span class="ripple"><span class="fa-spin position-absolute all-0 d-flex flex-center"><span class="icon-spin position-absolute all-0 d-flex flex-center">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="#2A7BE4"></path>
                  </svg></span></span></span></div>
        </div><small class="text-uppercase text-primary fw-bold bg-soft-primary py-2 pe-2 ps-1 rounded-end">customize</small>
      </div>
    </a>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/f4d5484dbd.js') }}" crossorigin="anonymous"></script>
    <script>
    $(() => {
        $('[data-toggle="tooltip"]').tooltip({
            html: true
        })
    })
    </script>
    @yield('scripts')
       

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('assets/vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/swiper/swiper-bundle.min.js') }}"> </script>
    <script src="{{ asset('assets/vendors/typed.js/typed.js') }}"></script>
    <script src="{{ asset('assets/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('assets/vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    
  </body>

</html>