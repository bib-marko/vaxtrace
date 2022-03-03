{{-- @if (url()->current() == route('get_manage_user')) --}}

{{--Show User Modal--}}



{{--End Show User Modal --}}

 <!-- Pop Out Modal -->
 <div class="modal fade" id="m_user" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
  <div class="modal-dialog modal-dialog-popout" role="document">
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
        <div class="block-content">
          <div class="row ">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1 fs--2">ID</p>
            </div>
            <div class="col fs--2" id="user_id"></div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1 fs--2">Created</p>
            </div>
            <div class="col fs--2" id="created_at"></div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1 fs--2">Email</p>
            </div>
            <div class="col fs--2"><a id="email"></a></div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1 fs--2">Phone number</p>
            </div>
            <div class="col fs--2"><a id="contact_number"></a></div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1 fs--2">Birth Date</p>
            </div>
            <div class="col fs--2" id="birth_date"></div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-0 fs--2">Sex</p>
            </div>
            <div class="col fs--2" id="sex"></div>
          </div>
        </div>
        <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-0 fs--2">Status</p>
            </div>
            <div class="col fs--2" id="status"></div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1 fs--2">Region</p>
            </div>
            <div class="col fs--2"><a id="region"></a></div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1 fs--2">Province</p>
            </div>
            <div class="col fs--2"><a id="province"></a></div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1 fs--2">City</p>
            </div>
            <div class="col fs--2"><a id="city"></a></div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1 fs--2">Barangay</p>
            </div>
            <div class="col fs--2"><a id="barangay"></a></div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1 fs--2">Address</p>
            </div>
            <div class="col fs--2">
              <p class="mb-1" id="home_address"></p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-alt-success" data-dismiss="modal">
          <i class="fa fa-check"></i> Perfect
        </button>
      </div>
    </div>
  </div>
</div>
<!-- END Pop Out Modal -->










 <!-- PRE LOADER Modal -->
 <div class="modal fade" id="pre_loader" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true" >
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








