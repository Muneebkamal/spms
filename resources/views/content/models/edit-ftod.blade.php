<!-- Add New Credit Card Modal -->
<div class="modal fade" id="edit-ftod" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="row g-3 px-3">
            <div class="col-md-12">
                <label class="mx-1">{{__('add-property.Facilities')}}</label>
                <select id="facilities" class="select2" data-placeholder="{{__('add-property.Select Facilities')}}" multiple>
                </select>
            </div>
            <div class="col-md-12">
                <label class="mx-1">{{__('add-property.Types')}}</label>
                <select id="types" class="select2" data-placeholder="Select Types" multiple="" class="form-select">
                </select>

            </div>
            <div class="col-md-12">
                <label class="mx-1">{{__('add-property.Decoration')}}</label>
                <select id="decoration" class="select2" data-placeholder="{{ __('add-property.Select Decoration') }}"
                    multiple="multiple" class="form-select">
                </select>
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
  