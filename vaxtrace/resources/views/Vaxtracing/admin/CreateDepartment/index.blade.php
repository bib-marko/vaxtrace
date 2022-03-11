@extends('Vaxtracing.layout.admin.app')

@section('title', 'User Department')

@section('style')


@endsection

@section('content')


<div class="block">
    <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" href="#btabs-animated-slideleft-master-list">Create Role/Department</a>
      </li>
    
      <li class="nav-item ml-auto">
        <div class="block-options mr-15 mt-10">
          <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
          <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
            <i class="si si-refresh"></i>
          </button>
        </div>
      </li>
    </ul>  
    <div class="block-content tab-content overflow-hidden">
      <div class="tab-pane fade fade-left show active" id="btabs-animated-slideleft-master-list" role="tabpanel">
               <!-- Dynamic Table Full -->
               <div class="block">
                    <div class="block-content">
                        <form role="form" id="formCreateRole" novalidate>
                            <div class="col-lg-12">
                                <div class="row g-2">
                                    <div class="col-12">
                                        <br>
                                        <div class="form-material form-material-success floating">
                                            <input class="js-maxlength form-control" id="example-material-maxlength7 home_address" type="text" name="title"   rows="3" maxlength="100" data-always-show="true" required/>
                                            <label for="example-material-maxlength7" style="font-size: 13px;">Role/Department Name</label>
                                            <span class="text-danger errorMessage" id="error_home_address"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="row g-2">
                                    <div class="col-12">
                                        <br>
                                        <div class="form-material form-material-success floating">
                                            <input class="js-maxlength form-control" id="example-material-maxlength7 home_address" type="text" name="short_code"  rows="3" maxlength="100" data-always-show="true" required/>
                                                <label for="example-material-maxlength7" style="font-size: 13px;">Short Code</label>
                                            <span class="text-danger errorMessage" id="error_home_address"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            @php
                                $counter=0;
                            @endphp
                            @foreach ($subsystems as $subsystem)
                            <br>
                                <div class="col">
                                    <div class="form-material form-material-success floating">
                                        <select class="js-select2 form-control" id="example-select2-multiple{{ $counter++ }}" name="permissions[]" style="width: 100%;" data-placeholder="Choose many.." multiple>
                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            @foreach ($permissions as $permission)
                                                @if($permission->sub_systems_id == $subsystem->id)
                                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <label for="material-color-select2" style="font-size: 13px;">{{ $subsystem->title }}</label>
                                        <span class="text-danger errorMessage fs--2" id="error_region"></span>
                                        
                                    </div>
                                </div>


                                
                            @endforeach
                        </form>
                    </div>

                    <div class="row text-center mt-4">
                        <div class="col-md-2 justify-content-center ml-auto">
                            <div class="block mr-15 ml-15">
                                <button class="btn btn-square btn-alt-success min-width-120 " id="create_role">Submit <span class="si si-arrow-right ms-2"> </span></button>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- END User Profile -->
    </div>
    </div>
<!-- END Block Tabs Animated Slide Left -->
@section('scripts')
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //MASTER LIST
            var table = $('#role_dt').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('role.index') }}",
                columns: [
                    //TITLE
                    {data: 'title'},
                    //SHORT_CODE
                    {data: 'short_code'},
                    //ACTION
                    {data: 'action'},
                ]  
            });

            let validatorCreateRole = $('#formCreateRole').jbvalidator({
                    errorMessage: true,
                    successClass: false,
                });

            $('#create_role').click(function (e) {
                e.preventDefault();

                var form = document.getElementById("formCreateRole");
                var formData = new FormData(form);
                if(validatorCreateRole.checkAll() == 0){
                    Swal.fire({
                        title: 'Please input your password to submit page',
                        html: `<input type="password" id="password" class="swal2-input" placeholder="Password">`,
                        confirmButtonText: 'Submit',
                        showCloseButton: true,
                        showCancelButton: true,
                        preConfirm: () => {
                            const password = Swal.getPopup().querySelector('#password').value
                            if (!password) {
                                Swal.showValidationMessage(`password is incorrect`)
                            }
                            return { password: password }
                        }
                    }).then((result) => {
                        var password = result.value.password;
                        
                        formData.append( 'password', password );
                        $.ajax({
                            url: "{{ route('role.store') }}",
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
                                    text: "A new record has been created",
                                    confirmButtonText: 'Ok',
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                    window.location.href = "{{ route('view_department') }}";
                                    }
                                })
                            },
                            error: function(response){
                                console.log(response.responseJSON.fail);
                                Swal.fire({
                                    title: 'Error!',
                                    icon: 'warning',
                                    text: response.responseJSON.fail,
                                    confirmButtonText: 'Ok',
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        window.location.href = "";
                                    }
                                })
                            }
                        });

                    })
                }
            });
            

            $(".dataTables_filter").hide(); 


        });
    </script>
@endsection
@endsection