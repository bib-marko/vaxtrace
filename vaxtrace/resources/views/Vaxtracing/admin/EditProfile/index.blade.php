@extends('Vaxtracing.layout.admin.app')

@section('title', 'Edit profile')
  
@section('content')

        <!-- User Info -->
        <div class="bg-image bg-image-bottom" style="background-image: url('assets/media/photos/photo13@2x.jpg');">
            <div class="bg-black-op-75 py-30">
              <div class="content content-full text-center">
                <!-- Avatar -->
                <div class="mb-15">
                  
                  <a class="img-link" href="">
                    <div class="avatar avatar-xl me-5 text-white" style="background-color: #5755d9;">
                      <div class="avatar-name rounded-circle pt-10 pr-10"><span>{{ strtoupper(substr(session()->get('LoggedUser')->person->first_name, 0, 1) ."". substr(session()->get('LoggedUser')->person->last_name, 0, 1)) }}</span></div>
                    </div>
                  </a>
                </div>
                <!-- END Avatar -->
  
                <!-- Personal -->
                <h1 class="h3 text-white font-w700 mb-10">{{ session()->get('LoggedUser')->person->first_name." ".session()->get('LoggedUser')->person->last_name }}</h1>
                {{-- <h2 class="h5 text-white-op">
                  Product Manager <a class="text-primary-light" href="javascript:void(0)">@GraphicXspace</a>
                </h2> --}}
                <!-- END Personal -->
  
                <!-- Actions -->
                <a href="{{ route('get_admin_dashboard') }}" class="btn btn-rounded btn-hero btn-sm btn-alt-secondary mb-5">
                  <i class="fa fa-arrow-left mr-5"></i> Back to Dashboard
                </a>
                <!-- END Actions -->
              </div>
            </div>
          </div>
          <!-- END User Info -->
  
          <!-- Main Content -->
          <div class="content">
            <!-- User Profile -->
            <div class="block">
              <div class="block-header block-header-default">
                <h3 class="block-title">
                  <i class="fa fa-user-circle mr-5 text-muted"></i> User Profile
                </h3>
              </div>
              <div class="block-content">
                <form action="" id="formEditUser" novalidate>
                  <div class="row items-push">
                    <div class="col-4">
                      <div class="form-material form-material-success floating">
                        <input class="form-control" id="material-color-success2 first_name" type="text" name="first_name" pattern="[a-zA-Z\s]+" title="Input letters only" value="{{ session()->get('LoggedUser')->person->first_name }}" required/>
                        <label for="material-color-success2" style="font-size: 13px;">First Name</label>
                        <span class="text-danger errorMessage fs--2" id="error_first_name"></span>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-material form-material-success floating">
                        <input class="form-control" id="material-color-success2 middle_name" type="text" name="middle_name" value="{{ session()->get('LoggedUser')->person->middle_name }}"/>
                        <label for="material-color-success2" style="font-size: 13px;">Middle Name</label>
                        <span class="text-danger errorMessage fs--2" id="error_middle_name"></span>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-material form-material-success floating">
                        <input class="form-control" id="material-color-success2 " type="text" name="last_name" pattern="[a-zA-Z\s]+" title="Input letters only" value="{{ session()->get('LoggedUser')->person->last_name }}" required/>
                        <label for="material-color-success2" style="font-size: 13px;">Last Name</label>
                        <span class="text-danger errorMessage fs--2" id="error_last_name"></span>
                      </div>
                    </div>

                    <div class="col-2">
                      <div class="form-material form-material-success floating">
                        <select class="form-control" id="suffix" name="suffix" aria-label="Floating label select example">
                          <option value="" selected></option>
                          <option value="JR"><center>Jr</center></option>
                          <option value="SR"><center>Sr</center></option>
                          <option value="II"><center>II</center></option>
                          <option value="III"><center>III</center></option>
                          <option value="III"><center>IV</center></option>
                          <option value="III"><center>V</center></option>
                        </select>
                        <label for="material-color-select2" style="font-size: 13px;">Suffix</label>
                        <span class="text-danger errorMessage" id="error_suffix"></span>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-material form-material-success floating">
                        <select class="form-control" id="sex" name="sex" aria-label="Floating label select example">
                          <option value="" selected></option>
                          <option value="FEMALE"><center>FEMALE</center></option>
                          <option value="MALE"><center>MALE</center></option>
                        </select>
                        <label for="material-color-select2"  style="font-size: 13px;">Sex</label>
                        <span class="text-danger errorMessage" id="error_sex"></span>
                      </div>

                    </div>
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <div class="form-material form-material-success floating">
                          <label for="floatingDate" style="margin-top: -1.5em; font-size: 13px;" class="fs--2">Birth Date</label>
                          <input class="form-control datetimepicker" id="floatingDate" name="birth_date" type="date" placeholder="dd/mm/yyyy" data-options='{"dateFormat":"d/m/y","disableMobile":true}' id="form-wizard-progress-wizard-datepicker" value="{{ session()->get('LoggedUser')->person->birth_date }}" min="1900-10-20" max="2030-10-20" required/>
                          <span class="text-danger errorMessage fs--2" id="error_birth_date"></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-material form-material-success floating">
                        <input class="form-control" id="floatingInput" type="text" name="contact_number" value="{{ session()->get('LoggedUser')->person->contact_number }}" pattern="[0-9]+" title="Input numbers only" required/>
                        <label for="floatingInput" style="font-size: 13px;">Contact Number</label>
                        <span class="text-danger errorMessage fs--2" id="error_contact_number"></span>
                      </div>
                    </div> 
                    <input class="form-control" id="material-select2" type="email" name="email" pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$"  value="{{ session()->get('LoggedUser')->email }}" data-wizard-validate-email="true" hidden/>
                    <div class="col-lg-12">
                      <div class="row g-2">

                        <div class="col">
                          <div class="form-material form-material-success floating">
                            <select class="js-select2 form-control region" id="material-select2 region" name="region" aria-label="Floating label select example" required>
                            
                            </select>
                            <label for="material-color-select2" style="font-size: 13px;">Region</label>
                            <span class="text-danger errorMessage fs--2" id="error_region"></span>
                          </div>
                        </div>
  
                        <div class="col">
                          <div class="form-material form-material-success floating">
                            <select class="js-select2 form-control province" id="material-select2 province" name="province" aria-label="Floating label select example" required>
                            
                            </select>
                            <label for="material-color-select2" style="font-size: 13px;">Province</label>
                            <span class="text-danger errorMessage fs--2" id="error_province"></span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="row g-2">

                        <div class="col">
                          <div class="form-material form-material-success floating">
                            <select class="js-select2 form-control city" id="material-select2 city" name="city" aria-label="Floating label select example" required>
                            
                            </select>
                            <label for="material-color-select2" style="font-size: 13px;">City</label>
                            <span class="text-danger errorMessage fs--2" id="city"></span>
                          </div>
                        </div>
  
                        <br>
  
                        <div class="col">
                          <div class="form-material form-material-success floating">
                            <select class="js-select2 form-control barangay" id="material-select2 barangay" name="barangay" aria-label="Floating label select example" required>
                            
                            </select>
                            <label for="material-color-select2" style="font-size: 13px;">Barangay</label>
                            <span class="text-danger errorMessage " id="error_barangay"></span>
                          </div>
                        </div>        
                        <br>
                        
                          <div class="col-12">
                            <br>
                            <div class="form-material form-material-success floating">
                              
                              <input class="js-maxlength form-control" id="example-material-maxlength7 home_address" type="text" name="home_address"  value="{{ session()->get('LoggedUser')->person->home_address }}" rows="3" maxlength="100" data-always-show="true" required/>
                               <label for="example-material-maxlength7" style="font-size: 13px;">Home Address (e.g., street, block, lot, unit)</label>
                              <span class="text-danger errorMessage" id="error_home_address"></span>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer bg-light">
                      <div class="px-sm-3 px-md-5">
                        <ul class="list-inline mb-0">
                          <li class="next" style="text-align: right">
                            <button class="btn btn-square btn-alt-success min-width-125" id="edit_profile">Submit <span class="si si-arrow-right ms-2"> </span></button>
                          </li>
                        </ul>
                      </div>
                    </div>
                </form>
              </div>
            </div>
            <!-- END User Profile -->

          </div>
          <!-- END Main Content -->
          <!-- END Page Content -->
          <?php $session_value = session()->get('LoggedUser')?>
          @section('scripts')
          <script type="text/javascript">
              var getAddressUrl = '{{ route("get_address") }}'
              var user = {!! json_encode($session_value) !!};
              let validatorEdit = $('#formEditUser').jbvalidator({
                      errorMessage: true,
                      successClass: false,
                  });
              $(function () {
                $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                });
                hideLoader();
                $('#sex').val(user.person.sex).change();
                $('#suffix').val(user.person.suffix).change();
  
                $('#edit_profile').click(function (e) {
                  e.preventDefault();
  
                  var form = document.getElementById("formEditUser");
                  var formData = new FormData(form);
                  if(validatorEdit.checkAll() == 0){
                    $.ajax({
                      url: '{{ route("save_edit_profile") }}/' + user.id,
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
                              /* Read more about isConfirmed, isDenied below */
                              if (result.isConfirmed) {
                                window.location.href = "/dashboard";
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
                  }
                  
                });
              });
              
          </script>
      @endsection


@endsection