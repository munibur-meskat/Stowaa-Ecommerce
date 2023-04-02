 
@extends('layouts.backendapp')
@section('title',"User-Profile")
@section('content')

<div class="content container-fluid">
    <div class="card">
      {{-- {{ $users }} --}}
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label form-label">Avatar</label>
                  
                        <div class="col-sm-9">
                          <div class="d-flex align-items-center">
                            <!-- Avatar -->
                            <label class="avatar avatar-xl avatar-circle avatar-uploader me-5" for="avatarUploader">
                              <img id="avatarImg" class="avatar-img" src="{{ asset('assets/backend/img/160x160/img1.jpg') }}" alt="Image Description">
                 
                              <input type="file" class="js-file-attach avatar-uploader-input" id="avatarUploader" data-hs-file-attach-options="{
                                        &quot;textTarget&quot;: &quot;#avatarImg&quot;,
                                        &quot;mode&quot;: &quot;image&quot;,
                                        &quot;targetAttr&quot;: &quot;src&quot;,
                                        &quot;resetTarget&quot;: &quot;.js-file-attach-reset-img&quot;,
                                        &quot;resetImg&quot;: &quot;./assets/img/160x160/img1.jpg&quot;,
                                        &quot;allowTypes&quot;: [&quot;.png&quot;, &quot;.jpeg&quot;, &quot;.jpg&quot;]}">
                              <span class="avatar-uploader-trigger">
                                <i class="bi-pencil avatar-uploader-icon shadow-sm"></i>
                              </span>
                            </label>
                            <!-- End Avatar -->
                  
                            <button type="button" class="js-file-attach-reset-img btn btn-white">Delete</button>
                          </div>
                        </div>
                      </div>
                      <!-- End Form -->
                  
                      <!-- Form -->
                      <div class="row mb-4">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Full Name <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Displayed on public forums, such as Front."></i></label>
                  
                        <div class="col-sm-9">
                          <div class="input-group input-group-sm-vertical">
                            <input type="text" class="form-control" name="firstName" id="firstNameLabel" placeholder="Clarice" aria-label="Clarice">
                          </div>
                        </div>
                      </div>
                      <!-- End Form -->
                  
                      <!-- Form -->
                      <div class="row mb-4">
                        <label for="emailLabel" class="col-sm-3 col-form-label form-label">Email</label>
                  
                        <div class="col-sm-9">
                          <input type="email" class="form-control" name="email" id="emailLabel" placeholder="clarice@site.com" aria-label="clarice@site.com">
                        </div>
                      </div>
                      <!-- End Form -->
                  
                      <!-- Form -->
                      <div class="js-add-field row mb-4" data-hs-add-field-options="{
                              &quot;template&quot;: &quot;#addPhoneFieldTemplate&quot;,
                              &quot;container&quot;: &quot;#addPhoneFieldContainer&quot;,
                              &quot;defaultCreated&quot;: 0
                            }">
                        <label for="phoneLabel" class="col-sm-3 col-form-label form-label">Phone <span class="form-label-secondary">(Optional)</span></label>
                  
                        <div class="col-sm-9">
                          <div class="input-group input-group-sm-vertical">
                            <input type="text" class="js-input-mask form-control" name="phone" id="phoneLabel" placeholder="+x(xxx)xxx-xx-xx" aria-label="+x(xxx)xxx-xx-xx" data-hs-mask-options="{
                                     &quot;mask&quot;: &quot;+0(000)000-00-00&quot;
                                   }">
                  
                            <!-- Select -->
                            <div class="tom-select-custom tom-select-custom-end">
                              <select class="js-select form-select tomselected ts-hidden-accessible" autocomplete="off" data-hs-tom-select-options="{
                                        &quot;searchInDropdown&quot;: false,
                                        &quot;hideSearch&quot;: true,
                                        &quot;dropdownWidth&quot;: &quot;8rem&quot;
                                      }" id="tomselect-1" tabindex="-1">
                                
                                <option value="Home">Home</option>
                                <option value="Work">Work</option>
                                <option value="Fax">Fax</option>
                                <option value="Direct">Direct</option>
                              <option value="Mobile" selected="">Mobile</option></select><div class="ts-wrapper js-select form-select single plugin-change_listener plugin-hs_smart_position input-hidden full has-items"><div class="ts-control"><div data-value="Mobile" class="item" data-ts-item="">Mobile</div></div><div class="tom-select-custom"><div class="ts-dropdown single plugin-change_listener plugin-hs_smart_position" style="display: none;"><div role="listbox" tabindex="-1" class="ts-dropdown-content" id="tomselect-1-ts-dropdown"></div></div></div></div>
                            </div>
                            <!-- End Select -->
                          </div>
                  
                          <!-- Container For Input Field -->
                          <div id="addPhoneFieldContainer"></div>
                          <a class="js-create-field form-link" href="javascript:;"><i class="bi-plus"></i> Add phone </a>
                        </div>
                      </div>
                      <!-- End Form -->
                  
                      <!-- Add Phone Input Field -->
                      <div id="addAddressFieldTemplate" style="display: none;">
                        <div class="input-group-add-field">
                          <input type="text" class="form-control" data-name="addressLine" placeholder="Your address" aria-label="Your address">
                  
                          <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                            <i class="bi-x-lg"></i>
                          </a>
                        </div>
                      </div>
                      <!-- End Add Phone Input Field -->
                  
                      <!-- Add Phone Input Field -->
                      <div id="addPhoneFieldTemplate" class="input-group-add-field" style="display: none;">
                        <div class="input-group input-group-sm-vertical align-items-center">
                          <input type="text" class="js-input-mask form-control" data-name="additionlPhone" placeholder="+x(xxx)xxx-xx-xx" aria-label="+x(xxx)xxx-xx-xx" data-hs-mask-options="{
                                   &quot;mask&quot;: &quot;+0(000)000-00-00&quot;
                                 }">
                  
                        </div>
                  
                        <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                          <i class="bi-x-lg"></i>
                        </a>
                      </div>
                      <!-- End Add Phone Input Field -->
                  
                       
                      <!-- Form -->
                      <div class="row">
                        <label class="col-sm-3 col-form-label form-label">Gender</label>
                  
                        <div class="col-sm-9">
                          <div class="input-group input-group-sm-vertical">
                            <!-- Radio Check -->
                            <label class="form-control" for="userAccountTypeRadio1">
                              <span class="form-check">
                                <input type="radio" class="form-check-input" name="userAccountTypeRadio" id="userAccountTypeRadio1">
                                <span class="form-check-label">Male</span>
                              </span>
                            </label>
                            <!-- End Radio Check -->
                  
                            <!-- Radio Check -->
                            <label class="form-control" for="userAccountTypeRadio2">
                              <span class="form-check">
                                <input type="radio" class="form-check-input" name="userAccountTypeRadio" id="userAccountTypeRadio2">
                                <span class="form-check-label">Female</span>
                              </span>
                            </label>
                            <!-- End Radio Check -->
                          </div>
                        </div>
                      </div>
                      <!-- End Form -->
                   
                </div>
            </div>
        </div>
    </div>
</div>
     
@endsection