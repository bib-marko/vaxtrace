@extends('Vaxtracing.layout.admin.app')

@section('title', 'User Management')

@section('content')


<!-- Content Header (Page header) -->


            <div class="block">
              <div class="block-header bg-gd-emerald text-white">
                <h3 class="block-title text-white">
                  <i class="si si-user-follow"></i> Update <small class="text-white">Account</small>
                </h3>
                <div class="block-options">
                  <button type="button" class="btn-block-option text-white" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                  </button>
                </div>
              </div>
        
              <div class="block-content">
                <form role="form" id="formUpdateUser" novalidate>
                  @csrf
                  <div class="row g-2">

                    <div class="col-12">
                      <div class="form-material form-material-success floating">
                        <select class="form-control" id="role_select" name="role" aria-label="Floating label select example" required>
                            @if(session()->get('LoggedUser')->role->short_code != 'ADMIN')
                              <option value="{{ session()->get('LoggedUser')->role->id }}">{{ session()->get('LoggedUser')->role->title }}</option>
                            @else
                              @foreach ($total_role as $role)
                                <option value="{{ $role->id }}">{{ $role->short_code .' - '. $role->title }}</option>
                              @endforeach
                            @endif
                        </select>
                        <label for="material-color-select2" style="font-size: 13px;">Role / Department</label>
                        <span class="text-danger errorMessage fs--2" id="error_region"></span>
                      </div>
                    </div>

                    <div class="col-4">
                      <div class="form-material form-material-success floating">
                        <input class="form-control" id="material-color-success2 first_name" type="text" name="first_name" value="{{ $users->person->first_name }}"  pattern="[a-zA-Z\s]+" title="Input letters only" required/>
                        <label for="material-color-success2" style="font-size: 13px;">First Name</label>
                        <span class="text-danger errorMessage fs--2" id="error_first_name"></span>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-material form-material-success floating">
                        <input class="form-control" id="material-color-success2 middle_name" type="text" name="middle_name" value="{{ $users->person->middle_name }}"/>
                        <label for="material-color-success2" style="font-size: 13px;">Middle Name</label>
                        <span class="text-danger errorMessage fs--2" id="error_middle_name"></span>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-material form-material-success floating">
                        <input class="form-control" id="material-color-success2 " type="text" name="last_name" value="{{ $users->person->last_name }}"  pattern="[a-zA-Z\s]+" title="Input letters only" required/>
                        <label for="material-color-success2" style="font-size: 13px;">Last Name</label>
                        <span class="text-danger errorMessage fs--2" id="error_last_name"></span>
                      </div>
                    </div>
                    
                    <div class="col-2">
                      <div class="form-material form-material-success floating">
                        <select class="form-control suffix" id="material-select2" name="suffix" aria-label="Floating label select example">
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

                  </div>
                  <div class="mb-3">
                    <div class="form-material form-material-success floating">
                      <input class="form-control" id="material-select2" type="email" name="email" value="{{ $users->email }}" pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" required="required" data-wizard-validate-email="true" />
                      <label for="material-color-success2" style="font-size: 13px;">Email</label>
                      <span class="text-danger errorMessage fs--2" id="error_email"></span>
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col-6">
                      <div class="form-material form-material-success floating">
                        <select class="form-control sex" id="material-select2" name="sex" value="{{ $users->person->sex }}" aria-label="Floating label select example">
                          <option value="" selected></option>
                          <option value="FEMALE"><center>FEMALE</center></option>
                          <option value="MALE"><center>MALE</center></option>
                        </select>
                        <label for="material-color-select2"  style="font-size: 13px;">Sex</label>
                        <span class="text-danger errorMessage" id="error_sex"></span>
                      </div>

                    </div>
                    <div class="col-6">
                      <div class="mb-3">
                        <div class="form-material form-material-success floating">
                          <p for="floatingDate" style="margin-top: -1.5em; font-size: 13px;" class="fs--2">Birth Date</p>
                          <input class="form-control datetimepicker" id="floatingDate" name="birth_date" value="{{ $users->person->birth_date }}" type="date" placeholder="dd/mm/yyyy" data-options='{"dateFormat":"d/m/y","disableMobile":true}' id="form-wizard-progress-wizard-datepicker" min="1900-10-20" max="2030-10-20" style="margin-top: -1.5em" required/>
                          <span class="text-danger errorMessage fs--2" id="error_birth_date"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="form-material form-material-success floating">
                      <input class="form-control" id="floatingInput" type="text" name="contact_number" value="{{ $users->person->contact_number }}" pattern="[0-9]+" title="Input numbers only" required/>
                      <label for="floatingInput" style="font-size: 13px;">Contact Number</label>
                      <span class="text-danger errorMessage fs--2" id="error_contact_number"></span>
                    </div>
                  </div> 
                  <div class="row g-3">

                    <div class="col">
                      <div class="form-material form-material-success floating">
                        <select class=" form-control region" id="material-select2 region" name="region" aria-label="Floating label select example" required>
                        
                        </select>
                        <label for="material-color-select2" style="font-size: 13px;">Region</label>
                        <span class="text-danger errorMessage fs--2" id="error_region"></span>
                      </div>
                    </div>

                    <div class="col">
                      <div class="form-material form-material-success floating">
                        <select class=" form-control province" id="material-select2 province" name="province" aria-label="Floating label select example" required>
                        
                        </select>
                        <label for="material-color-select2" style="font-size: 13px;">Province</label>
                        <span class="text-danger errorMessage fs--2" id="error_province"></span>
                      </div>
                    </div>
                  </div>
                  
                  <br>

                  <div class="row g-2">

                    <div class="col">
                      <div class="form-material form-material-success floating">
                        <select class=" form-control city" id="material-select2 city" name="city" aria-label="Floating label select example" required>
                        
                        </select>
                        <label for="material-color-select2" style="font-size: 13px;">City</label>
                        <span class="text-danger errorMessage fs--2" id="city"></span>
                      </div>
                    </div>

                    <br>

                    <div class="col">
                      <div class="form-material form-material-success floating">
                        <select class=" form-control barangay" id="material-select2 barangay" name="barangay" aria-label="Floating label select example" required>
                        
                        </select>
                        <label for="material-color-select2" style="font-size: 13px;">Barangay</label>
                        <span class="text-danger errorMessage " id="error_barangay"></span>
                      </div>
                    </div>        
                    <br>
                    
                      <div class="col-12">
                        <br>
                        <div class="form-material form-material-success floating">
                          <input class="js-maxlength form-control" id="example-material-maxlength7 home_address" type="text" name="home_address" value="{{ $users->person->home_address }}" rows="3" maxlength="100" data-always-show="true" required/>
                          <label for="example-material-maxlength7" style="font-size: 13px;">Home Address (e.g., street, block, lot, unit)</label>
                          <span class="text-danger errorMessage" id="error_home_address"></span>
                        </div>
                      </div>
                  </div>
                </form>
            </div>
          </div>  
      
      <div class="card-footer bg-light">
        <div class="px-sm-3 px-md-5">
          <ul class="list-inline mb-0">
            <li class="next" style="text-align: right">
              <button class="btn btn-square btn-alt-success min-width-125" id="update_user" type="submit">Update <span class="si si-arrow-right ms-2"> </span></button>
            </li>
          </ul>
        </div>
      </div>

   
    @section('scripts')
        <script type="text/javascript">

            var data = {!! json_encode($users) !!};
           
            var getAddressUrl = '{{ route("get_address") }}'
            var saveUpdateUrl = '{{ route("save_update_people") }}/' + data.id;
            let validator = $('#formUpdateUser').jbvalidator({
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
              $('.sex').val(data.person.sex).change();
              $('.suffix').val(data.person.suffix).change();
              $('#role_select').val(data.role_id).change();
              $('#update_user').click(function (e) {
                e.preventDefault();

                var form = document.getElementById("formUpdateUser");
                var formData = new FormData(form);
                if(validator.checkAll() == 0){
                  $.ajax({
                    url: '{{ route("save_update_people") }}/' + data.id,
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
                            window.location.href = "/manage/user";
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


