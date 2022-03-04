@extends('Vaxtracing.layout.admin.app')

@section('title', 'User Management')
  
@section('content')

{{-- <a class='btn btn-alt-primary mr-5 mb-5' onclick='show_loading()'><i class='si si-eye mr-5'></i>Show Loading</button></a> --}}

<div class="block">
  <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" href="#btabs-animated-slideleft-master-list">Master List</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#btabs-animated-slideleft-deactivated-account">Inactive Account</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#btabs-animated-slideleft-restored-account">Recovered Account</a>
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
          <div class="col-md-3">
            <div class="block">
              <div class="block-content">
                <form class="row align-items-center g-3">
                  <div class="col-md-auto position-relative">
                    <a class="btn btn-hero btn-alt-primary mr-5 mb-5 btn-block" type="button" href="{{ route('get_create_user') }}"><i class="fa fa-plus mr-5"></i>Create User</a> 
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
          <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
          <div class="table-responsive scrollbar">
            <table class="table table-striped table-center js-dataTable-full-pagination" id="people_dt" width="100%">
              <thead>
                <tr>
                  <th scope="col">Fullname</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              
            </table>
          </div>
        </div>
      </div>
      <!-- END Dynamic Table Full -->
    </div>
    <div class="tab-pane fade fade-left" id="btabs-animated-slideleft-deactivated-account" role="tabpanel">
      <!-- Dynamic Table Full -->
      <div class="block">
        <div class="row text-center">
          <div class="col-md-3">
            
          </div>
          <div class="col-md-6 justify-content-center ml-auto">
            <div class="block mr-15 ml-15">
              <div class="form-material floating input-group form-material-primary">
                <input type="text" class="form-control" id="search_bar2" name="material-color-success2">
                <label for="material-color-success2">Search here...</label>
                <div class="input-group-append">
                  <button type="button" class="view" id="search_btn2" style="background: none; border:none">
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
            <table class="table table-striped table-center js-dataTable-full-pagination" id="people_deactivated_dt" width="100%">
              <thead>
                <tr>
                  <th scope="col">Fullname</th>
                  <th scope="col">Status</th>
                  <th scope="col">Reason for deactivating</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              
            </table>
          </div>
        </div>
      </div>
      <!-- END Dynamic Table Full -->
    </div>
    <div class="tab-pane fade fade-left" id="btabs-animated-slideleft-restored-account" role="tabpanel">
       <!-- Dynamic Table Full -->
      <div class="block">
        <div class="row text-center">
          <div class="col-md-3">
            
          </div>
          <div class="col-md-6 justify-content-center ml-auto">
            <div class="block mr-15 ml-15">
              <div class="form-material floating input-group form-material-primary">
                <input type="text" class="form-control" id="search_bar3" name="material-color-success2">
                <label for="material-color-success2">Search here...</label>
                <div class="input-group-append">
                  <button type="button" class="view" id="search_btn3  " style="background: none; border:none">
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
            <table class="table table-striped table-center js-dataTable-full-pagination" id="people_restored_dt" width="100%">
              <thead>
                <tr>
                  <th scope="col">Fullname</th>
                  <th scope="col">Reason for restoring</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              
            </table>
          </div>
        </div>
  </div>
</div>
<!-- END Block Tabs Animated Slide Left -->





  @section('scripts')
      <script type="text/javascript">

        var getAddressUrl = '{{ route("get_address") }}';
        var deletePeopleUrl = '{{ route("delete_people") }}';
        $(function () {
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });
          //MASTER LIST
          var table = $('#people_dt').DataTable({
              processing: true,
              serverSide: true,
              ajax: "/show/people",
              columns: [

                //FULLNAME
                { data: 'full_name', 
            
                },

                //ACCOUNT STATUS
                {
                    data: 'user_status',
                    render(data) {
                        return isApproved(data);
                    },
                },

                //ACTION
                {data: 'action', name: 'action', orderable: false, searchable: false},

                
              ]  
          });

          //DEACTIVATED LIST
          var table1 = $('#people_deactivated_dt').DataTable({
              processing: true,
              serverSide: true,
              ajax: "/show/deleted_people",
              columns: [

                //FULLNAME
                { data: 'full_name', 
            
                },

                //ACCOUNT STATUS
                {
                    data: 'user_status',
                    render(data) {
                      if(data != null){
                          return isApproved(data);
                      }
                    },
                },

                //REASON
                {
                  data: 'reason',
                    render(data) {
                          return `
                          <!-- reason Alert -->
                          <div class="alert alert-info d-flex align-items-center" role="alert">
                            <i class="fa fa-fw fa-info mr-10"></i>
                            <p class="mb-0">
                              `+data+`!
                            </p>
                          </div>
                          <!-- END reason Alert -->
                          `;
                    },
                  },

                //ACTION
                {data: 'action', name: 'action', orderable: false, searchable: false},
                
              ]  
          });


          var table2 = $('#people_restored_dt').DataTable({
              processing: true,
              serverSide: true,
              ajax: "/show/restored_people",
              columns: [

                //FULLNAME
                {data: 'full_name'},

               //REASON
               {
                  data: 'reason',
                    render(data) {
                          return `
                          <!-- reason Alert -->
                          <div class="alert alert-info d-flex align-items-center" role="alert">
                            <i class="fa fa-fw fa-info mr-10"></i>
                            <p class="mb-0">
                              `+data+`!
                            </p>
                          </div>
                          <!-- END reason Alert -->
                          `;
                    },
                  },

                //ACTION
                {data: 'action', name: 'action', orderable: false, searchable: false},
                
              ]  
          });

          $('#showUser').click(function (e) {
            console.log("123");
           
          });

          $('#search_btn').on('click', function(){
              table.search($('#search_bar').val()).draw();
            })
          $('#search_btn2').on('click', function(){
            table1.search($('#search_bar2').val()).draw();
          })
          $('#search_btn3').on('click', function(){
            table2.search($('#search_bar3').val()).draw();
          })

          $(".dataTables_filter").hide(); 

          let validatorDelete = $('#formAddUser1').jbvalidator({
                    errorMessage: true,
                    successClass: false,
                });
          let validatorRestore = $('#formRestoreUser').jbvalidator({
              errorMessage: true,
              successClass: false,
          });
        });

        
        // View Account Details
        function show_people(id) {

          $.get("/show/people" +'/' + id, function (data) {
              $('#user_id').text(data.id);
              $('#email').text(data.email);
              $('#created_at').text(formatDate(data.created_at, "full"));
              $('#birth_date').text(data.person.birth_date);
              $('#sex').text(data.person.sex);
              $('#home_address').text(data.person.home_address);
              $('#city').text(data.person.city);
              $('#province').text(data.person.province);
              $('#region').text(data.person.region);
              $('#contact_number').text(data.person.contact_number);
              $('#barangay').text(data.person.barangay);
              $('#status').html(isApproved(data.person.deleted_at));
              $('#full_name').text(generateFullname(data));
          })

          $("#m_user").modal("show");
        }
      
        function delete_people(id){
          Swal.fire({
              title: 'Do you want to deactivate this user?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes',
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                  Swal.fire({
                      title: 'Please indicate your reason',
                      icon: 'info',
                      html: ' <form role="form" id="formAddUser1" novalidate><input type="text" id="reason1" name="reason1" class="swal2-input fs--2" placeholder="reason"></form>',
                      inputPlaceholder: "Write something",
                      showCancelButton: true,
                      confirmButtonText: 'Submit',
                  }).then((result) => {
                    
                      var form = document.getElementById("formAddUser1");
                      var formData = new FormData(form);
                      
                      if (result.isConfirmed) {
                          $.ajax({
                              type: "POST",
                              data: formData,
                              url: deletePeopleUrl+'/'+id,
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
                                      text: "The user has been deactivated",
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
                                Swal.fire({
                                      title: 'Warning!',
                                      icon: 'warning',
                                      text: "The reason field is required",
                                      confirmButtonText: 'Ok',
                                  })
                              }
                          });
                      } else{
                      }
                  })
              } else{
              
              }
          })
        }
        function restore_people(id){
          Swal.fire({
              title: 'Do you want to recover this user?',
              icon: 'info',
              showCancelButton: true,
              confirmButtonText: 'Yes',
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                  Swal.fire({
                      title: 'Please indicate your reason',
                      icon: 'info',
                      html: ' <form role="form" id="formRestoreUser" novalidate><input type="text" id="restore_reason" name="restore_reason" class="swal2-input fs--2" placeholder="reason" required></form>',
                      inputPlaceholder: "Write something",
                      showCancelButton: true,
                      confirmButtonText: 'Submit',
                  }).then((result) => {
                      var form = document.getElementById("formRestoreUser");
                      var formData = new FormData(form);
                      
                      if (result.isConfirmed) {
                          $.ajax({
                              type: "POST",
                              data: formData,
                              url: '{{ route("restore_people") }}/'+id,
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
                                      text: "The user has been restored",
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
                                  Swal.fire({
                                        title: 'Warning!',
                                        icon: 'warning',
                                        text: "The reason field is required",
                                        confirmButtonText: 'Ok',
                                    })
                              }
                          });
                      } else{
                      }
                  })
              } else{
              
              }
          })
        }
        
      </script>
    @endsection
@endsection


