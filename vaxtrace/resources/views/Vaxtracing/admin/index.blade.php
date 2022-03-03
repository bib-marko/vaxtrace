@extends('Vaxtracing.layout.admin.app')

@section('title', 'User Management')
  
@section('content')

 <!-- Page Content -->
 <div class="content">
    <div class="row invisible" data-toggle="appear">
      <!-- Row #1 -->
      <div class="col-6 col-xl-3">
        <a class="block block-link-pop text-right bg-gd-lake" href="javascript:void(0)">
          <div class="block-content block-content-full clearfix border-black-op-b border-3x">
            <div class="float-left mt-10 d-none d-sm-block">
              <i class="si si-users fa-3x text-white"></i>
            </div>
            <div class="font-size-h3 font-w600 text-white" data-toggle="countTo" data-speed="1000" data-to="{{ $total_user }}">0</div>
            <div class="font-size-sm font-w600 text-uppercase text-white-op">Total account</div>
          </div>
        </a>
      </div>

      {{-- <div class="col-6 col-md-4 col-xl-2">
        <a class="block text-center" href="javascript:void(0)">
          <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
            <div class="ribbon-box">750</div>
            <p class="mt-5">
              <i class="si si-book-open fa-3x text-white-op"></i>
            </p>
            <p class="font-w600 text-white">Articles</p>
          </div>
        </a>
      </div> --}}

      {{-- <div class="col-6 col-xl-3">
        <a class="block block-link-pop text-right bg-earth" href="javascript:void(0)">
          <div class="block-content block-content-full clearfix border-black-op-b border-3x">
            <div class="float-left mt-10 d-none d-sm-block">
              <i class="si si-trophy fa-3x text-earth-light"></i>
            </div>
            <div class="font-size-h3 font-w600 text-white">$<span data-toggle="countTo" data-speed="1000" data-to="2600">0</span></div>
            <div class="font-size-sm font-w600 text-uppercase text-white-op">Earnings</div>
          </div>
        </a>
      </div>

      <div class="col-6 col-xl-3">
        <a class="block block-link-pop text-right bg-elegance" href="javascript:void(0)">
          <div class="block-content block-content-full clearfix border-black-op-b border-3x">
            <div class="float-left mt-10 d-none d-sm-block">
              <i class="si si-envelope-letter fa-3x text-elegance-light"></i>
            </div>
            <div class="font-size-h3 font-w600 text-white" data-toggle="countTo" data-speed="1000" data-to="260">0</div>
            <div class="font-size-sm font-w600 text-uppercase text-white-op">Messages</div>
          </div>
        </a>
      </div>
      
      <div class="col-6 col-xl-3">
        <a class="block block-link-pop text-right bg-corporate" href="javascript:void(0)">
          <div class="block-content block-content-full clearfix border-black-op-b border-3x">
            <div class="float-left mt-10 d-none d-sm-block">
              <i class="si si-fire fa-3x text-corporate-light"></i>
            </div>
            <div class="font-size-h3 font-w600 text-white" data-toggle="countTo" data-speed="1000" data-to="4252">0</div>
            <div class="font-size-sm font-w600 text-uppercase text-white-op">Online</div>
          </div>
        </a>
      </div> --}}
      <!-- END Row #1 -->

    </div>
 </div>



@endsection


