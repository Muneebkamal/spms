@extends('layouts.app')

@section('title', 'Add Property')

@section('styles')

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" /> 
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/%40form-validation/umd/styles/index.min.css')}}" />



@endsection()

@section('content')

<div class="col-12 mb-4">
    <small class="text-light fw-medium">{{__('New Property')}}</small>
    <div class="bs-stepper wizard-numbered mt-2">
      <div class="bs-stepper-header">
        <div class="step" data-target="#building-info">
          <button type="button" class="step-trigger">
            <span class="bs-stepper-circle">1</span>
            <span class="bs-stepper-label">
              <span class="bs-stepper-title">{{__('Building Info')}}</span>
          </button>
        </div>
        <div class="line">
          <i class="ti ti-chevron-right"></i>
        </div>
        <div class="step" data-target="#landlord-details">
          <button type="button" class="step-trigger">
            <span class="bs-stepper-circle">2</span>
            <span class="bs-stepper-label">
              <span class="bs-stepper-title">{{__('Landlord Details')}}</span>
            </span>

          </button>
        </div>
        <div class="line">
          <i class="ti ti-chevron-right"></i>
        </div>
        <div class="step" data-target="#ftod">
          <button type="button" class="step-trigger">
            <span class="bs-stepper-circle">3</span>
            <span class="bs-stepper-label">
              <span class="bs-stepper-title">{{__('FTOD')}}</span>
            </span>
          </button>
        </div>
        <div class="line">
            <i class="ti ti-chevron-right"></i>
        </div>
        <div class="step" data-target="#size-price">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-circle">4</span>
              <span class="bs-stepper-label">
                <span class="bs-stepper-title">{{__('Size/Price')}}</span>
              </span>
            </button>
          </div>

      </div>
      <div class="bs-stepper-content">
        <form onSubmit="return false">
          <!-- Building Info -->
          <div id="building-info" class="content">
            <div class="content-header mb-3">
              <h6 class="mb-0">{{__('Building Info')}}</h6>
            </div>
            <div class="row g-3">
              <div class="col-sm-6">
                <input type="number" id="code" name="code" class="form-control" placeholder="Code" />
              </div>
              <div class="col-sm-6">
                <select id="district" name="district" class="form-control">
                    <option value="district">District</option>
                    <option value="yt">yt</option>
                    <option value="kt">kt</option>
                </select>
              </div>
              <div class="col-sm-12">
                <input type="text" id="bulding-name" name="building-name" class="form-control" placeholder="Building Name" />
              </div>
              <div class="col-sm-12">
                <input type="text" id="address" name="address" class="form-control" placeholder="Adsress"  />
              </div>
              <div class="col-sm-12">
                <input type="text" id="year" name="year" class="form-control" placeholder="Year" />
              </div>
              <div class="col-sm-6">
                <input type="text" id="block" name="block" class="form-control" placeholder="Block"  />
              </div>
              <div class="col-sm-6">
                <input type="text" id="floor" name="floor" class="form-control" placeholder="Floor" />
              </div>
              <div class="col-sm-6">
                <input type="text" id="flat" name="flat" class="form-control" placeholder="Flat" />
              </div>
              <div class="col-sm-6">
                <input type="number" id="rooms" name="rooms" class="form-control" placeholder="No. of Rooms" />
              </div>
              <div class="col-sm-6">
                <input type="text" id="cargo-lift" name="cargo-lift" class="form-control" placeholder="Cargo Lift"  />
              </div>
              <div class="col-sm-6">
                <input type="text" id="customer-lift" name="customer-lift" class="form-control" placeholder="Customer Lift" />
              </div>
              <div class="col-sm-6">
                <label class="mx-1">24 Hours</label>
                <select id="hours" name="hours" class="form-control">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>    
              </div>
              <div class="col-sm-12 form-password-toggle">
                <div class="input-group input-group-merge">
                  <input type="password" id="password" name="password" class="form-control" placeholder="Entry Password" />
                  <span class="input-group-text cursor-pointer" id="password2"><i class="ti ti-eye-off"></i></span>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="input-group">
                  <textarea type="text" id="comment" name="comment" class="form-control" placeholder="Agent Comment"></textarea>
                </div>
              </div>
              <div class="col-12 d-flex justify-content-between">
                <button class="btn btn-label-secondary btn-prev" disabled> <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
              </div>
            </div>
          </div>
          <!-- Landlord Details -->
          <div id="landlord-details" class="content">
            <div class="content-header mb-3">
              <h6 class="mb-0">{{__('Landlord Details')}}</h6>
            </div>
            <div class="row g-3">
              <div class="col-sm-6">
                <input type="text" id="contact-1" name="contact-1" class="form-control" placeholder="Contact 1" />
              </div>
              <div class="col-sm-6">
                <input type="text" id="number-1" name="number-1" class="form-control" placeholder="Number 1" />
              </div>
              <div class="col-sm-6">
                <input type="text" id="contact-2" name="contact-2" class="form-control" placeholder="Contact 2" />
              </div>
              <div class="col-sm-6">
                <input type="text" id="number-2" name="number-2" class="form-control" placeholder="Number 2" />
              </div>
              <div class="col-sm-6">
                <input type="text" id="contact-3" name="contact-3" class="form-control" placeholder="Contact 3" />
              </div>
              <div class="col-sm-6">
                <input type="text" id="number-3" name="number-3" class="form-control" placeholder="Number 3" />
              </div>
              <div class="col-sm-12">
                <input type="text" id="landlord-name" name="landlord-name" class="form-control" placeholder="Landlord Name" />
              </div>
              <div class="col-sm-12">
                <input type="text" id="bank" name="bank" class="form-control" placeholder="Bank" />
              </div>
              <div class="col-sm-12">
                <input type="text" id="bank-account" name="bank-account" class="form-control" placeholder="Bank Account" />
              </div>
              <div class="col-sm-12">
                <textarea type="text" id="remark" name="remark" class="form-control" placeholder="Remark"></textarea>
              </div>
              <div class="col-12 d-flex justify-content-between">
                <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
              </div>
            </div>
          </div>
          <!-- FTOD -->
          <div id="ftod" class="content">
            <div class="content-header mb-3">
              <h6 class="mb-0">{{__('FTOD')}}</h6>
            </div>
            <div class="row g-3">
                <div class="col-sm-12">
                    <label class="mx-1">{{__('Facilities')}}</label>
                    <select id="facilities" name="facilities" class="form-control">
                        <option value=""></option>
                        <option value="carpark">Carkpark</option>
                        <option value="cns">Convenient near subway</option>
                    </select>    
                </div>
                <div class="col-sm-12">
                    <label class="mx-1">{{__('Types')}}</label>
                    <select id="types" name="types" class="form-control">
                        <option value=""></option>
                        <option value="rent">Rent</option>
                        <option value="sale">Sales</option>
                    </select>    
                  </div>
                  <div class="col-sm-12">
                    <label class="mx-1">{{__('Decoration')}}</label>
                    <select id="decoration" name="decoration" class="form-control">
                        <option value=""></option>
                        <option value="budget">Budget</option>
                        <option value="basic">Basic</option>
                    </select>    
                  </div>
              <div class="col-sm-12">
                <span>{{__('Options')}}</span>
                <br><br>
                <input type="checkbox" class="form-check-input">
                <span>{{__('New Site')}}</span><br>
                <input type="checkbox" class="form-check-input">
                <span>{{__('Bargain')}}</span><br>
                <input type="checkbox" class="form-check-input">
                <span>{{__('Discounted')}}</span><br>
                <input type="checkbox" class="form-check-input">
                <span>{{__('Recommend')}}</span><br>
                <input type="checkbox" class="form-check-input">
                <span>{{__('Ready to listing')}}</span><br>
                <input type="checkbox" class="form-check-input">
                <span>{{__('New Released')}}</span><br>
              </div>
              <div class="col-12 d-flex justify-content-between">
                <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
              </div>
            </div>
          </div>
          <!-- Size/Price -->
          <div id="size-price" class="content">
            <div class="content-header mb-3">
              <h6 class="mb-0">{{__('Size/Price')}}</h6>
              {{-- <small>Enter Your Social Links.</small> --}}
            </div>
            <div class="row g-3">
              <div class="col-sm-6">
                <label class="form-label" for="twitter">Gross sf:</label>
                <input type="number" id="gross-sf" name="gross-sf" class="form-control" />
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="facebook">Net sf:</label>
                <input type="number" id="net-sf" name="net-sf" class="form-control" />
              </div>
              <div class="col-sm-12">
                <label class="form-label" for="google">Selling Price (M):</label>
                <input type="number" id="selling-price" name="selling-price" class="form-control" />
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="twitter">G@</label>
                <input type="number" id="selling-gross" name="selling-gross" class="form-control" />
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="facebook">N@</label>
                <input type="number" id="selling-net" name="selling-net" class="form-control" />
              </div>
              <hr>
              <div class="col-sm-12">
                <label class="form-label" for="google">Rental Price:</label>
                <input type="number" id="rental-price" name="rental-price" class="form-control" />
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="twitter">G@</label>
                <input type="number" id="rental-gross" name="rental-gross" class="form-control" />
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="facebook">N@</label>
                <input type="number" id="rental-net" name="rental-net" class="form-control" />
              </div>
              <hr>
              <div class="col-sm-12">
                <label class="form-label" for="facebook">Mgmf:</label>
                <input type="number" id="mgmf" name="mgmf" class="form-control" />
              </div>
              <div class="col-sm-12">
                <label class="form-label" for="facebook">Rate:</label>
                <input type="number" id="rate" name="rate" class="form-control" />
              </div>
              <div class="col-sm-12">
                <label class="form-label" for="facebook">Land:</label>
                <input type="number" id="land" name="land" class="form-control" />
              </div>
              <div class="col-sm-12">
                <label class="form-label" for="facebook">Oths:</label>
                <input type="number" id="oths" name="oths" class="form-control" />
              </div>
              <div class="col-12 d-flex justify-content-between">
                <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                  <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-success btn-submit">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Default Wizard -->

  @section('script')
  <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
  <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
  <script src="{{ asset('assets/vendor/libs/select2/select2.js')}}"></script>
  <script src="{{ asset('assets/vendor/libs/%40form-validation/umd/bundle/popular.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
  <script src="{{ asset('assets/js/form-wizard-numbered.js')}}"></script>
  @endsection()

@endsection

