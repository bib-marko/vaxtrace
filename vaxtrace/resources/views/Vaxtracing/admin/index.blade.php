@extends('Vaxtracing.layout.admin.app')

@section('title', 'User Management')
  
@section('content')

 <!-- Page Content -->
 <div class="content">
    <div class="row gutters-tiny">

      @if (session('LoggedUser')->hasPermission('USER_ACCESS'))

        <!-- Total Accounts -->
        <div class="col-md-6 col-xl-3">
          <a class="block block-rounded block-transparent bg-gd-sun block-link-pop" href="javascript:void(0)">
            <div class="block-content block-content-full block-sticky-options">
              <div class="block-options">
                <div class="block-options-item">
                  <i class="si si-users text-white-op"></i>
                </div>
              </div>
              <div class="py-20 text-center">
                <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{ $total_user }}">0</div>
                <div class="font-size-sm font-w600 text-uppercase text-white-op">Total Accounts</div>
              </div>
            </div>
          </a>
        </div>
        <!-- END Total Accounts -->
      @endif

      @if (session('LoggedUser')->hasPermission('ROLE_ACCESS'))
          <!-- Role / Department -->
          <div class="col-md-6 col-xl-3">
            <a class="block block-rounded block-transparent bg-gd-sea block-link-pop" href="javascript:void(0)">
              <div class="block-content block-content-full block-sticky-options">
                <div class="block-options">
                  <div class="block-options-item">
                    <i class="si si-puzzle text-white-op"></i>
                  </div>
                </div>
                <div class="py-20 text-center">
                  <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{ $total_department }}">0</div>
                  <div class="font-size-sm font-w600 text-uppercase text-white-op">Role / Department</div>
                </div>
              </div>
            </a>
          </div>
          <!-- END Role / Department -->
      @endif

      @if (session('LoggedUser')->hasPermission('PERMISSION_ACCESS'))
        <!-- Permission -->
        <div class="col-md-6 col-xl-3">
          <a class="block block-rounded block-transparent bg-gd-lake block-link-pop" href="javascript:void(0)">
            <div class="block-content block-content-full block-sticky-options">
              <div class="block-options">
                <div class="block-options-item">
                  <i class="si si-key text-white-op"></i>
                </div>
              </div>
              <div class="py-20 text-center">
                <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{ $total_permission }}">0</div>
                <div class="font-size-sm font-w600 text-uppercase text-white-op">Permission</div>
              </div>
            </div>
          </a>
        </div>
        <!-- END Permission -->
      @endif

      @if (session('LoggedUser')->hasPermission('SUBSYSTEM_ACCESS'))
        <!-- Sub-system -->
        <div class="col-md-6 col-xl-3">
          <a class="block block-rounded block-transparent bg-gd-dusk  block-link-pop" href="javascript:void(0)">
            <div class="block-content block-content-full block-sticky-options">
              <div class="block-options">
                <div class="block-options-item">
                  <i class="si si-screen-desktop text-white-op"></i>
                </div>
              </div>
              <div class="py-20 text-center">
                <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{ $total_subSystem }}">0</div>
                <div class="font-size-sm font-w600 text-uppercase text-white-op">Sub-system</div>
              </div>
            </div>
          </a>
        </div>
        <!-- END Sub-system -->
        @endif

    </div>
    <!-- END Statistics -->
  </div>
 </div>



@endsection


