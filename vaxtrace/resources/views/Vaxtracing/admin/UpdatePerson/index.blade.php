@extends('Vaxtracing.layout.admin.app')

@section('title', 'User Management')

@section('content')


<!-- Content Header (Page header) -->

{{-- <div class="card mb-3">
  <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
  </div>
  <!--/.bg-holder-->

  <div class="card-body position-relative">
    <div class="row">
      <div class="col-lg-8">
        <h3 class="text-success"><span class="typed-text fw-bold ms-1" data-typed-text='["MANAGE USER", "MANAGE USER"]'></span></h3>
        <p class="mt-2">You can create new category here...</p>
      </div>
    </div>
  </div>
</div> --}}


<div class="row mt-5 mt-lg-0 mt-xl-5 mt-xxl-0">
    <div class="col-lg-6 col-xl-12 col-xxl-6 h-100">
      <div class="d-flex mb-4"><span class="fa-stack me-2 ms-n1"><i class="fa-inverse fa-stack-1x text-primary fas fa-user-plus"></i></span>
        <div class="col">
          <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Update User Records</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
          <p class="mb-0">You can easily update existing user.</p>
        </div>
      </div>
      <div class="card theme-wizard mb-5 mb-lg-0 mb-xl-5 mb-xxl-0 h-100">
        
        
        <div class="card-body py-4">
          <div class="tab-content">
            <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel" aria-labelledby="form-wizard-progress-tab1" id="form-wizard-progress-tab1">
              <form role="form" id="formUpdateUser" >
                @csrf
                <div class="row g-2">
                  <div class="col-4">
                    <div class="form-floating mb-3">
                      <input class="form-control" id="floatingInput1 first_name" type="text" name="first_name" value="{{ $users->person->first_name }}" pattern="[a-zA-Z\s]+" title="Input letters only" required/>
                      <label for="floatingInput1">First Name</label>
                      <span class="text-danger errorMessage fs--2" id="error_first_name"></span>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-floating mb-3">
                      <input class="form-control" id="floatingInput2 middle_name" type="text" name="middle_name" value="{{ $users->person->middle_name }}" pattern="[a-zA-Z\s]+" title="Input letters only" required/>
                      <label for="floatingInput2">Middle Name</label>
                      <span class="text-danger errorMessage fs--2" id="error_middle_name"></span>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-floating mb-3">
                      <input class="form-control" id="floatingInput last_name" type="text" name="last_name" value="{{ $users->person->last_name }}" pattern="[a-zA-Z\s]+" title="Input letters only" required/>
                      <label for="floatingInput">Last Name</label>
                      <span class="text-danger errorMessage fs--2" id="error_last_name"></span>
                    </div>
                  </div>
                  
                  <div class="col-2">
                    <div class="form-floating">
                      <select class="form-select" id="floatingSelect suffix" name="suffix" aria-label="Floating label select example">
                        <option value="" selected></option>
                        <option value="Jr">Jr</option>
                        <option value="Sr"><center>Sr</center></option>
                        <option value="II"><center>II</center></option>
                        <option value="III"><center>III</center></option>
                        <option value="III"><center>IV</center></option>
                        <option value="III"><center>V</center></option>
                        
                      </select>
                      <label for="floatingSelect">Suffix</label>
                      <span class="text-danger errorMessage fs--2" id="error_suffix"></span>
                    </div>

                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-floating mb-3">
                    <input class="form-control" id="floatingInput email" type="email" name="email" placeholder="name@example.com" pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" required="required" value="{{ $users->email }}" />
                    <label for="floatingInput">Email</label>
                    <span class="text-danger errorMessage fs--2" id="error_email"></span>
                  </div>
                </div>
                <div class="row g-2">
                  <div class="col-6">
                    <div class="mb-3">
                      <div class="form-floating">
                        <select class="form-select" id="floatingSelect sex" name="sex" aria-label="Floating label select example">
                          <option selected="Male" value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Other">Other</option>
                        </select>
                        <label for="floatingSelect">Sex</label>
                        <span class="text-danger errorMessage fs--2" id="error_sex"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="mb-3">
                      <div class="form-floating">
                        <label for="floatingDate" style="line-height: 0rem; opacity:.65;" class="fs--2">Birth Date</label>
                        <input class="form-control datetimepicker" id="floatingDate birth_date" name="birth_date" value="{{ $users->person->birth_date }}" type="date" placeholder="dd/mm/yyyy" data-options='{"dateFormat":"d/m/y","disableMobile":true}' id="form-wizard-progress-wizard-datepicker"  min="1900-10-20" max="2030-10-20" required/>
                        <span class="text-danger errorMessage fs--2" id="error_birth_date"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-floating mb-3">
                    <input class="form-control" id="floatingInput contact_number" type="text" name="contact_number" placeholder="XXXX-XXX-XXXX" value="{{ $users->person->contact_number }}"/>
                    <label for="floatingInput">Contact Number</label>
                    <span class="text-danger errorMessage fs--2" id="error_contact_number"></span>
                  </div>
                </div> 
                <div class="row g-2">
                  <div class="col">
                    <div class="form-floating">
                      <select class="form-select region" id="floatingSelect region" name="region" aria-label="Floating label select example">
                        
                      </select>
                      <label for="floatingSelect">Region</label>
                      <span class="text-danger errorMessage fs--2" id="error_region"></span>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-floating">
                      <select class="form-select province" id="floatingSelect province" name="province" aria-label="Floating label select example">
                        <option value='' seleted>Select Province</option>
                      </select>
                      <label for="floatingSelect">Province</label>
                      <span class="text-danger errorMessage fs--2" id="error_province"></span>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row g-2">
                  <div class="col-6">
                    <div class="form-floating">
                      <select class="form-select city" id="floatingSelect city" name="city" aria-label="Floating label select example">
                        <option value='' seleted>Select City</option>
                      </select>
                      <label for="floatingSelect">City</label>
                      <span class="text-danger errorMessage fs--2" id="error_city"></span>
                    </div>
                  </div>
                  <br>
                  <div class="col-6">
                    <div class="form-floating">
                      <select class="form-select barangay" id="floatingSelect barangay" name="barangay" aria-label="Floating label select example">
                        <option value='' seleted>Select Barangay</option>
                      </select>
                      <label for="floatingSelect">Barangay</label>
                      <span class="text-danger errorMessage fs--2" id="error_barangay"></span>
                    </div>
                  </div>
                  <br>
                  <br>
                  <div class="col-12">
                    <div class="form-floating">
                        <input class="form-control" id="floatingInput home_address" type="text" name="home_address" value="{{ $users->person->home_address }}"/>
                        <label for="floatingInput">Home Address</label>
                        <span class="text-danger errorMessage fs--2" id="error_home_address"></span>
                    </div>
                  </div>
                  <br>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-footer bg-light">
          <div class="px-sm-3 px-md-5">
            <ul class="list-inline mb-0">
              <li class="next" style="text-align: right">
                <button class="btn btn-primary px-5 px-sm-6" id="update_user" type="submit">Submit<span class="fas fa-chevron-right ms-2"> </span></button>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    @section('scripts')
        <script type="text/javascript">
            var data = {!! json_encode($users) !!};
            var getAddressUrl = '{{ route("get_address") }}'
            var saveUpdateUrl = '{{ route("save_update_people") }}/' + data.id;

            $(function () {
              $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
              });
              $('#update_user').click(function (e) {
                e.preventDefault();

                var form = document.getElementById("formUpdateUser");
                var formData = new FormData(form);

                $.ajax({
                    url: saveUpdateUrl,
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    type: 'POST',
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
              });
            });
            
        </script>
    @endsection
@endsection


