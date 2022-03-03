@extends('Vaxtracing.layout.includes.app')

@section('content')




<!-- Page Content -->
<div class="bg-image" style="background-image: url('{{ asset('assets/img/bgvaxtracing.jpg') }}">
  <div class="row mx-0 bg-black-op">
    <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
      <div class="p-30 invisible" data-toggle="appear">
        <p class="font-size-h3 font-w600 text-white">
          Be protected. Get Vaccinated.
        </p>
        <p class="font-italic text-white-op">
          Copyright &copy; <span class="js-year-copy"></span>
        </p>
      </div>
    </div>
    <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
      <div class="content content-full">
        <!-- Header -->
        <div class="px-30 py-10">
          <a class="link-effect font-w700" href="/">
            <i class="si si-magnifier text-success"></i>
            <span class="font-size-xl text-primary-dark">vax</span><span class="font-size-xl text-success">tracing</span>
          </a>
          <h1 class="h3 font-w700 mt-30 mb-10">Welcome to VaxTracing</h1>
          <h2 class="h5 font-w400 text-muted mb-0">Please sign in</h2>
        </div>
        <!-- END Header -->

        <!-- Sign In Form -->
        <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js -->
        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <form class="js-validation-signin px-30" action="{{ route('submit-login') }}" method="POST" id="formLogin">
          @csrf
    
          @if (session('error'))

            <!-- Primary Alert -->
            <div class="alert alert-danger d-flex align-items-center" role="alert">
              <i class="fa fa-fw fa-warning mr-10"></i>
              <p class="mb-0">
                {{session('error')}}!
              </p>
            </div>
            <!-- END Primary Alert -->


          @endif


          <div class="form-group row">
            <div class="col-12">
              <div class="form-material floating">
                <input type="text" class="form-control" id="login-email" name="email" required autocomplete="email" autofocus>
                <label for="login-email">Email</label>
              </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          
          <div class="form-group row">
            <div class="col-12">
              <div class="form-material floating">
                <input type="password" class="form-control" id="login-password" name="password" required autocomplete="current-password">
                <label for="login-password">Password</label>
              </div>
              <small id="password" class="form-text text-success"> Keep your password away from other user</small>
            </div>
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
             @enderror
          </div>

          <div class="form-group row">
            <div class="col-12">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="login-remember-me" name="login-remember-me">
                <label class="custom-control-label" for="login-remember-me">Remember Me</label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <button type="submit" id="submit1" class="btn btn-sm btn-hero btn-alt-primary">
              <i class="si si-login mr-10"></i> Sign In
            </button>
            
          </div>
        </form>
        <!-- END Sign In Form -->
      </div>
    </div>
  </div>
</div>
<!-- END Page Content -->




   
        {{-- <div class="container-fluid">
          <div class="row min-vh-100 flex-center g-0">
            <div class="col-lg-8 col-xxl-5 py-3 position-relative"><img class="bg-auth-circle-shape" src="../../../assets/img/icons/spot-illustrations/bg-shape.png" alt="" width="250"><img class="bg-auth-circle-shape-2" src="../../../assets/img/icons/spot-illustrations/shape-1.png" alt="" width="150">
              <div class="card overflow-hidden z-index-1">
                <div class="card-body p-0">
                  <div class="row g-0 h-100">
                    <div class="col-md-5 text-center bg-card-gradient">
                      <div class="position-relative p-4 pt-md-5 pb-md-7 light">
                        <div class="bg-holder bg-auth-card-shape" style="background-image:url(../../../assets/img/icons/spot-illustrations/half-circle.png);">
                        </div>
                        <!--/.bg-holder-->
  
                        <div class="z-index-1 position-relative">
                            <a class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder" href="/">VaxTracing</a>
                            <center>
                              <img class="img-fluid" src="{{ asset('icon/CABARTER-LOGO.png') }}" width="125" alt="qrcode.svg" onclick="scanQRcode()">
                            </center>
                        </div>
                      </div>
                   
                    </div>
                    <div class="col-md-7 d-flex flex-center">
                      <div class="p-4 p-md-5 flex-grow-1">
                        <div class="row flex-between-center">
                          <div class="col-auto">
                            <center>
                              <h3>Account Login</h3>
                            </center>
                            
                          </div>
                        </div>
                        <form class='col-md-11 text-white' action="{{ route('submit-login') }}" method="POST" id="formLogin">
                            @csrf
    
                            @if (session('error'))

                            <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
                              <div class="bg-danger me-3 icon-item"><span class="fas fa-times-circle text-white fs-3"></span></div>
                              <p class="mb-0 flex-1">{{session('error')}}</p>
                              <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                            @endif
    
                            <div class="mb-3">
                                <label for="email" class="form-label text-md-right text-secondary">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            
                            </div>
    
                            <div class="mb-3">
                                <label for="password" class="form-label text-md-right text-secondary">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <small id="password" class="form-text text-success"> Keep your password away from other user</small>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                           
                            </div>
    
                            
                            <div class="mb-3">
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label text-info" for="remember">
                                                {{ __('Remember Me') }}
                                        </label>
                                </div>
                            </div>
    
                            <button type="submit" id="submit1" class="btn btn-warning form-control  rounded-pill">
                                        Sign in
                            </button>
    
                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-primary p-0 mt-2 fs--1" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                 </a>
                            @endif
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}

@endsection
@section('scripts')

<script src="{{ asset('js/user/script.js') }}"></script>
<script>
  var getAddressUrl = '{{ route("get_address") }}';
 $(function () {
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });
  $('#submit').click(function (e) {
    e.preventDefault();

    var form = document.getElementById("formLogin");
    var formData = new FormData(form);

    $.ajax({
        url: "{{ route('submit-login') }}",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (response) {
            Swal.fire({
                title: 'Success!',
                icon: 'success',
                text: "A new record has been created",
                confirmButtonText: 'Ok',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
               
                }
            })
        },
        error: function(response){
            $('.errorMessage').text("");
            $.each(response.responseJSON.errors,function(field_name,error){            
                $(document).find('[id=error_'+field_name+']').text("*"+error)
            })
        }
    });
  });  
});

</script>
@endsection


