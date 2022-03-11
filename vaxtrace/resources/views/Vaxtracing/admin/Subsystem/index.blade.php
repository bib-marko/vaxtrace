

@extends('Vaxtracing.layout.admin.app')

@section('title', 'Subsystem')

@section('content')


<div class="block">
    <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" href="#btabs-animated-slideleft-master-list">Subsystem List</a>
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
    <div class="row text-center">
        <div class="col-md-3">
        <div class="block">
            <div class="block-content">
            <form class="row align-items-center g-3">
                <div class="col-md-auto position-relative">
                <a class="btn btn-hero btn-alt-primary mr-5 mb-5 btn-block" type="button" href="{{ route('subsystem.create') }}"><i class="fa fa-plus mr-5"></i>Add Subsystem</a> 
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
    <div class="table-responsive scrollbar p-3">
        <table class="table table-striped table-center js-dataTable-full-pagination" id="subsystem_dt" width="100%">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
</div>
<!-- END Table Sections -->
@section('scripts')
<script type="text/javascript">

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //MASTER LIST
    var table = $('#subsystem_dt').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('subsystem.index') }}",
        columns: [
            //TITLE
            {data: 'title'},
            //ACTION
            {data: 'action'},
        ]  
    });
    $('#search_btn').on('click', function(){
            table.search($('#search_bar').val().toUpperCase()).draw();
        })
    $(".dataTables_filter").hide(); 
});
function delete_subsystem(id){
    Swal.fire({
        title: 'Do you want to delete this subsystem?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "{{ route('delete_subsystem') }}"+'/'+id,
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
                        text: "The subsystem has been deleted",
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