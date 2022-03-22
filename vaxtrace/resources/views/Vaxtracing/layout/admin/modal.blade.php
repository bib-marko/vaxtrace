{{-- @if (url()->current() == route('get_manage_user')) --}}

{{--Show Role Modal--}}

<style>
  .modal-body {
    max-height:600px; 
    overflow-y: auto;
}
</style>



   <!-- Slide Up Modal -->
   <div class="modal fade" id="view_monitor_vaccinee" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideup modal-xl" role="document">
      <div class="block-header bg-primary-dark">
        <h3 class="block-title text-white">Monitor Vaccinee</h3>
        <div class="block-options">
          <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
            <i class="si si-close  text-white"></i>
          </button>
        </div>
      </div>
      <div class="modal-content">
        <div class="block block-themed block-transparent mb-0">
          <div class="block-content modal-body p-0">
            <!-- Block Tabs Animated Slide Left -->
              <ul class="nav nav-tabs nav-tabs-block bg-gd-lake" data-toggle="tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="transaction_summary" href="#btabs_transaction_summary">Transaction Summary</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="new_transaction" href="#btabs_new_transaction"><i class="si si-plus"></i>  New Transaction</a>
                </li>
                {{-- <li class="nav-item ml-auto">
                  <a class="nav-link" href="#bta  bs-animated-slideleft-settings"><i class="si si-settings"></i></a>
                </li> --}}
              </ul>
              <div class="block-content tab-content overflow-hidden">
                <div class="tab-pane fade fade-left show active" id="btabs_transaction_summary" role="tabpanel">
                  <div class="block-content tab-content overflow-hidden">
  
                    {{-- VERIFIEED VACCINEE TABLE --}}
  
                      <div class="block">
                        <div class="col-md-12">
                          <a class="block block-link-shadow block-transparent border-left border-5x border-warning">
                            <div class="block-content block-content-full bg-white-op-90">
                              <div class="pt-20">
                                <h3 class="h4 font-w700 mb-10">Transaction Summary</h3>
                                <h4 class="text-muted font-size-default mb-0">
                                  <span class="mr-10">
                                    <i class="si si-info"></i> See the table below for a complete list of patient transactions.
                                  </span>
                                </h4>
                              </div>
                            </div>
                          </a>
                        </div>
    
                          <div class="block-content block-content-full">
                              <div class="table-responsive scrollbar">
                                  <table class="table table-striped table-center js-dataTable-full-pagination" id="summary_dt" width="100%">
                                      <thead>
                                        <tr>
                                          <th>CATEGORY</th>
                                          <th >SUB-CATEGORY</th>
                                          <th >TRANSACTION DETAILS</th>
                                          <th >ASSIST BY</th>
                                          <th >DATE OF TRANSACT</th>
                                        </tr>
                                      </thead>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>

                </div>
                <div class="tab-pane fade fade-left" id="btabs_new_transaction" role="tabpanel">
                  {{-- <h4 class="font-w400">Add New Transaction</h4> --}}
  
                  <div class="col-md-12">
                    <a class="block block-link-shadow block-transparent border-left border-5x border-warning">
                      <div class="block-content block-content-full bg-white-op-90">
                        <div class="pt-20">
                          <h3 class="h4 font-w700 mb-10">Add New Transaction</h3>
                          <h4 class="text-muted font-size-default mb-0">
                            <span class="mr-10">
                              <i class="si si-info"></i> You may create a transaction record in this section to keep track of the patient's progress.
                            </span>
                          </h4>
                        </div>
                      </div>
                    </a>
                  </div>
                  
                  <form role="form" id="formAddTransaction" novalidate>
                    <div class="col">
                      <div class="form-material">
                        <input class="form-control" id="vaccinee_id" type="text" name="vaccinee_id" hidden required/>
                        <input class="form-control" id="material-select2" type="text" name="assist_by" value="{{ session('LoggedUser')->id }}" hidden required/>
                        <select class="js-select2 form-control" id="category_sel" name="category" style="width: 100%;" data-placeholder="Choose one.." required>
                          <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                          
                        </select>
                        <label for="material-textarea-large2" style="color: #9CCC65;"><strong>CATEGORY</strong></label>
                      </div>
                    </div>
  
                    <div class="col">
                      <div class="form-material ">
                        <select class="js-select2 form-control" id="sub_category_sel" name="sub_category[]" style="width: 100%;" data-placeholder="Choose many.." multiple required>
                         
                        </select>
                        <label for="material-textarea-large2" style="color: #9CCC65;"><strong>SUB CATEGORY</strong></label>
                      </div>
                    </div>
                    
  
                    <div class="col">
                      <div class="row g-2">
                        <div class="col-12">
                          <div class="form-material form-material-success floating">
                            <textarea class="form-control" id="material-textarea-large2" name="t_details" rows="8" required></textarea>
                            <label for="material-textarea-large2">TRANSACTION DETAIL</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                      <br>
                      <div class="col-md-2 ml-auto">
                        <button type="button" class="btn btn-hero btn-alt-success" id="saveTransaction">
                          <i class="fa fa-check"></i> SUBMIT
                        </button>
                      </div>
  
                    <br>
                  </form>
                </div>
              
              </div>
            <!-- END Block Tabs Animated Slide Left -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Slide Up Modal -->


{{-- <!-- Slide Up Modal -->
<div class="modal" id="view_monitor_vaccinee" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-slideup modal-xl" role="document">
    <div class="modal-content">
      
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">Monitor Vaccinee</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-bs-dismiss="modal">
              <i class="si si-close"></i>
            </button>
          </div>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
          <i class="fa fa-times"></i> CLOSE
        </button>
      </div>

    </div>
  </div>
</div>
<!-- END Slide Up Modal --> --}}

{{-- 
          <!-- Alternative Tabs in Modal -->
          <div class="modal" id="view_monitor_vaccinee" tabindex="-1" role="dialog" aria-labelledby="modal-block-tabs-alternative" aria-hidden="true">
            <div class="modal-dialog modal-dialog-slideup modal-xl" role="document">
              <div class="modal-content">
                <!-- Block Tabs Alternative Style -->
                <div class="block block-transparent bg-white mb-0">
                  <ul class="nav nav-tabs nav-tabs-alt" role="tablist">
                    <li class="nav-item">
                      <button class="nav-link active" id="btabs-alt-static-home-tab" data-bs-toggle="tab" data-bs-target="#btabs-alt-static-home" role="tab" aria-controls="btabs-alt-static-home" aria-selected="true">
                        Home
                      </button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link" id="btabs-alt-static-profile-tab" data-bs-toggle="tab" data-bs-target="#btabs-alt-static-profile" role="tab" aria-controls="btabs-alt-static-profile" aria-selected="false">
                        Profile
                      </button>
                    </li>
                    <li class="nav-item ms-auto">
                      <button class="nav-link" id="btabs-alt-static-settings-tab" data-bs-toggle="tab" data-bs-target="#btabs-alt-static-settings" role="tab" aria-controls="btabs-alt-static-settings" aria-selected="false">
                        <i class="si si-settings"></i>
                      </button>
                    </li>

                  </ul>
                  <div class="block-content tab-content">
                    <div class="tab-pane active" id="btabs-alt-static-home" role="tabpanel" aria-labelledby="btabs-static-home-tab">
                      <h4 class="fw-normal">Home Content</h4>
                      <p>...</p>
                    </div>
                    <div class="tab-pane" id="btabs-alt-static-profile" role="tabpanel" aria-labelledby="btabs-static-profile-tab">
                      <h4 class="fw-normal">Profile Content</h4>
                      <p>...</p>
                    </div>
                    <div class="tab-pane" id="btabs-alt-static-settings" role="tabpanel" aria-labelledby="btabs-static-settings-tab">
                      <h4 class="fw-normal">Settings Content</h4>
                      <p>...</p>
                    </div>
                  </div>
                  <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
                  </div>
                </div>
                <!-- END Block Tabs Alternative Style -->
              </div>
            </div>
          </div>
          <!-- END Alternative Tabs in Modal --> --}}





   <!-- Slide Up Modal -->
   <div class="modal fade" id="modal-new-record-vaccinee" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideup" role="document">
      <div class="modal-content">
        <div class="block block-themed block-transparent mb-0">
          <div class="block-header bg-primary-dark">
            <h3 class="block-title">NEW RECORD</h3>
            <div class="block-options">
              <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                <i class="si si-close"></i>
              </button>
            </div>
          </div>
          <div class="block-content">
            <form role="form" id="formAddVaccinee" novalidate>
              @csrf

              <div class="mb-3">
                <div class="form-material form-material-success floating">
                  <input class="form-control" id="material-select2" type="text" name="vaccinee_code" required/>
                  <label for="material-color-success2" style="font-size: 13px;">VACCINEE CODE</label>
                  <span class="text-danger errorMessage fs--2" id="error_email"></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-material form-material-success floating">
                  <input class="form-control" id="material-select2" type="text" name="first_name" pattern="[a-zA-Z\s]+" title="Input letters only" required/>
                  <label for="material-color-success2" style="font-size: 13px;">FIRST NAME</label>
                  <span class="text-danger errorMessage fs--2" id="error_email"></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-material form-material-success floating">
                  <input class="form-control" id="material-select2" type="text" name="middle_name" pattern="[a-zA-Z\s]+" title="Input letters only"/>
                  <label for="material-color-success2" style="font-size: 13px;">MIDDLE NAME</label>
                  <span class="text-danger errorMessage fs--2" id="error_email"></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-material form-material-success floating">
                  <input class="form-control" id="material-select2" type="text" name="last_name" pattern="[a-zA-Z\s]+" title="Input letters only" required/>
                  <label for="material-color-success2" style="font-size: 13px;">LAST NAME</label>
                  <span class="text-danger errorMessage fs--2" id="error_email"></span>
                </div>
              </div>

              <div class="mb-3">
                <div class="form-material form-material-success floating">
                  <select class="form-control" id="material-select2" name="suffix" aria-label="Floating label select example">
                    <option value="" selected></option>
                    <option value="JR"><center>JR</center></option>
                    <option value="SR"><center>SR</center></option>
                    <option value="II"><center>II</center></option>
                    <option value="III"><center>III</center></option>
                    <option value="III"><center>IV</center></option>
                    <option value="III"><center>V</center></option>
                  </select>
                  <label for="material-color-select2" style="font-size: 13px;">SUFFIX</label>
                  <span class="text-danger errorMessage" id="error_suffix"></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-material form-material-success floating">
                  <label for="floatingDate" style="margin-top: -1.5em; font-size: 13px;" class="fs--2">Birth Date</label>
                  <input class="form-control datetimepicker" id="floatingDate" name="birth_date" type="date" placeholder="dd/mm/yyyy" data-options='{"dateFormat":"d/m/y","disableMobile":true}' id="form-wizard-progress-wizard-datepicker" min="1900-10-20" max="2030-10-20" required/>
                  <span class="text-danger errorMessage fs--2" id="error_birth_date"></span>
                </div>
              </div>
             
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-alt-success" id="btnAddNewVaccinee">
            <i class="fa fa-check"></i> Submit
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- END Slide Up Modal -->


     <!-- Slide Up Modal -->
     <div class="modal fade" id="modal-update-record-vaccinee" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
      <div class="modal-dialog modal-dialog-slideup" role="document">
        <div class="modal-content">
          <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
              <h3 class="block-title">UPDATE RECORD</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                  <i class="si si-close"></i>
                </button>
              </div>
            </div>
            <div class="block-content">
              <form role="form" id="formUpdateVaccinee" novalidate>
                @csrf
                <input class="form-control" id="vaccinee_id" type="text" name="vaccinee_id" required hidden/>
                <div class="mb-3">
                  <div class="form-material form-material-success floating">
                    <label for="floatingDate" style="margin-top: -1.5em; font-size: 13px; color: #9CCC65;" class="fs--2">VACCINEE CODE</label>
                    <input class="form-control" id="vaccinee_code" type="text" name="vaccinee_code" required/>
                    {{-- <label for="material-color-success2" style="font-size: 13px;">VACCINEE CODE</label> --}}
                    <span class="text-danger errorMessage fs--2" id="error_email"></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-material form-material-success floating">
                    <label for="floatingDate" style="margin-top: -1.5em; font-size: 13px; color: #9CCC65;" class="fs--2">FIRST NAME</label>
                    <input class="form-control" id="first_name" type="text" name="first_name" pattern="[a-zA-Z\s]+" title="Input letters only" required/>
                    {{-- <label for="material-color-success2" style="font-size: 13px;">FIRST NAME</label> --}}
                    <span class="text-danger errorMessage fs--2" id="error_email"></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-material form-material-success floating">
                    <label for="floatingDate" style="margin-top: -1.5em; font-size: 13px; color: #9CCC65;" class="fs--2">MIDDLE NAME</label>
                    <input class="form-control" id="middle_name" type="text" name="middle_name" pattern="[a-zA-Z\s]+" title="Input letters only"/>
                    {{-- <label for="material-color-success2" style="font-size: 13px;">MIDDLE NAME</label> --}}
                    <span class="text-danger errorMessage fs--2" id="error_email"></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-material form-material-success floating">
                    <label for="floatingDate" style="margin-top: -1.5em; font-size: 13px; color: #9CCC65;" class="fs--2">LAST NAME</label>
                    <input class="form-control" id="last_name" type="text" name="last_name" pattern="[a-zA-Z\s]+" title="Input letters only" required/>
                    {{-- <label for="material-color-success2" style="font-size: 13px;">LAST NAME</label> --}}
                    <span class="text-danger errorMessage fs--2" id="error_email"></span>
                  </div>
                </div>
  
                <div class="mb-3">
                  <div class="form-material form-material-success floating">
                    <select class="form-control" id="suffix" name="suffix" aria-label="Floating label select example">
                      <option value="" selected></option>
                      <option value="JR"><center>JR</center></option>
                      <option value="SR"><center>SR</center></option>
                      <option value="II"><center>II</center></option>
                      <option value="III"><center>III</center></option>
                      <option value="III"><center>IV</center></option>
                      <option value="III"><center>V</center></option>
                    </select>
                    <label for="material-color-select2" style="font-size: 13px;">SUFFIX</label>
                    <span class="text-danger errorMessage" id="error_suffix"></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-material form-material-success floating">
                    <label for="floatingDate" style="margin-top: -1.5em; font-size: 13px; color: #9CCC65;" class="fs--2">Birth Date</label>
                    <input class="form-control datetimepicker" id="update_birth_date" name="birth_date" type="date" placeholder="dd/mm/yyyy" data-options='{"dateFormat":"d/m/y","disableMobile":true}' id="form-wizard-progress-wizard-datepicker" min="1900-10-20" max="2030-10-20" required/>
                    <span class="text-danger errorMessage fs--2" id="error_birth_date"></span>
                  </div>
                </div>
               
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-alt-success" id="btnUpdateVaccinee">
              <i class="fa fa-check"></i> Submit
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- END Slide Up Modal


     <!-- Slide Up Modal -->
     <div class="modal fade" id="modal-new-record-category" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
      <div class="modal-dialog modal-dialog-slideup" role="document">
        <div class="modal-content">
          <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
              <h3 class="block-title">NEW CATEGORY</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                  <i class="si si-close"></i>
                </button>
              </div>
            </div>
            <div class="block-content">
              <form role="form" id="formCreateCat">
                @csrf

                <div class="mb-3">
                  <div class="form-material form-material-success floating">
                    <input class="form-control" id="material-select2" type="text" name="cat_name" required/>
                    <label for="material-color-success2" style="font-size: 13px;">CATEGORY NAME</label>
                    <span class="text-danger errorMessage fs--2" id="error_email"></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-material form-material-success floating">
                    <input class="form-control" id="material-select2" type="text" name="cat_desc" required/>
                    <label for="material-color-success2" style="font-size: 13px;">CATEGORY DESCRIPTION</label>
                    <span class="text-danger errorMessage fs--2" id="error_email"></span>
                  </div>
                </div>

              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-alt-success" id="btnNewCategory">
              <i class="fa fa-check"></i> Submit
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- END Slide Up Modal -->

     <!-- Slide Up Modal -->
     <div class="modal fade" id="modal-update-record-category" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
      <div class="modal-dialog modal-dialog-slideup" role="document">
        <div class="modal-content">
          <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
              <h3 class="block-title">UPDATE CATEGORY</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                  <i class="si si-close"></i>
                </button>
              </div>
            </div>
            <div class="block-content">
              <form role="form" id="formUpdateCat">
                @csrf
                <input class="form-control" id="cat_id" type="text" name="cat_id" required hidden/>
                <div class="mb-3">
                  <div class="form-material form-material-success floating">
                    <label for="floatingDate" style="margin-top: -1.5em; font-size: 13px; color: #9CCC65;" class="fs--2">CATEGORY NAME</label>
                    <input class="form-control material-select2" id="cat_name" type="text" name="cat_name" required/>
                    <span class="text-danger errorMessage fs--2" id="error_email"></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-material form-material-success floating">
                    <label for="floatingDate" style="margin-top: -1.5em; font-size: 13px; color: #9CCC65;" class="fs--2">CATEGORY DESCRIPTION</label>
                    <input class="form-control material-select2" id="cat_desc" type="text" name="cat_desc" required/>
                    <span class="text-danger errorMessage fs--2" id="error_email"></span>
                  </div>
                </div>

              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-alt-success" id="btnUpdateCategory">
              <i class="fa fa-check"></i> Submit
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- END Slide Up Modal -->


      <!-- Slide Up Modal -->
      <div class="modal fade" id="modal-new-record-sub-category" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideup" role="document">
          <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
              <div class="block-header bg-primary-dark">
                <h3 class="block-title">NEW SUB-CATEGORY</h3>
                <div class="block-options">
                  <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                    <i class="si si-close"></i>
                  </button>
                </div>
              </div>
              <div class="block-content">
                <form role="form" id="formCreateSubCat">
                  @csrf
  
                  <div class="mb-3">
                    <div class="form-material form-material-success floating">
                      <input class="form-control" id="material-select2" type="text" name="sub_cat_name" required/>
                      <label for="material-color-success2" style="font-size: 13px;">SUB-CATEGORY NAME</label>
                      
                      <span class="text-danger errorMessage fs--2" id="error_email"></span>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="form-material form-material-success floating">
                      <input class="form-control" id="material-select2" type="text" name="sub_cat_desc" required/>
                      <label for="material-color-success2" style="font-size: 13px;">SUB-CATEGORY DESCRIPTION</label>
                      <span class="text-danger errorMessage fs--2" id="error_email"></span>
                    </div>
                  </div>
  
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-alt-success" id="btnCreateSubCat">
                <i class="fa fa-check"></i> Submit
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- END Slide Up Modal -->

       <!-- Slide Up Modal -->
       <div class="modal fade" id="modal-update-record-sub-category" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideup" role="document">
          <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
              <div class="block-header bg-primary-dark">
                <h3 class="block-title">UPDATE SUB-CATEGORY</h3>
                <div class="block-options">
                  <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                    <i class="si si-close"></i>
                  </button>
                </div>
              </div>
              <div class="block-content">
                <form role="form" id="formUpdateSubCat">
                  @csrf
  
                  <div class="mb-3">
                    <input class="form-control" id="sub_cat_id" type="text" name="sub_cat_id" required hidden/>
                    <div class="form-material form-material-success floating">
                      <label for="floatingDate" style="margin-top: -1.5em; font-size: 13px; color: #9CCC65;" class="fs--2">SUB-CATEGORY NAME</label>
                      <input class="form-control" id="sub_cat_name" type="text" name="sub_cat_name" required/>
                      <span class="text-danger errorMessage fs--2" id="error_email"></span>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="form-material form-material-success floating">
                      <label for="floatingDate" style="margin-top: -1.5em; font-size: 13px; color: #9CCC65;" class="fs--2">SUB-CATEGORY DESCRIPTION</label>
                      <input class="form-control" id="sub_cat_desc" type="text" name="sub_cat_desc" required/>
                      <span class="text-danger errorMessage fs--2" id="error_email"></span>
                    </div>
                  </div>
  
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-alt-success" id="btnUpdateSubCat">
                <i class="fa fa-check"></i> Submit
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- END Slide Up Modal -->

<!-- Pop Out Modal -->
<div class="modal fade" id="view_role" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">Role / Department Information</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
              <i class="si si-close"></i>
            </button>
          </div>
        </div>
        <div class="block-content">
          <!-- Project Info -->
          <table class="table table-striped table-borderless mt-20">
            <tbody>
              <tr>
                <td class="font-w600">ROLE NAME</td>
                <td id="role_title"></td>
              </tr>
              <tr>
                <td class="font-w600">CODE</td>
                <td id="role_code"></td>
              </tr>
              <tr>
                <td class="font-w600">Created</td>
                <td id="role_created_at"></td>
              </tr>
            </tbody>
          </table>
          <!-- END Project Info -->
         
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- END Pop Out Modal -->



 <!-- Pop Out Modal -->
 <div class="modal fade" id="m_user" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">Account Information</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
              <i class="si si-close"></i>
            </button>
          </div>
        </div>
        
          <!-- Project Info -->
          
          <div class="table-responsive p-2  ">
            <table class="table table-striped table-borderless mt-20">
              <tbody>
                <tr>
                  <td class="font-w600 ">Account Status</td>
                  <td id="status"></td>
                  <td class="font-w600">Role/Department</td>
                  <td id="role"></td>
                </tr>
                <tr>
                  <td class="font-w600">Account ID</td>
                  <td id="user_id"></td>
                  <td class="font-w600">Created At</td>
                  <td id="created_at"></td>
                </tr>
                <tr>
                  <td class="font-w600">Email</td>
                  <td id="email"></td>
                  <td class="font-w600">Phone number</td>
                  <td id="contact_number"></td>
                </tr>
                <tr>
                  <td class="font-w600">Birth Date</td>
                  <td id="birth_date"></td>
                  <td class="font-w600">Sex</td>
                  <td id="sex"></td>
                </tr>
                <tr>
                  <td class="font-w600">Region</td>
                  <td id="region"></td>
                  <td class="font-w600">Province</td>
                  <td id="province"></td>
                </tr>
                <tr>
                  <td class="font-w600">City</td>
                  <td id="city"></td>
                  <td class="font-w600">Barangay</td>
                  <td id="barangay"></td>
                </tr>
                <tr>
                  <td class="font-w600">Home Address</td>
                  <td colspan="3" id="home_address"></td>
                 
                </tr>
              </tbody>
            </table>
          </div>
          <!-- END Project Info -->
         
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- END Pop Out Modal -->


 <!-- VACCINEE VIEW Modal -->
 <div class="modal fade" id="vaccinee_view" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">Vaccinee Information</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
              <i class="si si-close"></i>
            </button>
          </div>
        </div>
        
          <!-- Project Info -->
          
          <div class="table-responsive p-2  ">
            <table class="table table-striped table-borderless mt-20">
              <tbody>
                <tr>
                  <td class="font-w600 ">VACCINEE CODE</td>
                  <td id="view_vaccinee_code"></td>
                </tr>
                <tr>
                  <td class="font-w600">FIRST NAME</td>
                  <td id="view_first_name"></td>
                </tr>
                  <tr>
                  <td class="font-w600">MIDDLE NAME</td>
                  <td id="view_middle_name"></td>
                </tr>
                  <tr>
                  <td class="font-w600">LAST NAME</td>
                  <td id="view_last_name"></td>
                </tr>
                  <tr>
                   <td class="font-w600">SUFFIX</td>
                  <td id="view_suffix"></td>
                </tr>
           
                  <td class="font-w600">BIRTH DATE</td>
                  <td id="view_birth_date"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- END Project Info -->
         
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- END Pop Out Modal -->




 <!-- PRE LOADER Modal -->
 <div class="modal" id="pre_loader" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-popout" role="document">
    <div class="modal-content" style="background: transparent">
      <div class="load-wrapp" style="margin-top: 50%">
          <center>
            <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
          </center>
      </div>
    </div>
  </div>
</div>
<!-- END PRE LOADER Modal -->


    <!-- Slide Up Modal -->
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
      <div class="modal-dialog modal-dialog-slideup modal-lg" role="document">
        <div class="modal-content">
          <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
              <h3 class="block-title" id="title_form"> <i class="fa fa-plus mr-5"></i>Create New User</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close">
                  <i class="si si-close"></i>
                </button>
              </div>
            </div>
            <div class="block-content">
                  <div class="card-body ">
                    <div class="tab-content">
                      <div class="tab-pane active 5" role="tabpanel" aria-labelledby="form-wizard-progress-tab1" id="form-wizard-progress-tab1">
                        <form class="font-size-x" role="form" id="formAddUser"  >
                          @csrf
                          <div class="row">
                            <input type="text" class="form-control" id="material-color-success2 txt_user_id" name="user_id">
                            <div class="col-4">
                                <div class="form-material form-material-success floating">
                                    <input type="text" class="form-control" id="material-color-success2" name="first_name">
                                    <label for="material-color-success2"><small>First Name</small></label>
                                </div>
                              <div class="invalid-feedback" id="error_first_name"></div>
                            </div>
                            
                            <div class="col-3">
                              <div class="form-material form-material-success floating">
                                <input type="text" class="form-control" id="material-color-success2" name="middle_name"/>
                                <label for="material-color-success2"><small>Middle Name</small></label>
                              </div>
                              <div class="invalid-feedback" id="error_middle_name"></div>
                            </div>

                            <div class="col-3">
                              <div class="form-material form-material-success floating">
                                <input type="text" class="form-control" id="material-color-success2"  name="last_name"/>
                                <label for="material-color-success2"><small>Last Name</small></label>
                              </div>
                              <div class="invalid-feedback" id="error_last_name"></div>
                            </div>

                      
                            
                            <div class="col-2">
                              <div class="form-group row">
                                <div class="col-md-12">
                                  <div class="form-material form-material-success floating">
                                    <select class="form-control" id=" form-material-success" name="suffix">
                                      <option value="" selected></option>
                                      <option value="Jr">Jr</option>
                                      <option value="Sr"><center>Sr</center></option>
                                      <option value="II"><center>II</center></option>
                                      <option value="III"><center>III</center></option>
                                      <option value="III"><center>IV</center></option>
                                      <option value="III"><center>V</center></option>
                                    </select>
                                    <label for="form-material-success" style="font-size: 13px">Suffix</label>
                                  </div>
                                  <div class="invalid-feedback" id="error_suffix"></div>
                                </div>
                              </div>
                            </div>

                          </div>


                          <div class="mb-3 font-size-x">
                            <div class="form-material form-material-success floating">
                              <input class="form-control" id="material-color-success2" type="email" name="email" pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" required="required" data-wizard-validate-email="true" />
                              <label for="material-color-success2">Email</label>
                              <span class="text-danger errorMessage fs--2" id="error_email"></span>
                            </div>
                            <div class="invalid-feedback" id="error_email"></div>
                          </div>

                          <div class="row g-2">
                            <div class="col-6">
                              <div class="mb-3">
                                <div class="form-material form-material-success floating">
                                  <select class="form-control" id=" form-material-success" name="suffix">
                                    <option value="" selected></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                                  <label for="form-material-success" style="font-size: 13px">Sex</label>
                                </div>
                                <div class="invalid-feedback" id="error_sex"></div>
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="mb-3">
                                
                                <div class="form-material form-material-success floating">
                                  <input class="form-control datetimepicker" id="form-material-success" name="birth_date" type="date" placeholder="dd-mm-yyyy" data-options='{"dateFormat":"d/m/y","disableMobile":true}' id="form-wizard-progress-wizard-datepicker"  />
                                  <label  style="font-size: 13px">Birth Date</label>
                                </div>
                                <div class="invalid-feedback" id="error_birth_date"></div>
                              </div>
                            </div>
                          </div>

                          <div class="mb-3">
                            <div class="form-material form-material-success floating">
                              <input type="text" class="js-masked-phone form-control" id="example-masked-phone" name="contact_number">
                              <label for="example-masked2-phone">Contact Number <small class="text-muted">(999) 999-9999</small></label>
                            </div>
                            <div class="invalid-feedback" id="error_contact_number"></div>
                          </div> 
                          
                          <div class="row g-2">
                            <div class="col">
                              <div class="form-material form-material-success floating">
                                <select class="form-control region1" id="material-select2 region1" name="region">
                                  {{-- REGION PICKER --}}
                                </select>
                                <label for="material-select2">Select Region</label>
                              </div>
                              <div class="invalid-feedback" id="error_region"></div>
                            </div>

                            <div class="col">
                              <div class="form-material form-material-success floating">
                                <select class="form-control province1" id="material-select2 province1" name="province">
                                  {{-- PROVINCE PICKER --}}
                                </select>
                                <label for="material-select2">Select Province</label>
                              </div>
                              <div class="invalid-feedback" id="error_province"></div>
                            </div>
                          </div>


                          <br>
                          <div class="row g-2">
                            <div class="col">
                              <div class="form-material form-material-success floating">
                                <select class="form-control city1" id="material-select2 city1" name="city">
                                  {{-- CITY PICKER --}}
                                </select>
                                <label for="material-select2">Select City</label>
                              </div>
                              <div class="invalid-feedback" id="error_city"></div>
                            </div>
                            <br>
                            <div class="col">
                              <div class="form-material form-material-success floating">
                                <select class="form-control barangay1" id="material-select2 barangay1" name="barangay">
                                  {{-- BARANGAY PICKER --}}
                                </select>
                                <label for="material-select2">Select Barangay</label>
                              </div>
                              <div class="invalid-feedback" id="error_barangay"></div>
                            </div>
                            <br>
                          </div>
                          <br>
                          <div class="col-14">
                            <div class="form-material">
                              <textarea class="form-control" id="val-suggestions2" name="home_address" rows="3" placeholder="(e.g., street, block, lot, unit)"></textarea>
                              <label for="val-suggestions2">Home Address</label>
                            </div>

                            
                            <div class="invalid-feedback" id="error_home_address"></div>
                           
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-alt-success" id="create_user">
              <i class="fa fa-check"></i> Submit
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- END Slide Up Modal -->

{{-- @endif --}}








