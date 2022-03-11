@extends('Vaxtracing.layout.admin.app')

@section('title', 'Activity Logs')
  
@section('content')


     <!-- table for activity log -->
    <div class="block">
        <div class="block-header block-header-default">
        <h3 class="block-title"><i class="si si-user-unfollow"></i> VERIFY VACCINEES</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
        </div>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive scrollbar">
                <table class="table table-striped table-center js-dataTable-full-pagination" id="vaccinees_dt" width="100%">
                    <thead>
                    <tr>
                        <th scope="col">UNIQ_ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Suffix</th>
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
            // async function fetchText() {
            //     const url = 'https://api.apify.com/v2/key-value-stores/lFItbkoNDXKeSWBBA/records/LATEST?disableRedirect=true&fbclid=IwAR3xDqSgPDj8CsokK2OwMtTMzp7_NYLMl4902L9wcVrdsWADhqor7tlark8'
        
            //     let response = await fetch(url);
            
            //     let dataJson = await response.text();
            //     let data = JSON.parse(dataJson);
                
            //     return data;
            // }
            //MASTER LIST
            table = $('#vaccinees_dt').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('get_vaccinees') }}",
                columns: [
                    //UNIQ_ID
                    {data: 'uniq_id'},
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
                    {data: 'action'},
                ]  
            });
            function formatName(data){
                if(data == null || data == ""){
                    return "-";
                }
                else{
                    return data;
                }
            }
            
        });
        function verifyVaccinee(id){
            console.log( table.row(id).data() );
            //console.log( table.search( 1 ).data() );
            
        }
    </script>
    @endsection
@endsection