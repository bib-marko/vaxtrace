

@extends('Vaxtracing.layout.admin.app')

@section('title', 'User Permission')
  
@section('content')


<div class="block">
    <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="#btabs-animated-slideleft-master-list">Permission List</a>
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
                  <a class="btn btn-hero btn-alt-primary mr-5 mb-5 btn-block" type="button" href="{{ route('get_create_permission') }}"><i class="fa fa-plus mr-5"></i>Create Permission</a> 
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
        <table class="table table-striped table-center js-dataTable-full-pagination" id="people_dt" width="100%">
            <thead>
                <tr>
                    <th scope="col">System Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        </table>
    </div>
  </div>
</div>
<!-- END Table Sections -->

@endsection