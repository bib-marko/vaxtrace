<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vaxtracing</title>

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Vaxtracing">
    <meta property="og:site_name" content="Vaxtracing">
    <meta property="og:description" content="Vaxtracing">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    {{-- CRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vaxtrace_assets/assets/js/plugins/select2/css/select2.css') }}">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/vaxtrace_assets/assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/vaxtrace_assets/assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/vaxtrace_assets/assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    {{-- pre loader --}}
    <link rel="stylesheet" href="{{ asset('assets/vaxtrace_assets/assets/css/themes/loader.css') }}">

    <!-- Stylesheets -->

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/vaxtrace_assets/assets/css/codebase.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->

    <link rel="stylesheet" href="{{ asset('assets/vaxtrace_assets/assets/js/plugins/select2/css/select2.css') }}">

    {{--DT--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">

    <style>
      .avatar {
        vertical-align: middle;
        width: 40px;
        height: 40px;
        border-radius: 50%;
      }

      .avatar-name{
        padding-left: 10px;
        padding-top: 5px;
      }
    </style>
  </head>
  <body>
    <!-- Page Container -->

    <div id="page-container" class="sidebar-o sidebar-inverse enable-page-overlay side-scroll page-header-fixed page-header-modern main-content-boxed">
      <!-- Side Overlay-->
      <aside id="side-overlay">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow">
          <div class="content-header-section align-parent">
            <!-- Close Side Overlay -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
              <i class="fa fa-times text-danger"></i>
            </button>
            <!-- END Close Side Overlay -->

            <!-- User Info -->
            <div class="content-header-item">
              <a class="img-link mr-5" href="be_pages_generic_profile.html">
                <div class="avatar avatar-xl me-2 text-white" style="background-color: #5755d9;">
                  <div class="avatar-name rounded-circle"><span>{{ strtoupper(substr(session()->get('LoggedUser')->person->first_name, 0, 1) ."". substr(session()->get('LoggedUser')->person->last_name, 0, 1)) }}</span></div>
                </div>
              </a>
              <a class="align-middle link-effect text-primary-dark font-w600" href="be_pages_generic_profile.html">{{ strtoupper(substr(session()->get('LoggedUser')->person->first_name, 0, 1).". ".session()->get('LoggedUser')->person->last_name) }}</a>
            </div>
            <!-- END User Info -->
          </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="content-side">
              <!-- Profile -->
              <div class="block pull-r-l">
                <div class="block-header bg-body-light">
                  <h3 class="block-title">
                    <i class="si si-pencil font-size-default mr-5"></i>Profile
                  </h3>
                  <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                  </div>
                </div>
                <div class="block-content">
                  <button type="submit" class="btn btn-block btn-alt-primary">
                    <i class="fa fa-refresh mr-5"></i> Update Profile
                  </button>
                </div>
              </div>
              <!-- END Profile -->


               <!-- Personal Profile -->
          <div class="block pull-r-l">
            <div class="block-header bg-body-light">
              <h3 class="block-title">
                <i class="fa fa-asterisk font-size-default mr-5"></i>Change Password
              </h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
              </div>
            </div>
            <div class="block-content">
              <form role="form" id="formChangePassword" novalidate>
                @csrf
                <div class="form-group mb-15">
                  <label for="side-overlay-profile-email">Email</label>
                  <div class="input-group">
                    <input type="email" class="form-control" id="side-overlay-profile-email" name="side-overlay-profile-email" value="{{ session()->get('LoggedUser')->email }}" disabled>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="fa fa-envelope"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group mb-15">
                  <label for="side-overlay-profile-password">Old Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="side-overlay-profile-password" name="old_password" placeholder="Old Password.." required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="fa fa-asterisk"></i>
                      </span>
                    </div>
                    <span class="text-danger errorMessage fs--2" id="error_old_password"></span>
                  </div>
                </div>
                <div class="form-group mb-15">
                  <label for="side-overlay-profile-password">New Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="password" name="new_password" data-v-min-length="8" data-v-max-length="16" title="password" placeholder="New Password.." required>
                    {{-- <input type="password" class="form-control" id="side-overlay-profile-password new_password" name="side-overlay-profile-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="New Password.." required> --}}
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="fa fa-asterisk"></i>
                      </span>
                    </div>
                    <span class="text-danger errorMessage fs--2" id="error_new_password"></span>
                  </div>
                </div>
                <div class="form-group mb-15">
                  <label for="side-overlay-profile-password-confirm">Confirm New Password</label>
                  <div class="input-group">
                    <input name="confirm_new_password" type="password" class="form-control" data-v-equal="#password" placeholder="Confirm New Password.." required>
                    {{-- <input type="password" class="form-control" id="side-overlay-profile-password-confirm confirm_new_password" name="side-overlay-profile-password-confirm" placeholder="Confirm New Password.." data-v-equal="#new_password"> --}}
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="fa fa-asterisk"></i>
                      </span>
                    </div>
                    <span class="text-danger errorMessage fs--2" id="error_confirm_new_password"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-6">
                    <button class="btn btn-block btn-alt-primary" id="change_pass">
                      <i class="fa fa-refresh mr-5"></i> Update
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- END Personal info -->
        </div>
        <!-- END Side Content -->
      </aside>
      <!-- END Side Overlay -->

      <!-- Sidebar -->
      <!--
          Helper classes

          Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
          Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
              If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

          Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
          Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
              - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
      -->
      <nav id="sidebar">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
          <!-- Side Header -->
          <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
              <!-- Logo -->
              <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
              </span>
              <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
              <!-- Close Sidebar, Visible only on mobile screens -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                <i class="fa fa-times text-danger"></i>
              </button>
              <!-- END Close Sidebar -->

              <!-- Logo -->
              <div class="content-header-item">
                <a class="link-effect font-w700" href="index.html">
                  <i class="si si-magnifier text-success"></i>
                  <span class="font-size-xl text-dual-primary-dark">vax</span><span class="font-size-xl text-success">tracing</span>
                </a>
              </div>
              <!-- END Logo -->
            </div>
            <!-- END Normal Mode -->
          </div>
          <!-- END Side Header -->

          <!-- Sidebar Scrolling -->
          <div class="js-sidebar-scroll">
            <!-- Side User -->
            <div class="content-side content-side-full content-side-user px-10 align-parent">
              <!-- Visible only in mini mode -->
              <div class="sidebar-mini-visible-b align-v animated fadeIn">
                <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar15.jpg" alt="">
              </div>
              <!-- END Visible only in mini mode -->

              <!-- Visible only in normal mode -->
              <div class="sidebar-mini-hidden-b text-center">
                <a class="img-link" href="be_pages_generic_profile.html">
                  <div class="avatar avatar-xl me-2 text-white" style="background-color: #5755d9;">
                    <div class="avatar-name rounded-circle pt-10 pr-10"><span>{{ strtoupper(substr(session()->get('LoggedUser')->person->first_name, 0, 1) ."". substr(session()->get('LoggedUser')->person->last_name, 0, 1)) }}</span></div>
                  </div>
                </a>
                <ul class="list-inline mt-10">
                  <li class="list-inline-item">
                    <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase" href="be_pages_generic_profile.html">{{ strtoupper(substr(session()->get('LoggedUser')->person->first_name, 0, 1).". ".session()->get('LoggedUser')->person->last_name) }}</a>
                  </li>
                  <li class="list-inline-item">
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                      <i class="si si-pencil"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a class="link-effect text-dual-primary-dark" href="op_auth_signin.html">
                      <i class="si si-logout"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
              <ul class="nav-main">
                <li>
                  <a href="{{ route('get_admin_dashboard') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                </li>
                <li>
                  <a href="{{ route('get_manage_user') }}"><i class="si si-users"></i><span class="sidebar-mini-hide">User Management</span></a>
                </li>
              </ul>
            </div>
            <!-- END Side Navigation -->
          </div>
          <!-- END Sidebar Scrolling -->
        </div>
        <!-- Sidebar Content -->
      </nav>
      <!-- END Sidebar -->

      <!-- Header -->
      <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
          <!-- Left Section -->
          <div class="content-header-section">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
              <i class="fa fa-navicon"></i>
            </button>
            <!-- END Toggle Sidebar -->

            <!-- Layout Options (used just for demonstration) -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-options-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-wrench"></i>
              </button>
              <div class="dropdown-menu min-width-300" aria-labelledby="page-header-options-dropdown">
                <h5 class="h6 text-center py-10 mb-10 border-b text-uppercase">Settings</h5>
               
                <h6 class="dropdown-header">Header</h6>
                <div class="row gutters-tiny text-center mb-5">
                  <div class="col-6">
                    <button type="button" class="btn btn-sm btn-block btn-alt-secondary" data-toggle="layout" data-action="header_fixed_toggle">Fixed Mode</button>
                  </div>
                  <div class="col-6">
                    <button type="button" class="btn btn-sm btn-block btn-alt-secondary d-none d-lg-block mb-10" data-toggle="layout" data-action="header_style_classic">Classic Style</button>
                  </div>
                </div>
                <h6 class="dropdown-header">Sidebar</h6>
                <div class="row gutters-tiny text-center mb-5">
                  <div class="col-6">
                    <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_off">Light</button>
                  </div>
                  <div class="col-6">
                    <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_on">Dark</button>
                  </div>
                </div>
                <div class="d-none d-xl-block">
                  <h6 class="dropdown-header">Main Content</h6>
                  <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="content_layout_toggle">Toggle Layout</button>
                </div>
                <div class="dropdown-divider"></div>
              </div>
            </div>
            <!-- END Layout Options -->
          </div>
          <!-- END Left Section -->

          <!-- Right Section -->
          <div class="content-header-section">
            <!-- User Dropdown -->
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user d-sm-none"></i>
                <span class="d-none d-sm-inline-block">{{ strtoupper(substr(session()->get('LoggedUser')->person->first_name, 0, 1).". ".session()->get('LoggedUser')->person->last_name) }}</span>
                <i class="fa fa-angle-down ml-5"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">User</h5>
               
                <a class="dropdown-item" href="{{ route('logout') }}">
                  <i class="si si-logout mr-5"></i> Sign Out
                </a>
              </div>
            </div>
            <!-- END User Dropdown -->

            <!-- Toggle Side Overlay -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="side_overlay_toggle">
              <i class="fa fa-tasks"></i>
            </button>
            <!-- END Toggle Side Overlay -->
          </div>
          <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Loader -->
        <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary">
          <div class="content-header content-header-fullrow text-center">
            <div class="content-header-item">
              <i class="fa fa-sun-o fa-spin text-white"></i>
            </div>
          </div>
        </div>
        <!-- END Header Loader -->
      </header>
      <!-- END Header -->

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="content">

           
          
            @yield('content')

            @include('Vaxtracing.layout.admin.modal')
          
          </div>
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

      <!-- Footer -->
      <footer id="page-footer">
        <div class="content py-20 font-size-sm clearfix">
          <div class="float-right">
            Crafted by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">Enterprise Cabuyao</a>
          </div>
          <div class="float-left">
            <a class="font-w600" href="#j" target="_blank">vaxtracing</a> &copy; <span class="js-year-copy"></span>
          </div>
        </div>
      </footer>
      <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <script src="{{ asset('assets/vaxtrace_assets/assets/js/codebase.core.min.js') }}"></script>

    <!--
        Codebase JS

        Custom functionality including Blocks/Layout API as well as other vital and optional helpers
        webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="{{ asset('assets/vaxtrace_assets/assets/js/codebase.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/vaxtrace_assets/assets/js/plugins/chartjs/Chart.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/vaxtrace_assets/assets/js/pages/be_pages_dashboard.min.js') }}"></script>

     {{--DT--}}
     
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('assets/vendors/bootstrap/bootstrap.min.js') }}"></script>

    {{-- SWAL --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


   
    {{--Script--}}
    <script src="{{ asset('js/user/script.js') }}"></script>
    <script  src="{{ asset('js/admin/script.js') }}" ></script>
    <script src="https://cdn.jsdelivr.net/npm/@emretulek/jbvalidator"></script>

    <!-- Page JS Helpers (Select2 plugin) -->
    <script src="{{ asset('assets/vaxtrace_assets/assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('assets/vaxtrace_assets/assets/js/plugins/masked-inputs/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('assets/vaxtrace_assets/assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>jQuery(function(){Codebase.helpers('select2');});</script>
    
    <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins) -->
    <script>jQuery(function(){Codebase.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']);});</script>
    
    @yield('scripts')
    <script type="text/javascript">
      var validatorPassword = $('#formChangePassword').jbvalidator({
              errorMessage: true,
              successClass: false,
          });
      $(function () {
        
        $('#change_pass').click(function (e) {
          e.preventDefault();
          
          var form = document.getElementById("formChangePassword");
          var formData = new FormData(form);
          if(validatorPassword.checkAll() == 0){
            $.ajax({
              url: '{{ route("change_password") }}',
              data: formData,
              cache: false,
              processData: false,
              contentType: false,
              type: 'POST',
              beforeSend: function () {
                showLoader();
              },
              complete: function () {
                hideLoader();
              },
              success: function (response) {
                  Swal.fire({
                      title: 'Success!',
                      icon: 'success',
                      text: "The record has been updated",
                      confirmButtonText: 'Ok',
                  }).then((result) => {
                      // /* Read more about isConfirmed, isDenied below */
                      // if (result.isConfirmed) {
                      // window.location.href = "/manage/user";
                      // }
                  })
              },
              error: function(response){
                  $("#pre_loader").modal('hide');
                  Swal.fire({
                      title: 'Warning!',
                      icon: 'warning',
                      text: "You entered an incorrect password",
                      confirmButtonText: 'Ok',
                  }).then((result) => {
                      // /* Read more about isConfirmed, isDenied below */
                      // if (result.isConfirmed) {
                      // window.location.href = "/manage/user";
                      // }
                  })
              
              }
            });
          }
          
        });
      });
      
  </script>
  </body>
</html>