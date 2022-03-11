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
                      @if (session('LoggedUser')->hasPermission('USER_CREATE'))
                        <a class="btn btn-hero btn-alt-primary mr-5 mb-5 btn-block" type="button" data-toggle="modal" data-target="#modal-new-record-category"><i class="fa fa-plus mr-5"></i>New Record</a> 
                      @endif  
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
                <table class="table table-striped table-center js-dataTable-full-pagination" id="vaccinees_dt" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">CATEGORY NAME</th>
                            <th scope="col">CATEGORY DESCRIPTION</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

@endsection