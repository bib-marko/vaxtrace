@extends('Vaxtracing.layout.admin.app')

@section('title', 'Activity Logs')
  
@section('content')


     <!-- table for activity log -->
    <div class="block">
        <div class="block-header block-header-default">
        <h3 class="block-title"><i class="si si-user-unfollow"></i> NON-VERIFIED VACCINEES</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
        </div>
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
                        <th scope="col">CODE</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Birth Date</th>
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
            var vaccinee_data = "{{ route('get_vaccinees') }}";
            console.log(vaccinee_data);
            table = $('#vaccinees_dt').DataTable({
                processing: true,
                serverSide: true,
                ajax: vaccinee_data,
                columns: [
                    //UNIQ_ID
                    {
                        data: 'qrcode'
                    },
                    //FULLNAME
                    {
                        data: 'vaxcert_pre_registration',
                            render(data) {
                                return generateFullname(data);
                            },
                    },
                    //DATE OF BIRTH
                    { data: 'vaxcert_pre_registration.date_of_birth' },
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
            $('#vaccinees_dt tbody').on('click', '[id*=btnVerify]', function (e) {
              
              Swal.fire({
                  title: 'Are you sure you want to verify this vaccinee?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Yes',
              }).then((result) => {
                  /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        e.preventDefault();

                        var data = table.row($(this).parents('tr')[0]).data();
                        console.log(data['qrcode']);
                        var formData = new FormData();
                        formData.append("vaccinee_code",data['qrcode'] );
                        formData.append("first_name",data['vaxcert_pre_registration']['first_name'] );
                        formData.append("middle_name",data['vaxcert_pre_registration']['middle_name'] );
                        formData.append("last_name",data['vaxcert_pre_registration']['last_name'] );
                        formData.append("suffix",data['vaxcert_pre_registration']['suffix'] );
                        formData.append("birth_date",data['vaxcert_pre_registration']['date_of_birth'] );
                        
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
                                    window.location.href = "{{ route('view_vaccinees_ListForNonVerified') }}";
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
            $('#search_btn').on('click', function(){
                table.search($('#search_bar').val().toUpperCase()).draw();
            })
            $(".dataTables_filter").hide(); 
            
        });
        
    </script>
    @endsection
@endsection