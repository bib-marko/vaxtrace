@extends('Vaxtracing.layout.admin.app')

@section('title', 'Activity Logs')
  
@section('content')


<div class="block">
    <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" href="#btabs-animated-slideleft-verified-vaccinee">VERIFIED VACCINEE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#btabs-animated-slideleft-non-verified-vaccinee">NON VERIFIED VACCINEE</a>
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
        {{-- VERIFIEED VACCINEE TABLE --}}
      <div class="tab-pane fade fade-left show active" id="btabs-animated-slideleft-verified-vaccinee" role="tabpanel">
        <div class="block">
            <div class="block-header block-header-default bg-success-light ">
                <h3 class="block-title text-secondary">
                    <button type="button" class="btn btn-sm btn-circle btn-outline-success mr-5 mb-5">
                    <i class="si si-user-follow"></i>
                  </button> VERIFIED VACCINEES
                </h3>
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
                    <input type="text" class="form-control" id="search_bar_verified" name="material-color-success2">
                    <label for="material-color-success2">Search here...</label>
                    <div class="input-group-append">
                        <button type="button" class="view" id="search_btn_verified" style="background: none; border:none">
                        <i class="si si-magnifier"></i>     
                        </button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="block-content block-content-full">
                <div class="table-responsive scrollbar">
                    <table class="table table-striped table-center js-dataTable-full-pagination" id="verified_dt" width="100%">
                        <thead>
                        <tr>
                            <th scope="col">Vaccinee Code</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Birth Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- END VERIFIEED VACCINEE TABLE --}}

    {{-- END VERIFIEED VACCINEE TABLE --}}
    <div class="tab-pane fade fade-left" id="btabs-animated-slideleft-non-verified-vaccinee" role="tabpanel">
        <div class="block">
            <div class="block-header block-header-default bg-success-light">
            <h3 class="block-title text-secondary">
                <button type="button" class="btn btn-sm btn-circle btn-outline-danger mr-5 mb-5">
                <i class="si si-user-unfollow"></i>
              </button> NON-VERIFIED VACCINEES
            </h3>
            </div>
            <div class="row text-center">
                <div class="col-md-3">
                <div class="block">
                    <div class="block-content">
                    
                    </div>
                </div>
                </div>
                <div class="col-md-6 justify-content-center ml-auto">
                <div class="block mr-15 ml-15">
                    <div class="form-material floating input-group form-material-primary">
                    <input type="text" class="form-control" id="search_bar_non_verified" name="material-color-success2">
                    <label for="material-color-success2">Search here...</label>
                    <div class="input-group-append">
                        <button type="button" class="view" id="search_btn_non_verified" style="background: none; border:none">
                        <i class="si si-magnifier"></i>     
                        </button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="block-content block-content-full">
                <div class="table-responsive scrollbar">
                    <table class="table table-striped table-center js-dataTable-full-pagination" id="non_verified_dt" width="100%">
                        <thead>
                        <tr>
                            <th scope="col">Vaccinee Code</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Birth Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </dIv>
    
    </div>
</div>


<!-- end table for activity log -->
@section('scripts')
<script type="text/javascript">   
    var tableForVerified;
    var tableForNonVerified;
    var tableForSummary = "";
    var verifiedQr = [];
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // async function fetchText() {
        //     const url = 'http://cvimsmicro.com/api/vaxcert-qualifiedpatients';
    
        //     let response = await fetch(url);
        
        //     let dataJson = await response.text();
        //     let data = JSON.parse(dataJson);
            
        //     return data;
        // }

        // console.log(fetchText());
        //MASTER LIST
        tableForVerified = $('#verified_dt').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: "{{ route('vaccinee.index') }}",
            columns: [
                //UNIQ_ID
                {
                    data: 'vaccinee_code',
                        render(data) {
                            verifiedQr.push(data);
                        return data;
                    },
            
                },
                //FULLNAME
                {data: 'full_name'},
                {data: 'birth_date'},
                {data: 'action'},
            ]  

        });
        var currentQr;
        var vaccinee_data_first = "http://cvimsmicro.com/api/vaxcert-qualifiedpatients";
        var vaccinee_data = vaccinee_data_first;
    
        //MASTER LIST    
        tableForNonVerified = $('#non_verified_dt').DataTable({
            processing: true,
            ajax: function(data, callback, settings) {
                    $.post(vaccinee_data, {
                            items_per_page: $('#non_verified_dt_length > label >select').val(),
                            search_key: $('#search_bar_non_verified').val().toUpperCase()
                        }, function(result) {
                            callback({
                                recordsTotal: result.meta.total,
                                recordsFiltered: result.meta.total,
                                data: result.data
                            });
                            $('#non_verified_dt_info').html("Showing "+result.meta.from+" to "+result.meta.to+" of "+result.meta.total+" entries");
                            $('#non_verified_dt_paginate').html(`<ul class="pagination">
                                                                    <li class="paginate_button page-item previous" id="non_verified_dt_previous">
                                                                        <a aria-controls="non_verified_dt" class="page-link">Previous</a>
                                                                    </li>
                                                                    <li class="paginate_button page-item active">
                                                                        <a aria-controls="non_verified_dt" class="btn page-link">`+result.meta.current_page+`</a>
                                                                    </li>
                                                                    <li class="paginate_button page-item next" id="non_verified_dt_next">
                                                                        <a aria-controls="non_verified_dt" class="btn page-link">Next</a>
                                                                    </li>
                                                                </ul>`);
                            $('#non_verified_dt_previous').click(function (e) {
                                if(result.links.prev != null){
                                    vaccinee_data = result.links.prev;
                                    tableForNonVerified.ajax.reload();
                                }
                            });
                            $('#non_verified_dt_next').click(function (e) {
                                if(result.links.next != null){
                                    vaccinee_data = result.links.next;
                                    tableForNonVerified.ajax.reload();
                                } 
                            });
                            $('#search_bar_non_verified').prop( "disabled", false );
                        });

            },
            columnDefs: [
                { "searchable": true, "targets": 1 }
            ],
            columns: [
                //UNIQ_ID
                {   data: 'home_address', 
                    render(data) {
                            currentQr = data;
                            return data;
                        },
                },
                //FULLNAME
                {
                    data: null,
                        render(data) {
                            return generateFullname(data);
                        },
                },
                //DATE OF BIRTH
                { data: 'date_of_birth' },
                {
                    data: null,
                        render(data) {
                           
                            if(verifiedQr.includes(currentQr)){
                                return "<a class='view btn btn-alt-primary btn-rounded mr-5 mb-5' disabled><i class='si si-check mr-5'></i>Verified</button></a>";
                            }
                            else{
                                return "<a class='view btn btn-alt-danger btn-rounded mr-5 mb-5' id='btnVerify'><i class='si si-check mr-5'></i>Verify</button></a>";
                            }
                        },
                },
            ],
              
        });

        
        $('#non_verified_dt tbody').on('click', '[id*=btnVerify]', function (e) {
            Swal.fire({
                title: 'Are you sure you want to verify this vaccinee?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    e.preventDefault();

                    var data = tableForNonVerified.row($(this).parents('tr')[0]).data();
                    console.log(data['qrcode']);
                    var formData = new FormData();
                    formData.append("vaccinee_code",data['home_address'] );
                    formData.append("first_name",data['first_name'] );
                    formData.append("middle_name",data['middle_name'] );
                    formData.append("last_name",data['last_name'] );
                    formData.append("suffix",data['suffix'] );
                    formData.append("birth_date",data['date_of_birth'] );
                    
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
                                    //tableForNonVerified.draw();
                                    location.reload();
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
            })
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
                                tableForVerified.draw();
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
                            tableForVerified.draw();
                            $('#modal-update-record-vaccinee').modal("hide");
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

        $('#saveTransaction').click(function (e) {
            e.preventDefault();
            let validatorSaveTransaction = $('#formAddTransaction').jbvalidator({
                    errorMessage: true,
                    successClass: false,
                });
            var id = $('#vaccinee_id').val();
            var form = document.getElementById("formAddTransaction");
            var formData = new FormData(form);
            if(validatorSaveTransaction.checkAll() == 0){
            $.ajax({
                url: '{{ route("save_vaccinee_transaction") }}/' + id,
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
                        text: "The transaction has been added",
                        confirmButtonText: 'Ok',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            $('#transaction_summary').addClass("active");
                            $('#new_transaction').removeClass("active");
                            $('#btabs_transaction_summary').addClass("active show");
                            $('#btabs_new_transaction').removeClass("active show");
                            
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

        $('#search_btn_verified').on('click', function(){
            tableForVerified.search($('#search_bar_verified').val().toUpperCase()).draw();
        })
        var ctr = 1;
        $('#non_verified_dt_length > label >select').on('change', function(){
            vaccinee_data = vaccinee_data_first;
            tableForNonVerified.ajax.reload();
        })
        $('#search_bar_non_verified').on('keypress', function(e){
            //e.preventDefault();
            if(e.which == 13){
                vaccinee_data = vaccinee_data_first;
                tableForNonVerified.ajax.reload();
                $(this).prop( "disabled", true );
            }
        }); 
    });
    
    function formatName(data){
            if(data == null || data == "" || data == 'NA'){
                return "-";
            }
            else{
                return data;
            }
        }  


    function show_monitor_vaccinee(id){
        if(tableForSummary != ""){
            tableForSummary.destroy();
        }
        $.get("/monitor/vaccinee" +'/' + id, function (data) {
            tableForSummary = $('#summary_dt').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: "/show/summary/"+id,
                columns: [
                    //UNIQ_ID
                    {data: 'cat_name'},
                    //FULLNAME
                    {data: 'sub_cat_name'},
                    {data: 'trans_details'},
                    {data: 'assisted_by'},
                    {data: 'created_at',render (data){
                        return formatDate(data, "date_time");
                    }},
                ]  
            });
            $('#vaccinee_id').val(id);
            $.each(data.categories, function(key, value) {
                $('#category_sel').append(`<option value="${value.id}">${value.cat_name}</option>`);
            });
            $.each(data.sub_categories, function(key, value) {
                $('#sub_category_sel').append(`<option value="${value.id}">${value.sub_cat_name}</option>`);
            });
            
        })
        $('#view_monitor_vaccinee').modal({backdrop:'static', keyboard:false});
        $('#view_monitor_vaccinee').modal("show");
    }


    function show_vaccinee(id){
        $.get("/show/vaccinee" +'/' + id, function (data) {
                $('#view_vaccinee_code').text(data.vaccinee_code);
                $('#view_first_name').text(data.first_name);
                $('#view_middle_name').text(data.middle_name);
                $('#view_last_name').text(data.last_name);
                $('#view_suffix').text(formatName(data.suffix)).change();
                $('#view_birth_date').text(data.birth_date);
            })
        $('#vaccinee_view').modal({backdrop:'static', keyboard:false});
        $('#vaccinee_view').modal("show");
        
    }

    function update_vaccinee(id){
        $.get("/show/vaccinee" +'/' + id, function (data) {
                $('#vaccinee_id').val(data.id);
                $('#vaccinee_code').val(data.vaccinee_code);
                $('#first_name').val(data.first_name);
                $('#middle_name').val(data.middle_name);
                $('#last_name').val(data.last_name);
                $('#suffix').val(formatNamedata.suffix).change();
                $('#birth_date').val(data.birth_date);
            })
        $('#modal-update-record-vaccinee').modal({backdrop:'static', keyboard:false});
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
                                tableForVerified.ajax.reload();
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