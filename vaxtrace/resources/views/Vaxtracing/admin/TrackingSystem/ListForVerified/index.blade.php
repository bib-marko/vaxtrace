@extends('Vaxtracing.layout.admin.app')

@section('title', 'Activity Logs')
  
@section('content')


     <!-- table for activity log -->
    <div class="block">
        <div class="block-header block-header-default">
        <h3 class="block-title"><i class="si si-user-following"></i> VERIFIED VACCINEES</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
        </div>
        </div>
        <div class="row text-center">
            <div class="col-md-3">
              <div class="block">
                <div class="block-content">
                  <form class="row align-items-center g-3">
                    <div class="col-md-auto position-relative">
                      
                        <a class="btn btn-hero btn-alt-primary mr-5 mb-5 btn-block" type="button" data-toggle="modal" data-target="#modal-new-record-vaccinee"><i class="fa fa-plus mr-5"></i>New Record</a> 
                    
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 justify-content-center ml-auto">
              <div class="block mr-15 ml-15">
                <div class="form-material floating input-group form-material-primary">
                  <input type="text" class="form-control" id="search_bar" name="material-color-success2">
                  <label for="material-color-success2">Search here...</label>
                  <div class="input-group-append">
                    <button type="button" class="view" id="search_btn" style="background: none; border:none">
                      <i class="si si-magnifier"></i>     
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="block-content block-content-full">
            <div class="table-responsive scrollbar">
                <table class="table table-striped table-center js-dataTable-full-pagination" id="vaccinees_dt" width="100%">
                    <thead>
                    <tr>
                        <th scope="col">Vaccinee Code</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Suffix</th>
                        <th scope="col">Birth Date</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
<!-- end table for activity log -->
@section('scripts')
<script type="text/javascript">   
    var table;
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //MASTER LIST
        table = $('#vaccinees_dt').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('vaccinee.index') }}",
            columns: [
                //UNIQ_ID
                {data: 'vaccinee_code'},
                //FULLNAME
                {data: 'first_name'},
                //ACTIVITY
                {
                    data: 'middle_name',
                        render(data) {
                        return formatName(data);
                    },
                },
                //DATE & TIME
                {data: 'last_name'},
                //SUFFIX
                {
                    data: 'suffix',
                        render(data) {
                        return formatName(data);
                    },
                },
                {data: 'birth_date'},
                {data: 'action'},
            ]  
        });

        $('#btnAddNewVaccinee').click(function (e) {
            e.preventDefault();
            let validatorAddVaccinee = $('#formAddVaccinee').jbvalidator({
                    errorMessage: true,
                    successClass: false,
                });
            var form = document.getElementById("formAddVaccinee");
            var formData = new FormData(form);
            if(validatorAddVaccinee.checkAll() == 0){
                $.ajax({
                    url: "{{ route('vaccinee.store') }}",
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
                            window.location.href = "{{ route('view_vaccinees_ListForVerified') }}";
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

        $('#btnUpdateVaccinee').click(function (e) {
            e.preventDefault();
            let validatorUpdateVaccinee = $('#formUpdateVaccinee').jbvalidator({
                    errorMessage: true,
                    successClass: false,
                });
            var id = $('#vaccinee_id').val();
            var form = document.getElementById("formUpdateVaccinee");
            var formData = new FormData(form);
            if(validatorUpdateVaccinee.checkAll() == 0){
            $.ajax({
                url: '{{ route("save_update_vaccinee") }}/' + id,
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
                        window.location.href = "{{ route('view_vaccinees_ListForVerified') }}";
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

        function formatName(data){
            if(data == null || data == ""){
                return "-";
            }
            else{
                return data;
            }
        }  
        $(".dataTables_filter").hide(); 
    });

    function update_vaccinee(id){
      $.get("/show/vaccinee" +'/' + id, function (data) {
              $('#vaccinee_id').val(data.id);
              $('#vaccinee_code').val(data.vaccinee_code);
              $('#first_name').val(data.first_name);
              $('#middle_name').val(data.middle_name);
              $('#last_name').val(data.last_name);
              $('#suffix').val(data.suffix).change();
              $('#birth_date').val(data.birth_date);
          })

      $("#modal-update-record-vaccinee").modal("show");
    }
    
    function delete_vaccinee(id){
          Swal.fire({
              title: 'Do you want to delete this vaccinee?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes',
          }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                  $.ajax({
                      type: "POST",
                      url: "{{ route('delete_vaccinee') }}"+'/'+id,
                      processData: false,
                      contentType: false,
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
                              text: "The vaccinee has been deleted",
                              confirmButtonText: 'Ok',
                          }).then((result) => {
                              /* Read more about isConfirmed, isDenied below */
                              if (result.isConfirmed) {
                                  location.reload();
                              }
                          })
                      },
                      error: function (response) {
                          hideLoader();
                      }
                  }); 
              } else{
              
              }
          })
      }
    
</script>
@endsection
@endsection