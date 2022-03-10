@extends('Vaxtracing.layout.admin.app')

@section('title', 'Create Subsystem')

@section('content')


<div class="block">
    <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" href="#btabs-animated-slideleft-master-list">Create Subsystem</a>
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
                      <form role="form" id="formUpdateSub" novalidate>
                        <div class="col-lg-12">
                            <div class="row g-2">
                                <div class="col-12">
                                    <br>
                                    <div class="form-material form-material-success floating">
                                        <input class="js-maxlength form-control" id="example-material-maxlength7 home_address" type="text" name="subsystem_name" value="{{ $subsystem->title }}" rows="3" maxlength="100" data-always-show="true" required/>
                                        <label for="example-material-maxlength7" style="font-size: 13px;">Subsystem Name</label>
                                        <span class="text-danger errorMessage" id="error_home_address"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </form>
                    </div>

                    <div class="row text-center mt-4">
                        <div class="col-md-2 justify-content-center ml-auto">
                            <div class="block mr-15 ml-15">
                                <button class="btn btn-square btn-alt-success min-width-120 " id="update_subsystem">Submit <span class="si si-arrow-right ms-2"> </span></button>
                            </div>
                        </div>
                    </div>


                    </form>
                
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
            let validatorUpdateSub = $('#formUpdateSub').jbvalidator({
                    errorMessage: true,
                    successClass: false,
                });
            
            var data = {!! json_encode($subsystem) !!};

            $('#update_subsystem').click(function (e) {
                e.preventDefault();

                var form = document.getElementById("formUpdateSub");
                var formData = new FormData(form);
                if(validatorUpdateSub.checkAll() == 0){
                    $.ajax({
                        url: "{{ route('save_update_subsystem') }}/"+data.id,
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
                                window.location.href = "{{ route('view_subsystem') }}";
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
            

            $(".dataTables_filter").hide(); 
        });
    </script>
@endsection
@endsection