@extends('Vaxtracing.layout.admin.app')

@section('title', 'Activity Logs')
  
@section('content')

        <!-- filter section -->
        
            <div class="col-12">
                <div class="form-group row">
                    <div class="col-10">
                        <div class="form-material form-material-success floating">
                            <input class="form-control" id="floatingDate" name="birth_date" type="date" placeholder="dd/mm/yyyy" data-options='{"dateFormat":"d/m/y","disableMobile":true}' id="form-wizard-progress-wizard-datepicker" min="1900-10-20" max="2030-10-20" required/>
                            <span class="text-danger errorMessage" id="error_birth_date"></span>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-material form-material-success floating ">
                            <button type="button" class="btn btn-alt-success mr-5 mb-5 btn-block">Filter by date</button>
                        </div>
                        
                    </div>
                  </div>
                {{-- <div class="form-material form-material-success floating">
                    <label for="floatingDate" style="margin-top: -1.5em; font-size: 13px;" class="fs--2">Birth Date</label>
                    <input class="form-control" id="floatingDate" name="birth_date" type="date" placeholder="dd/mm/yyyy" data-options='{"dateFormat":"d/m/y","disableMobile":true}' id="form-wizard-progress-wizard-datepicker" min="1900-10-20" max="2030-10-20" required/>
                    <span class="text-danger errorMessage fs--2" id="error_birth_date"></span>
                    <button type="button" class="btn btn-primary min-width-125 mb-10" disabled>Primary</button>
                </div> --}}
            </div>
       
        <!-- END filter section -->


 <!-- table for activity log -->
 <div class="block">
    <div class="block-header block-header-default">
      <h3 class="block-title"><i class="fa fa-history"></i> ACTIVITY LOGS</h3>
      <div class="block-options">
        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
      </div>
    </div>
    <div class="block-content block-content-full">
        <div class="table-responsive scrollbar">
            <table class="table table-striped table-center js-dataTable-full-pagination" id="people_deactivated_dt" width="100%">
                <thead>
                <tr>
                    <th scope="col">FULLNAME</th>
                    <th scope="col">ACTIVITY</th>
                    <th scope="col">DATE & TIME</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
 </div>
  <!-- end table for activity log -->

@endsection