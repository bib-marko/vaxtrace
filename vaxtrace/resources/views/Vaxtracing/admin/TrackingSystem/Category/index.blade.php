@extends('Vaxtracing.layout.admin.app')

@section('title', 'Category')
  
@section('content')


     <!-- table for activity log -->
    <div class="block">
        <div class="block-header block-header-default">
        <h3 class="block-title"><i class="si si-user-following"></i> Category</h3>
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
                      
                        <a class="btn btn-hero btn-alt-primary mr-5 mb-5 btn-block" type="button" data-toggle="modal" data-target="#modal-new-record-category"><i class="fa fa-plus mr-5"></i>New Record</a> 
                    
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
                <table class="table table-striped table-center js-dataTable-full-pagination" id="category_dt" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Category Name</th>
                            <th scope="col">Category Description</th>
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
       table = $('#category_dt').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('category.index') }}",
          columns: [
              //TITLE
              {data: 'cat_name'},
              //ACTION
              {data: 'cat_description'},

              {data: 'status',
                render(data){
                    return generateBadge(data);
                },
              },

              {data: 'action'},
          ]  
      });
      $('#search_btn').on('click', function(){
              table.search($('#search_bar').val().toUpperCase()).draw();
      })

      let validatorCreateCat = $('#formCreateCat').jbvalidator({
                    errorMessage: true,
                    successClass: false,
                });

      $('#btnNewCategory').on('click', function (e){
        e.preventDefault();

        var form = document.getElementById("formCreateCat");
        var formData = new FormData(form);
        if(validatorCreateCat.checkAll() == 0){
            $.ajax({
                url: "{{ route('category.store') }}",
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
                        backdrop: `
                        rgba(0,0,123,0.4)
                        left top
                        no-repeat
                        `,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            table.draw();
                            $('#modal-new-record-category').hide();
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

      $('#btnUpdateCategory').on('click', function (e){
        let validatorUpdateCat = $('#formUpdateCat').jbvalidator({
                    errorMessage: true,
                    successClass: false,
                });

        e.preventDefault();

        var form = document.getElementById("formUpdateCat");
        var formData = new FormData(form);
        var id = $('#cat_id').val();
        if(validatorUpdateCat.checkAll() == 0){
            $.ajax({
                url: "{{ route('save_update_category') }}/"+id,
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
                        backdrop: `
                        rgba(0,0,123,0.4)
                        left top
                        no-repeat
                        `,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            table.draw();
                            $('#modal-update-record-category').hide();
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

    function update_category(id){
        $.get("/show/category" +'/' + id, function (data) {
            $('#cat_id').val(data.id);
            $('#cat_name').val(data.cat_name);
            $('#cat_desc').val(data.cat_description);
        })

    $('#modal-update-record-category').modal({backdrop:'static', keyboard:false});
    $("#modal-update-record-category").modal("show");
  }
  function delete_category(id){
      Swal.fire({
        title: 'Do you want to delete this category?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        backdrop: `
        rgba(0,0,123,0.4)
        left top
        no-repeat
        `,
      }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
              $.ajax({
                  type: "POST",
                  url: "{{ route('delete_category') }}"+'/'+id,
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
                          text: "The category has been deleted",
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