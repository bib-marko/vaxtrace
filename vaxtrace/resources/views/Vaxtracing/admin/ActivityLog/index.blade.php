@extends('Vaxtracing.layout.admin.app')

@section('title', 'Activity Logs')
  
@section('content')

        <!-- filter section -->
        
            <div class="col-12">
                <div class="form-group row">
                    <div class="col-8">
                        <div class="form-material form-material-success floating">
                            <input class="form-control" id="floatingDate" name="date_filter" type="date" placeholder="dd/mm/yyyy" data-options='{"dateFormat":"m-d-y,"disableMobile":true}' id="form-wizard-progress-wizard-datepicker" min="1900-10-20" max="2030-10-20" required/>
                            <span class="text-danger errorMessage" id="error_birth_date"></span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-material form-material-success floating ">
                            <button type="button" class="btn btn-alt-success mr-5 mb-5 btn-block" id="date_filter_btn">Filter by date</button>
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
            <table class="table table-striped table-center js-dataTable-full-pagination" id="activity_logs_dt" width="100%">
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
  @section('scripts')
        <script type="text/javascript">
           
            $(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //MASTER LIST
                var table = $('#activity_logs_dt').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('get_activity') }}",
                    columns: [

                    //FULLNAME
                    {data: 'full_name'},
                    //ACTIVITY
                    {data: 'activity'},
                    //DATE & TIME
                    {data: 'datetime'},

                    
                    ]  
                });
                var day, month, year,full_Date;
                $('#date_filter_btn').on('click', function(){
                    var date = new Date($('#floatingDate').val());
                    if(date != "Invalid Date"){
                        day = ''+date.getDate();
                        month = ''+(date.getMonth() + 1);
                        year = date.getFullYear();
                        if (month.length < 2) 
                            month = '0' + month;
                        if (day.length < 2) 
                            day = '0' + day;
                        full_Date = [year,month,day].join('-');
                        table.column(2).search(full_Date).draw(); 
                    }
                    else{
                        table.column(2).search("").draw(); 
                    }
                    
                   
                })
            });
      </script>
    @endsection
@endsection