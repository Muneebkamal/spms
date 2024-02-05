<!-- Add New Credit Card Modal -->
<div class="modal fade" id="edit-landlord" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="row g-3">
            <div class="col-md-6">
                <input type="text" id="contact_1" name="contact_1" class="form-control"
                    placeholder="{{ __('add-property.Contact 1') }}" />
            </div>
            <div class="col-md-6">
                <input type="text" id="number_1" name="number_1" class="form-control"
                    placeholder="{{ __('add-property.Number 1') }}" />
            </div>
            <div class="col-md-6">
                <input type="text" id="contact_2" name="contact_2" class="form-control"
                    placeholder="{{ __('add-property.Contact 2') }}" />
            </div>
            <div class="col-md-6">
                <input type="text" id="number_2" name="number_2" class="form-control"
                    placeholder="{{ __('add-property.Number 2') }}" />
            </div>
            <div class="col-md-6">
                <input type="text" id="contact_3" name="contact_3" class="form-control"
                    placeholder="{{ __('add-property.Contact 3') }}" />
            </div>
            <div class="col-md-6">
                <input type="text" id="number_3" name="number_3" class="form-control"
                    placeholder="{{ __('add-property.Number 3') }}" />
            </div>
            <div class="col-md-12">
                <input type="text" id="landlord_name" name="landlord_name" class="form-control"
                    placeholder="{{ __('add-property.Landlord Name') }}" />
            </div>
            <div class="col-md-12">
                <input type="text" id="bank" name="bank" class="form-control"
                    placeholder="{{ __('add-property.Bank') }}" />
            </div>
            <div class="col-md-12">
                <input type="text" id="bank_acc" name="bank_acc" class="form-control"
                    placeholder="{{ __('add-property.Bank Account') }}" />
            </div>
            <div class="col-md-12">
                <textarea type="text" id="remark" name="remark" class="form-control"
                    placeholder="{{ __('add-property.Remark') }}"></textarea>
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
  