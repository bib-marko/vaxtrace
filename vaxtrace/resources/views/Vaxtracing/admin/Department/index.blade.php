@extends('Vaxtracing.layout.admin.app')

@section('title', 'User Department')

@section('style')

<style>
    .select2-selection__choice{
        color: red !important; 
    }

</style>

@endsection

@section('content')


<div class="block">
    <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" href="#btabs-animated-slideleft-master-list">List of Role/Department</a>
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
                <div class="row text-center">
                    <div class="col-md-3 mt-3">
                        <div class="col-md-auto position-relative">
                            <a class="btn btn-hero btn-alt-primary mr-5 mb-5 btn-block" type="button" href="{{ route('role.create') }}"><i class="fa fa-plus mr-5"></i>Create Role/Dept</a> 
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
                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <div class="table-responsive scrollbar">
                        <table class="table table-striped table-center js-dataTable-full-pagination" id="role_dt" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">Role/Department Title</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        <!-- END Dynamic Table Full -->
        </div>
    </div>
<!-- END Block Tabs Animated Slide Left -->
 <!-- end table for activity log -->
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
        $('#search_btn').on('click', function(){
            table.search($('#search_bar').val().toUpperCase()).draw();
        })
        $(".dataTables_filter").hide();
    });
    

    // View Account Details
    function show_role(id) {
        $.get("/show/role" +'/' + id, function (data) {
            $('#role_title').text(data.title);
            $('#role_code').text(data.short_code);
            $('#role_created_at').text(formatDate(data.created_at, "full"));
        });

        $("#view_role").modal("show");
    }

    function delete_role(id){
        Swal.fire({
            title: 'Do you want to delete this role?',
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
                    url: "{{ route('delete_department') }}"+'/'+id,
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
                            text: "The role has been deleted",
                            confirmButtonText: 'Ok',
                            backdrop: `
                            rgba(0,0,123,0.4)
                            left top
                            no-repeat
                            `,
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

