@extends('Vaxtracing.layout.admin.app')

@section('title', 'Sub-Category')
  
@section('content')


     <!-- table for activity log -->
    <div class="block">
        <div class="block-header block-header-default">
        <h3 class="block-title"><i class="si si-user-following"></i> Sub-Category</h3>
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
                      
                        <a class="btn btn-hero btn-alt-primary mr-5 mb-5 btn-block" type="button" data-toggle="modal" data-target="#modal-new-record-sub-category"><i class="fa fa-plus mr-5"></i>New Record</a> 
                    
                     <!-- Slide Up Modal -->
                      {{-- <button type="button" class="btn btn-hero btn-alt-default mr-5 mb-5 btn-block" data-toggle="modal" data-target="#create"><i class="fa fa-plus mr-5"></i>Create User</button>
                      <!-- END Slide Up Modal --> --}}
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
                <table class="table table-striped table-center js-dataTable-full-pagination" id="sub_category_dt" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Sub_Category Name</th>
                            <th scope="col">Sub_Category Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

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
        table = $('#sub_category_dt').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('sub_category.index') }}",
            columns: [
                //TITLE
                {data: 'sub_cat_name'},
                //ACTION
                {data: 'sub_cat_description'},

                {data: 'status',
                    render(data) {
                        return generateBadge(data);
                    },

                },

                {data: 'action'},
            ]  
        });
        $('#search_btn').on('click', function(){
                table.search($('#search_bar').val().toUpperCase()).draw();
        })

        let validatorCreateSubCat = $('#formCreateSubCat').jbvalidator({
                    errorMessage: true,
                    successClass: false,
                });

        $('#btnCreateSubCat').on('click', function (e){
        e.preventDefault();

        var form = document.getElementById("formCreateSubCat");
        var formData = new FormData(form);
        if(validatorCreateSubCat.checkAll() == 0){
            $.ajax({
                url: "{{ route('sub_category.store') }}",
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
                            table.draw();
                            $('#modal-new-record-sub-category').hide();
                            form.reset();
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
      $('#btnUpdateSubCat').on('click', function (e){
        let validatorUpdateSubCat = $('#formUpdateSubCat').jbvalidator({
                    errorMessage: true,
                    successClass: false,
                });

        e.preventDefault();

        var form = document.getElementById("formUpdateSubCat");
        var formData = new FormData(form);
        var id = $('#sub_cat_id').val();
        if(validatorUpdateSubCat.checkAll() == 0){
            $.ajax({
                url: "{{ route('save_update_sub_category') }}/"+id,
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
                            table.draw();
                            $('#modal-update-record-sub-category').modal("hide");
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
      $(".dataTables_filter").hide(); 

  });

   

    function update_subcategory(id){
        $.get("/show/sub_category" +'/' + id, function (data) {
                $('#sub_cat_id').val(data.id);
                $('#sub_cat_name').val(data.sub_cat_name);
                $('#sub_cat_desc').val(data.sub_cat_description);
            })

        $('#modal-update-record-sub-category').modal({backdrop:'static', keyboard:false});
        $("#modal-update-record-sub-category").modal("show");
    }

    function delete_subcategory(id){
        Swal.fire({
            title: 'Do you want to delete this sub_category?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('delete_sub_category') }}"+'/'+id,
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
                            text: "The sub_category has been deleted",
                            confirmButtonText: 'Ok',
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                table.draw();
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