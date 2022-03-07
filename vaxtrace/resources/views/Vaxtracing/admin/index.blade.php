@extends('Vaxtracing.layout.admin.app')

@section('title', 'User Management')
  
@section('content')

 <!-- Page Content -->
 <div class="content">

  <div class="row gutters-tiny">
      <!-- Pending -->
      <div class="col-md-6 col-xl-3">
        <a class="block block-rounded block-transparent bg-gd-sun" href="javascript:void(0)">
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
      <!-- END Pending -->

      <!-- Canceled -->
      <div class="col-md-6 col-xl-3">
        <a class="block block-rounded block-transparent bg-gd-cherry" href="javascript:void(0)">
          <div class="block-content block-content-full block-sticky-options">
            <div class="block-options">
              <div class="block-options-item">
                <i class="fa fa-times text-white-op"></i>
              </div>
            </div>
            <div class="py-20 text-center">
              <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="2">0</div>
              <div class="font-size-sm font-w600 text-uppercase text-white-op">Canceled</div>
            </div>
          </div>
        </a>
      </div>
      <!-- END Canceled -->

      <!-- Completed -->
      <div class="col-md-6 col-xl-3">
        <a class="block block-rounded block-transparent bg-gd-lake" href="javascript:void(0)">
          <div class="block-content block-content-full block-sticky-options">
            <div class="block-options">
              <div class="block-options-item">
                <i class="fa fa-check text-white-op"></i>
              </div>
            </div>
            <div class="py-20 text-center">
              <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="21">0</div>
              <div class="font-size-sm font-w600 text-uppercase text-white-op">Completed</div>
            </div>
          </div>
        </a>
      </div>
      <!-- END Completed -->

      <!-- All -->
      <div class="col-md-6 col-xl-3">
        <a class="block block-rounded block-transparent bg-gd-dusk" href="javascript:void(0)">
          <div class="block-content block-content-full block-sticky-options">
            <div class="block-options">
              <div class="block-options-item">
                <i class="fa fa-archive text-white-op"></i>
              </div>
            </div>
            <div class="py-20 text-center">
              <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="35">0</div>
              <div class="font-size-sm font-w600 text-uppercase text-white-op">All</div>
            </div>
          </div>
        </a>
      </div>
      <!-- END All -->
    </div>
    <!-- END Statistics -->
    </div>
 </div>



@endsection


