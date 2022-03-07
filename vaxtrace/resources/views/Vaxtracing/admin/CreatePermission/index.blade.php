@extends('Vaxtracing.layout.admin.app')

@section('title', 'Create Permission')

@section('content')


<div class="block">
    <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" href="#btabs-animated-slideleft-master-list">Create Permission</a>
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
                    <div class="block-content">
                        <div class="col-lg-12">
                            <div class="row g-2">
                                <div class="col-12">
                                    <br>
                                    <div class="form-material form-material-success floating">
                                        <input class="js-maxlength form-control" id="example-material-maxlength7 home_address" type="text" name="home_address"   rows="3" maxlength="100" data-always-show="true" required/>
                                        <label for="example-material-maxlength7" style="font-size: 13px;">Permission Name</label>
                                        <span class="text-danger errorMessage" id="error_home_address"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                            <div class="col">
                                <div class="form-material form-material-success floating">
                                        <select class="js-select2 form-control" id="example-select2" name="example-select2" style="width: 100%;" >
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        <option value="1">HTML</option>
                                        <option value="2">CSS</option>
                                        <option value="3">JavaScript</option>
                                        <option value="4">PHP</option>
                                        <option value="5">MySQL</option>
                                        <option value="6">Ruby</option>
                                        <option value="7">Angular</option>
                                        <option value="8">React</option>
                                        <option value="9">Vue.js</option>
                                    </select>
                                    <label for="material-color-select2" style="font-size: 13px;">Sub-system </label>
                                    <span class="text-danger errorMessage fs--2" id="error_region"></span>
                                    
                                </div>
                            </div>
                    </div>

                    <div class="row text-center mt-4">
                        <div class="col-md-2 justify-content-center ml-auto">
                            <div class="block mr-15 ml-15">
                                <button class="btn btn-square btn-alt-success min-width-120 " id="edit_profile">Submit <span class="si si-arrow-right ms-2"> </span></button>
                            </div>
                        </div>
                    </div>


                    </form>
                
            </div>
            <!-- END User Profile -->
    </div>
    </div>
<!-- END Block Tabs Animated Slide Left -->

@endsection