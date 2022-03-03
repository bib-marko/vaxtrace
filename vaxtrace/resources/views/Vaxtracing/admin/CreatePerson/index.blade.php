 @extends('Vaxtracing.layout.admin.app')

@section('title', 'User Management')

@section('content')


<!-- Content Header (Page header) -->
<div class="row mt-5 mt-lg-0 mt-xl-5 mt-xxl-0">
    <div class="col-lg-6 col-xl-12 col-xxl-6 h-100">
      <div class="card theme-wizard mb-5 mb-lg-0 mb-xl-5 mb-xxl-0 h-100">
        <div class="card-body py-4">
          <div class="tab-content">
            <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel" aria-labelledby="form-wizard-progress-tab1" id="form-wizard-progress-tab1">
              <form role="form" id="formAddUser" >
                @csrf
                <div class="row g-2">
                  <div class="col-4">
                    <div class="form-floating mb-3">
                      <input class="form-control" id="floatingInput1 first_name" type="text" name="first_name"/>
                      <label for="floatingInput1">First Name</label>
                      <span class="text-danger errorMessage fs--2" id="error_first_name"></span>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-floating mb-3">
                      <input class="form-control" id="floatingInput2 middle_name" type="text" name="middle_name"/>
                      <label for="floatingInput2">Middle Name</label>
                      <span class="text-danger errorMessage fs--2" id="error_middle_name"></span>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-floating mb-3">
                      <input class="form-control" id="floatingInput" type="text" name="last_name"/>
                      <label for="floatingInput">Last Name</label>
                      <span class="text-danger errorMessage fs--2" id="error_last_name"></span>
                    </div>
                  </div>
                  
                  <div class="col-2">
                    <div class="form-floating">
                      <select class="form-select" id="floatingSelect" name="suffix" aria-label="Floating label select example">
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
                    <input class="form-control" id="floatingInput" type="email" name="email" placeholder="name@example.com" pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" required="required" data-wizard-validate-email="true" />
                    <label for="floatingInput">Email</label>
                    <span class="text-danger errorMessage fs--2" id="error_email"></span>
                  </div>
                </div>
                <div class="row g-2">
                  <div class="col-6">
                    <div class="mb-3">
                      <div class="form-floating">
                        <select class="form-select" id="floatingSelect" name="sex" aria-label="Floating label select example">
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
                        <input class="form-control datetimepicker" id="floatingDate" name="birth_date" type="date" placeholder="dd/mm/yyyy" data-options='{"dateFormat":"d/m/y","disableMobile":true}' id="form-wizard-progress-wizard-datepicker" />
                        <span class="text-danger errorMessage fs--2" id="error_birth_date"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-floating mb-3">
                    <input class="form-control" id="floatingInput" type="text" name="contact_number" placeholder="XXXX-XXX-XXXX"  />
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
                      <select class="form-select province" id="floatingSelect" name="province" aria-label="Floating label select example">
                        
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
                      <select class="form-select city" id="floatingSelect" name="city" aria-label="Floating label select example">
                        
                      </select>
                      <label for="floatingSelect">City</label>
                      <span class="text-danger errorMessage fs--2" id="error_city"></span>
                    </div>
                  </div>
                  <br>
                  <div class="col-6">
                    <div class="form-floating">
                      <select class="form-select barangay" id="floatingSelect" name="barangay" aria-label="Floating label select example">
                        
                      </select>
                      <label for="floatingSelect">Barangay</label>
                      <span class="text-danger errorMessage fs--2" id="error_barangay"></span>
                    </div>
                  </div>
                  <br>
                  <br>
                  <div class="col-12">
                    <div class="form-floating">
                      <textarea class="form-control" id="floatingTextarea2" name="home_address" placeholder="(e.g., street, block, lot, unit)" style="height: 100px"></textarea>
                      <label for="floatingTextarea2">Home Address (e.g., street, block, lot, unit)</label>
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
                <button class="btn btn-primary px-5 px-sm-6" id="create_user" type="submit">Submit<span class="fas fa-chevron-right ms-2"> </span></button>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    @section('scripts')
      <script type="text/javascript">

        var getAddressUrl = '{{ route("get_address") }}';
        $(function () {
        

          $('#create_user').click(function (e) {
            e.preventDefault();

            var form = document.getElementById("formAddUser");
            var formData = new FormData(form);

            $.ajax({
                url: "/create/people",
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


