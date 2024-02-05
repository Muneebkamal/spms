<!-- Add New Credit Card Modal -->
<div class="modal fade" id="edit-building" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="row g-3">
            <div class="col-md-6">
                <input type="text" id="code" name="code" class="form-control"
                    placeholder="{{ __('add-property.Code') }}" />
                <span class="text-danger" style="display: none"
                    id="code_msg">{{ __('add-property.Code Already Exists') }}</span>
            </div>
            <div class="col-md-6">
                <select id="district" name="district" class="form-control">
                    <option value="">{{ __('add-property.District') }}</option>
                </select>
            </div> 
            <div class="col-md-12">
                <select id="building_name" name="building_name" class="select2" data-placeholder="{{ __('add-property.Building Name') }}" class="form-select">
                    <option value=""></option>
                </select>
            <span class="text-danger" style="display: none" id="building_name_msg"></span>
            </div>
            <div class="col-md-12">
                <input type="text" id="address" name="address" class="form-control"
                    placeholder="{{ __('add-property.Addsress') }}" />
            </div>
            <div class="col-md-12">
                <input type="text" id="year" name="year" class="form-control"
                    placeholder="{{ __('add-property.Year') }}" />
            </div>
            <div class="col-md-6">
                <input type="text" id="block" name="block" class="form-control"
                    placeholder="{{ __('add-property.Block') }}" />
            </div>
            <div class="col-md-6">
                <input type="text" id="floor" name="floor" class="form-control"
                    placeholder="{{ __('add-property.Floor') }}" />
            </div>
            <div class="col-md-6">
                <input type="text" id="flat" name="flat" class="form-control"
                    placeholder="{{ __('add-property.Flat') }}" />
            </div>
            <div class="col-md-6">
                <input type="number" id="no_rooms" name="no_rooms" class="form-control"
                    placeholder="{{ __('add-property.No. of Rooms') }}" value="0" min="0" />
            </div>
            <div class="col-md-6">
                <input type="text" id="cargo_lift" name="cargo_lift" class="form-control"
                    placeholder="{{ __('add-property.Cargo Lift') }}" />
            </div>
            <div class="col-md-6">
                <input type="text" id="customer_lift" name="customer_lift" class="form-control"
                    placeholder="{{ __('add-property.Customer Lift') }}" />
            </div>
            <div class="col-md-6">
                <label class="mx-1">24 Hours</label>
                <select id="tf_hr" name="tf_hr" class="form-control">
                    <option value="yes">{{ __('add-property.Yes') }}</option>
                    <option value="no">{{ __('add-property.No') }}</option>
                </select>
            </div>
            <div class="col-md-12 form-password-toggle">
                <div class="input-group input-group-merge">
                    <input type="password" id="entry_password" name="entry_password" class="form-control"
                        placeholder="{{ __('add-property.Entry Password') }}" />
                    <span class="input-group-text cursor-pointer" id="password2"><i
                            class="ti ti-eye-off"></i></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="input-group">
                    <textarea type="text" id="comment" name="comment" class="form-control"
                        placeholder="{{ __('add-property.Agent Comment') }}"></textarea>
                </div>
            </div>
            <div class="col-12">
             <label class="mb-2">Building Images</label>
                <div class="border p-2">
                    <div class="dz-message needsclick my-5">
                        Drop Images here or click to upload
                        <span class="note needsclick">(Click to upload property iamges)</span>
                    </div>
                    <div id="uploadedImages"></div>
                    <div class="fallback">
                        <input name="file" accept="image/*" type="file" />
                    </div>
                </div>
            </div>

            <div class="col-md-12 text-center mt-3">
                <button type="reset" class="btn btn-label-secondary btn-reset waves-effect" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Save Changes</button>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Add New Credit Card Modal -->
  