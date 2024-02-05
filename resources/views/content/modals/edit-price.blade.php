<!-- Add New Credit Card Modal -->
<div class="modal fade" id="edit-price" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="row g-3 px-3">
            <div class="col-md-6">
                <label class="form-label" for="twitter">{{ __('add-property.Gross sf:') }}</label>
                <input type="number" required value='0.00' id="gross-sf" name="gross-sf"
                    class="form-control" />
            </div>
            <div class="col-md-6">
                <label class="form-label" for="facebook">{{ __('add-property.Net sf:') }}</label>
                <input type="number" required value='0.00' id="net-sf" name="net-sf" class="form-control" />
            </div>
            <div class="col-md-12">
                <label class="form-label" for="google">{{ __('add-property.Selling Price (M):') }}</label>
                <input type="number" required value='0.00' id="selling-price" name="selling-price"
                    class="form-control" />
            </div>
            <div class="col-md-6">
                <label class="form-label" for="twitter">{{ __('add-property.G@') }}</label>
                <input type="number" required value='0.00' id="selling-gross" disabled name="selling-gross"
                    class="form-control" />
            </div>
            <div class="col-md-6">
                <label class="form-label" for="facebook">{{ __('add-property.N@') }}</label>
                <input type="number" required value='0.00' id="selling-net" disabled name="selling-net"
                    class="form-control" />
            </div>
        </div>
        <hr>
        <div class="row px-3">
            <div class="col-md-12">
                <label class="form-label" for="google">{{ __('add-property.Rental Price:')}}</label>
                <input type="number" required value="0.00" id="rental-price" name="rental-price"
                    class="form-control" />
            </div>
            <div class="col-md-6">
                <label class="form-label" for="twitter">{{ __('add-property.G@') }}</label>
                <input type="number" required value="0.00" id="rental-gross" disabled name="rental-gross"
                    class="form-control" />
            </div>
            <div class="col-md-6">
                <label class="form-label" for="facebook">{{ __('add-property.N@') }}</label>
                <input type="number" required value="0.00" id="rental-net" disabled name="rental-net"
                    class="form-control" />
            </div>
        </div>
        <hr>
        <div class="row px-3">
            <div class="col-md-6">
                <label class="form-label" for="facebook">{{ __('add-property.Mgmf:') }}</label>
                <input type="number" id="mgmf" name="mgmf" value="0.00" required class="form-control" />
            </div>
            <div class="col-md-6">
                <label class="form-label" for="facebook">{{ __('add-property.Rate:') }}</label>
                <input type="number" id="rate" name="rate" value="0.00" required class="form-control" />
            </div>
            <div class="col-md-6">
                <label class="form-label" for="facebook">{{ __('add-property.Land:') }}</label>
                <input type="number" id="land" name="land" value="0.00" required class="form-control" />
            </div>
            <div class="col-md-6">
                <label class="form-label" for="facebook">{{ __('add-property.Oths:') }}</label>
                <input type="number" id="oths" name="oths" value="0.00" required class="form-control" />
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
  